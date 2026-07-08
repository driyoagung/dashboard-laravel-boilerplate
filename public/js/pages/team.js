/* =========================================================
   Team Page
   ========================================================= */

const teamMembers = [
    { id: 1, name: 'Sarah Mitchell', role: 'Lead Designer', avatar: 12, status: 'online', projects: 4 },
    { id: 2, name: 'David Chen', role: 'Full Stack Developer', avatar: 32, status: 'online', projects: 3 },
    { id: 3, name: 'Raka Wijaya', role: 'Product Manager', avatar: 5, status: 'away', projects: 5 },
    { id: 4, name: 'Lina Hartono', role: 'UX Researcher', avatar: 20, status: 'online', projects: 2 },
    { id: 5, name: 'Budi Santoso', role: 'DevOps Engineer', avatar: 15, status: 'offline', projects: 3 },
    { id: 6, name: 'Maya Rodriguez', role: 'Content Strategist', avatar: 25, status: 'online', projects: 4 },
];

function statusDotColor(s) {
    return { online: 'bg-emerald-500', away: 'bg-amber-500', offline: 'bg-slate-400' }[s];
}

function renderTeam() {
    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Team</h2>
                <p class="text-sm text-slate-500 mt-1">${teamMembers.length} members &middot; ${teamMembers.filter(m => m.status === 'online').length} online</p>
            </div>
            <button onclick="openModalFromTemplate('inviteMemberModalTemplate'); bindInviteForm()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Invite Member
            </button>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-4 mb-6">
            <div class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" placeholder="Search members..." class="bg-transparent outline-none text-sm flex-1"/>
                </div>
                <select class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                    <option>All Roles</option><option>Designers</option><option>Developers</option><option>Managers</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            ${teamMembers.map(m => `
                <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 transition">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <img src="https://i.pravatar.cc/80?img=${m.avatar}" class="w-14 h-14 rounded-full" alt=""/>
                                <span class="absolute bottom-0 right-0 w-3.5 h-3.5 ${statusDotColor(m.status)} rounded-full ring-2 ring-white"></span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900">${m.name}</h4>
                                <p class="text-xs text-slate-500">${m.role}</p>
                            </div>
                        </div>
                        <button onclick="openMemberMenu(${m.id})" class="p-1 rounded hover:bg-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div>
                            <p class="text-xs text-slate-500">Active Projects</p>
                            <p class="text-lg font-bold text-slate-900">${m.projects}</p>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="showToast('Message sent to ${m.name}', 'success')" class="p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            </button>
                            <button onclick="showToast('Viewing profile', 'info')" class="p-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('')}
        </div>
    `;
}

function openMemberMenu(id) {
    const m = teamMembers.find(x => x.id === id);
    if (!m) return;
    openModal(`
        <div class="p-4">
            <h3 class="text-base font-bold text-slate-900 mb-3 px-2">${m.name}</h3>
            <div class="space-y-1">
                <button onclick="closeModal(); showToast('Viewing profile', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">View Profile</button>
                <button onclick="closeModal(); showToast('Message sent', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Send Message</button>
                <button onclick="closeModal(); showToast('Edit mode', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Edit Role</button>
                <button onclick="closeModal(); confirmAction('Remove Member', 'Remove ${m.name} from the team?', () => showToast('Member removed', 'success'))" class="w-full text-left px-3 py-2 rounded-lg hover:bg-rose-50 text-rose-600 text-sm">Remove from Team</button>
            </div>
        </div>
    `);
}

function bindInviteForm() {
    const form = document.getElementById('inviteForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Invite sent!', 'success'); };
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderTeam();
});
