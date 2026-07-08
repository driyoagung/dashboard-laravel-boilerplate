/* =========================================================
   Library Page
   ========================================================= */

const state = { libraryCategory: 'all' };

const libraryItems = [
    { id: 1, title: 'Brand Guidelines 2026', category: 'document', type: 'PDF', size: '2.4 MB', updated: '2 days ago', icon: 'document' },
    { id: 2, title: 'UI Component Library', category: 'design', type: 'FIGMA', size: '18.7 MB', updated: '1 week ago', icon: 'design' },
    { id: 3, title: 'Q2 Marketing Report', category: 'document', type: 'DOCX', size: '1.1 MB', updated: '3 days ago', icon: 'document' },
    { id: 4, title: 'Product Screenshots', category: 'media', type: 'ZIP', size: '45.2 MB', updated: '5 days ago', icon: 'media' },
    { id: 5, title: 'Team Onboarding Video', category: 'media', type: 'MP4', size: '128 MB', updated: '2 weeks ago', icon: 'media' },
    { id: 6, title: 'API Documentation', category: 'document', type: 'MD', size: '156 KB', updated: '1 day ago', icon: 'document' },
    { id: 7, title: 'Icon Pack v3', category: 'design', type: 'SVG', size: '3.8 MB', updated: '4 days ago', icon: 'design' },
    { id: 8, title: 'Client Presentation', category: 'document', type: 'PPTX', size: '8.9 MB', updated: '6 days ago', icon: 'document' },
];

function iconColor(type) {
    return { document: 'indigo', design: 'rose', media: 'emerald' }[type] || 'slate';
}

function fileIcon(type) {
    const icons = {
        document: '<svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
        design: '<svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>',
        media: '<svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>',
    };
    return icons[type];
}

function setLibraryCategory(cat) {
    state.libraryCategory = cat;
    document.getElementById('pageContent').innerHTML = renderLibrary();
}

function renderLibrary() {
    const categories = [
        { id: 'all', label: 'All Files', count: libraryItems.length },
        { id: 'document', label: 'Documents', count: libraryItems.filter(i => i.category === 'document').length },
        { id: 'design', label: 'Design', count: libraryItems.filter(i => i.category === 'design').length },
        { id: 'media', label: 'Media', count: libraryItems.filter(i => i.category === 'media').length },
    ];
    const filtered = state.libraryCategory === 'all' ? libraryItems : libraryItems.filter(i => i.category === state.libraryCategory);

    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Library</h2>
                <p class="text-sm text-slate-500 mt-1">Your files and resources</p>
            </div>
            <button onclick="openModalFromTemplate('uploadFileModalTemplate')" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                Upload File
            </button>
        </div>

        <div class="flex gap-2 mb-6 overflow-x-auto scrollbar-thin pb-2">
            ${categories.map(c => `
                <button onclick="setLibraryCategory('${c.id}')" class="px-4 py-2 rounded-lg text-sm font-semibold whitespace-nowrap ${state.libraryCategory === c.id ? 'bg-indigo-600 text-white' : 'bg-white border border-slate-200 text-slate-700 hover:bg-slate-50'}">
                    ${c.label} <span class="ml-1 opacity-70">(${c.count})</span>
                </button>
            `).join('')}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            ${filtered.map(item => `
                <div onclick="openFileDetail(${item.id})" class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 transition cursor-pointer">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-${iconColor(item.icon)}-100 flex items-center justify-center">
                            ${fileIcon(item.icon)}
                        </div>
                        <button onclick="event.stopPropagation(); openFileMenu(${item.id})" class="p-1 rounded hover:bg-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
                        </button>
                    </div>
                    <h4 class="font-semibold text-slate-900 truncate">${item.title}</h4>
                    <div class="flex items-center gap-2 mt-2 text-xs text-slate-500">
                        <span class="font-semibold">${item.type}</span>
                        <span>&middot;</span>
                        <span>${item.size}</span>
                    </div>
                    <p class="text-xs text-slate-400 mt-3">Updated ${item.updated}</p>
                </div>
            `).join('')}
        </div>
    `;
}

function openFileDetail(id) {
    const f = libraryItems.find(x => x.id === id);
    if (!f) return;
    openModalFromTemplate('fileDetailModalTemplate');
    document.getElementById('fdIcon').className = `w-20 h-20 rounded-2xl bg-${iconColor(f.icon)}-100 flex items-center justify-center`;
    document.getElementById('fdIcon').innerHTML = fileIcon(f.icon).replace('w-6 h-6', 'w-10 h-10');
    document.getElementById('fdTitle').textContent = f.title;
    document.getElementById('fdType').textContent = f.type;
    document.getElementById('fdSize').textContent = f.size;
    document.getElementById('fdCategory').textContent = f.category;
    document.getElementById('fdUpdated').textContent = f.updated;
}

function openFileMenu(id) {
    const f = libraryItems.find(x => x.id === id);
    if (!f) return;
    openModalFromTemplate('fileMenuModalTemplate');
    document.getElementById('fmTitle').textContent = f.title;
    document.getElementById('fmDeleteBtn').onclick = () => {
        closeModal();
        confirmAction('Delete File', `Delete ${f.title} permanently?`, () => showToast('File deleted', 'success'));
    };
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderLibrary();
});
