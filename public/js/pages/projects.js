/* =========================================================
   Projects Page
   ========================================================= */

const projects = [
    { id: 1, name: 'Website Redesign', client: 'Acme Corp', status: 'active', progress: 68, members: 5, due: 'Jul 15', color: 'indigo' },
    { id: 2, name: 'Mobile App MVP', client: 'StartupXYZ', status: 'active', progress: 42, members: 3, due: 'Aug 02', color: 'emerald' },
    { id: 3, name: 'Brand Guidelines', client: 'Nova Inc', status: 'review', progress: 90, members: 2, due: 'Jun 28', color: 'amber' },
    { id: 4, name: 'Marketing Campaign', client: 'TechFlow', status: 'active', progress: 25, members: 4, due: 'Jul 30', color: 'sky' },
    { id: 5, name: 'E-commerce Platform', client: 'ShopMore', status: 'paused', progress: 55, members: 6, due: 'Aug 20', color: 'rose' },
    { id: 6, name: 'Analytics Dashboard', client: 'DataViz Co', status: 'completed', progress: 100, members: 3, due: 'Jun 10', color: 'slate' },
];

function projectCard(p) {
    return `
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 transition cursor-pointer" onclick="openProjectDetail(${p.id})">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-lg bg-${p.color}-100 flex items-center justify-center">
                    <span class="text-${p.color}-600 font-bold">${p.name.charAt(0)}</span>
                </div>
                <button onclick="event.stopPropagation(); openProjectMenu(${p.id})" class="p-1 rounded hover:bg-slate-100">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
                </button>
            </div>
            <h4 class="font-semibold text-slate-900">${p.name}</h4>
            <p class="text-xs text-slate-500 mt-1">${p.client}</p>
            <div class="mt-4">
                <div class="flex justify-between text-xs mb-1.5">
                    <span class="text-slate-500">Progress</span>
                    <span class="font-semibold text-slate-900">${p.progress}%</span>
                </div>
                <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-${p.color}-600 rounded-full" style="width:${p.progress}%"></div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-100">
                <div class="flex -space-x-2">
                    ${Array(Math.min(p.members, 3)).fill(0).map((_, i) => `<img src="https://i.pravatar.cc/40?img=${i+10}" class="w-7 h-7 rounded-full ring-2 ring-white" alt=""/>`).join('')}
                    ${p.members > 3 ? `<div class="w-7 h-7 rounded-full ring-2 ring-white bg-slate-200 flex items-center justify-center text-xs font-semibold text-slate-600">+${p.members-3}</div>` : ''}
                </div>
                <span class="text-xs font-semibold ${statusColor(p.status)} px-2 py-1 rounded-full">${p.status}</span>
            </div>
        </div>
    `;
}

function renderProjects() {
    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Projects</h2>
                <p class="text-sm text-slate-500 mt-1">Manage and track all your projects</p>
            </div>
            <button onclick="openModalFromTemplate('createProjectModalTemplate'); bindProjectForm()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                New Project
            </button>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-4 mb-6">
            <div class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input id="projectSearch" type="text" placeholder="Search projects..." class="bg-transparent outline-none text-sm flex-1"/>
                </div>
                <select id="projectFilter" class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                    <option value="all">All Status</option>
                    <option value="active">Active</option>
                    <option value="review">In Review</option>
                    <option value="paused">Paused</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </div>

        <div id="projectGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            ${projects.map(projectCard).join('')}
        </div>
    `;
}

function openProjectDetail(id) {
    const p = projects.find(x => x.id === id);
    if (!p) return;
    openModalFromTemplate('projectDetailModalTemplate');
    document.getElementById('pdIcon').className = `w-12 h-12 rounded-lg bg-${p.color}-100 flex items-center justify-center`;
    document.getElementById('pdIconText').className = `text-${p.color}-600 font-bold text-lg`;
    document.getElementById('pdIconText').textContent = p.name.charAt(0);
    document.getElementById('pdName').textContent = p.name;
    document.getElementById('pdClient').textContent = p.client;
    document.getElementById('pdStatus').textContent = p.status;
    document.getElementById('pdProgress').textContent = p.progress + '%';
    document.getElementById('pdDue').textContent = p.due;
    document.getElementById('pdMemberCount').textContent = p.members;
    document.getElementById('pdMembers').innerHTML = Array(Math.min(p.members, 5)).fill(0).map((_, i) =>
        `<img src="https://i.pravatar.cc/40?img=${i+10}" class="w-9 h-9 rounded-full ring-2 ring-white" alt=""/>`
    ).join('');
    document.getElementById('pdOpenBtn').onclick = () => { closeModal(); showToast('Opening project...', 'info'); };
    document.getElementById('pdArchiveBtn').onclick = () => {
        closeModal();
        confirmAction('Archive Project', `Are you sure you want to archive ${p.name}?`, () => showToast('Project archived', 'success'));
    };
}

function openProjectMenu(id) {
    const p = projects.find(x => x.id === id);
    if (!p) return;
    openModal(`
        <div class="p-4">
            <h3 class="text-base font-bold text-slate-900 mb-3 px-2">${p.name}</h3>
            <div class="space-y-1">
                <button onclick="closeModal(); openProjectDetail(${p.id})" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">View Details</button>
                <button onclick="closeModal(); showToast('Edit mode enabled', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Edit Project</button>
                <button onclick="closeModal(); showToast('Link copied!', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Copy Link</button>
                <button onclick="closeModal(); confirmAction('Delete Project', 'This action cannot be undone.', () => showToast('Project deleted', 'success'))" class="w-full text-left px-3 py-2 rounded-lg hover:bg-rose-50 text-rose-600 text-sm">Delete Project</button>
            </div>
        </div>
    `);
}

function bindProjectForm() {
    const form = document.getElementById('projectForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Project created successfully!', 'success'); };
}

function filterProjects() {
    const q = document.getElementById('projectSearch').value.toLowerCase();
    const f = document.getElementById('projectFilter').value;
    const filtered = projects.filter(p => {
        const matchQ = p.name.toLowerCase().includes(q) || p.client.toLowerCase().includes(q);
        const matchF = f === 'all' || p.status === f;
        return matchQ && matchF;
    });
    document.getElementById('projectGrid').innerHTML = filtered.map(projectCard).join('') || '<p class="col-span-full text-center text-slate-500 py-12">No projects found</p>';
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderProjects();

    const projectSearch = document.getElementById('projectSearch');
    const projectFilter = document.getElementById('projectFilter');
    if (projectSearch) projectSearch.oninput = filterProjects;
    if (projectFilter) projectFilter.onchange = filterProjects;
});
