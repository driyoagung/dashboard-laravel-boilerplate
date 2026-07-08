/* =========================================================
   Dashboard Page
   ========================================================= */

const projects = [
    { id: 1, name: 'Website Redesign', client: 'Acme Corp', status: 'active', progress: 68, members: 5, due: 'Jul 15', color: 'indigo' },
    { id: 2, name: 'Mobile App MVP', client: 'StartupXYZ', status: 'active', progress: 42, members: 3, due: 'Aug 02', color: 'emerald' },
    { id: 3, name: 'Brand Guidelines', client: 'Nova Inc', status: 'review', progress: 90, members: 2, due: 'Jun 28', color: 'amber' },
    { id: 4, name: 'Marketing Campaign', client: 'TechFlow', status: 'active', progress: 25, members: 4, due: 'Jul 30', color: 'sky' },
    { id: 5, name: 'E-commerce Platform', client: 'ShopMore', status: 'paused', progress: 55, members: 6, due: 'Aug 20', color: 'rose' },
    { id: 6, name: 'Analytics Dashboard', client: 'DataViz Co', status: 'completed', progress: 100, members: 3, due: 'Jun 10', color: 'slate' },
];

function statCard(label, value, change, color, iconPath) {
    return `
        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex items-center justify-between">
                <div class="w-10 h-10 rounded-lg bg-${color}-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-${color}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">${iconPath}</svg>
                </div>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">${change}</span>
            </div>
            <p class="text-2xl font-bold text-slate-900 mt-4">${value}</p>
            <p class="text-sm text-slate-500">${label}</p>
        </div>
    `;
}

function activityItem(color, text, time) {
    return `
        <div class="flex items-start gap-3 p-2 rounded-lg hover:bg-slate-50">
            <div class="w-8 h-8 rounded-lg bg-${color}-50 flex items-center justify-center flex-shrink-0">
                <div class="w-2 h-2 rounded-full bg-${color}-500"></div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-slate-900">${text}</p>
                <p class="text-xs text-slate-500 mt-0.5">${time}</p>
            </div>
        </div>
    `;
}

