<template id="createProjectModalTemplate">
    <div class="p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-slate-900">Create New Project</h3>
            <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="projectForm" class="space-y-4">
            <div>
                <label class="text-sm font-medium text-slate-700">Project Name</label>
                <input required type="text" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" placeholder="e.g. Website Redesign"/>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Client</label>
                <input type="text" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Client name"/>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm font-medium text-slate-700">Due Date</label>
                    <input type="date" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Priority</label>
                    <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                        <option>Low</option><option>Medium</option><option>High</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Description</label>
                <textarea rows="3" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Brief description..."></textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Create Project</button>
            </div>
        </form>
    </div>
</template>
