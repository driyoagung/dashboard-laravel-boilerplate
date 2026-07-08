/* =========================================================
   Tasks Page
   ========================================================= */

const tasks = {
    todo: [
        { id: 1, title: 'Review wireframes for homepage', priority: 'high', tag: 'Design' },
        { id: 2, title: 'Write API documentation', priority: 'medium', tag: 'Dev' },
        { id: 3, title: 'Schedule client meeting', priority: 'low', tag: 'Management' },
    ],
    inprogress: [
        { id: 4, title: 'Implement user authentication', priority: 'high', tag: 'Dev' },
        { id: 5, title: 'Design email templates', priority: 'medium', tag: 'Design' },
    ],
    done: [
        { id: 6, title: 'Setup project repository', priority: 'low', tag: 'Dev' },
        { id: 7, title: 'Create brand moodboard', priority: 'medium', tag: 'Design' },
    ]
};

function taskCard(t, col) {
    const priorityColor = { high: 'rose', medium: 'amber', low: 'emerald' }[t.priority];
    return `
        <div class="bg-white rounded-xl p-4 border border-slate-200 hover:border-indigo-300 transition cursor-pointer" onclick="openTaskDetail(${t.id})">
            <div class="flex items-start justify-between mb-2">
                <span class="text-xs font-semibold bg-${priorityColor}-50 text-${priorityColor}-700 px-2 py-0.5 rounded">${t.priority}</span>
                <button onclick="event.stopPropagation(); toggleTaskDone(${t.id}, '${col}')" class="p-1 rounded hover:bg-slate-100">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
            <p class="text-sm font-medium text-slate-900 ${col === 'done' ? 'line-through text-slate-400' : ''}">${t.title}</p>
            <div class="flex items-center justify-between mt-3">
                <span class="text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded">${t.tag}</span>
                <img src="https://i.pravatar.cc/40?img=${(t.id % 20) + 1}" class="w-6 h-6 rounded-full" alt=""/>
            </div>
        </div>
    `;
}

function kanbanColumn(title, key, items, color) {
    return `
        <div class="bg-slate-100 rounded-2xl p-4">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-${color}-500"></div>
                    <h3 class="font-semibold text-slate-900">${title}</h3>
                    <span class="text-xs bg-white text-slate-600 px-2 py-0.5 rounded-full">${items.length}</span>
                </div>
                <button onclick="openCreateTaskModal('${key}')" class="p-1 rounded hover:bg-white">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                </button>
            </div>
            <div class="space-y-2">
                ${items.map(t => taskCard(t, key)).join('')}
            </div>
        </div>
    `;
}

function renderTasks() {
    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Tasks</h2>
                <p class="text-sm text-slate-500 mt-1">Organize and track your work</p>
            </div>
            <button onclick="openCreateTaskModal()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Add Task
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            ${kanbanColumn('To Do', 'todo', tasks.todo, 'slate')}
            ${kanbanColumn('In Progress', 'inprogress', tasks.inprogress, 'indigo')}
            ${kanbanColumn('Done', 'done', tasks.done, 'emerald')}
        </div>
    `;
}

function openCreateTaskModal(column = 'todo') {
    openModalFromTemplate('createTaskModalTemplate');
    const col = document.getElementById('taskColumn');
    if (col) col.value = column;
    bindTaskForm();
}

function openTaskDetail(id) {
    const allTasks = [...tasks.todo, ...tasks.inprogress, ...tasks.done];
    const t = allTasks.find(x => x.id === id);
    if (!t) return;
    openModalFromTemplate('taskDetailModalTemplate');
    document.getElementById('tdTitle').textContent = t.title;
    document.getElementById('tdPriority').textContent = t.priority;
    document.getElementById('tdTag').textContent = t.tag;
    document.getElementById('tdDeleteBtn').onclick = () => {
        closeModal();
        confirmAction('Delete Task', 'Delete this task permanently?', () => showToast('Task deleted', 'success'));
    };
}

function toggleTaskDone(id, col) {
    showToast('Task moved to Done!', 'success');
}

function bindTaskForm() {
    const form = document.getElementById('taskForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Task added successfully!', 'success'); };
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderTasks();
});