function renderDashboard() {
    return `
        <section class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <p class="text-sm text-slate-500">Wednesday, July 01, 2026</p>
                <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 mt-1">Welcome back, Andini &#x1F44B;</h2>
                <p class="text-slate-600 mt-1 text-sm max-w-xl">You have <span class="font-semibold text-indigo-600">5 tasks</span> pending and <span class="font-semibold text-indigo-600">2 meetings</span> today. Let's make it productive!</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-slate-500">Weekly Goal</p>
                    <p class="text-lg font-bold text-slate-900">5 / 7 tasks</p>
                </div>
                <div class="relative w-16 h-16">
                    <svg class="w-16 h-16 -rotate-90">
                        <circle cx="32" cy="32" r="28" stroke="#e2e8f0" stroke-width="6" fill="none"/>
                        <circle cx="32" cy="32" r="28" stroke="#4f46e5" stroke-width="6" fill="none" stroke-dasharray="175.9" stroke-dashoffset="50" stroke-linecap="round"/>
                    </svg>
                    <span class="absolute inset-0 flex items-center justify-center text-sm font-bold text-slate-900">71%</span>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
            ${statCard('Total Projects', '24', '+3', 'indigo', '<path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>')}
            ${statCard('Active Tasks', '18', '+5', 'emerald', '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>')}
            ${statCard('Team Members', '12', '+1', 'sky', '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>')}
            ${statCard('Completed', '156', '+12', 'amber', '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>')}
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Activity Overview</h3>
                        <p class="text-sm text-slate-500">Tasks completed this week</p>
                    </div>
                    <div class="flex gap-1 bg-slate-100 p-1 rounded-lg">
                        <button class="text-xs font-semibold px-3 py-1.5 rounded-md bg-white text-slate-900 shadow-sm">Week</button>
                        <button class="text-xs font-semibold px-3 py-1.5 rounded-md text-slate-500">Month</button>
                    </div>
                </div>
                <div class="flex items-end justify-between gap-3 h-56 px-2">
                    ${['Mon','Tue','Wed','Thu','Fri','Sat','Sun'].map((d,i) => {
                        const heights = [40,65,50,80,70,30,90];
                        const isToday = i === 2;
                        return `<div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full ${isToday ? 'bg-indigo-600 ring-2 ring-indigo-300' : 'bg-indigo-600'} rounded-t-md" style="height:${heights[i]}%"></div>
                            <span class="text-xs ${isToday ? 'font-semibold text-indigo-600' : 'text-slate-500'}">${isToday ? 'Today' : d}</span>
                        </div>`;
                    }).join('')}
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-bold text-slate-900">Quick Actions</h3>
                </div>
                <div class="space-y-2">
                    <button onclick="openModalFromTemplate('createProjectModalTemplate'); bindProjectForm()" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-indigo-300 hover:bg-indigo-50/50 transition text-left">
                        <div class="w-9 h-9 rounded-lg bg-indigo-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">New Project</p>
                            <p class="text-xs text-slate-500">Create a new workspace</p>
                        </div>
                    </button>
                    <button onclick="openModalFromTemplate('createTaskModalTemplate'); bindTaskForm()" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50/50 transition text-left">
                        <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">Add Task</p>
                            <p class="text-xs text-slate-500">Create a new task</p>
                        </div>
                    </button>
                    <button onclick="openModalFromTemplate('inviteMemberModalTemplate'); bindInviteForm()" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-sky-300 hover:bg-sky-50/50 transition text-left">
                        <div class="w-9 h-9 rounded-lg bg-sky-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">Invite Member</p>
                            <p class="text-xs text-slate-500">Add to your team</p>
                        </div>
                    </button>
                    <button onclick="window.location='/analytics'" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-amber-300 hover:bg-amber-50/50 transition text-left">
                        <div class="w-9 h-9 rounded-lg bg-amber-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">View Analytics</p>
                            <p class="text-xs text-slate-500">Performance insights</p>
                        </div>
                    </button>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-bold text-slate-900">Recent Projects</h3>
                    <a href="/projects" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all &rarr;</a>
                </div>
                <div class="space-y-3">
                    ${projects.slice(0, 4).map(p => `
                        <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 cursor-pointer" onclick="openProjectDetail(${p.id})">
                            <div class="w-10 h-10 rounded-lg bg-${p.color}-100 flex items-center justify-center flex-shrink-0">
                                <span class="text-${p.color}-600 font-bold text-sm">${p.name.charAt(0)}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-900 truncate">${p.name}</p>
                                <p class="text-xs text-slate-500">${p.client} &middot; Due ${p.due}</p>
                            </div>
                            <span class="text-xs font-semibold ${statusColor(p.status)} px-2 py-1 rounded-full">${p.status}</span>
                        </div>
                    `).join('')}
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-bold text-slate-900">Recent Activity</h3>
                    <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all &rarr;</button>
                </div>
                <div class="space-y-3">
                    ${activityItem('emerald', 'Completed task "Homepage wireframes"', '2 hours ago')}
                    ${activityItem('indigo', 'Created new project "Mobile App"', '5 hours ago')}
                    ${activityItem('amber', 'Uploaded 3 files to Library', 'Yesterday')}
                    ${activityItem('sky', 'Invited Lina Hartono to team', '2 days ago')}
                    ${activityItem('rose', 'Commented on "Brand Guidelines"', '3 days ago')}
                </div>
            </div>
        </section>
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

function bindProjectForm() {
    const form = document.getElementById('projectForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Project created successfully!', 'success'); };
}

function bindTaskForm() {
    const form = document.getElementById('taskForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Task added successfully!', 'success'); };
}

function bindInviteForm() {
    const form = document.getElementById('inviteForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Invite sent!', 'success'); };
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderDashboard();
});
