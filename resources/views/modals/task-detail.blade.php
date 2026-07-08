<template id="taskDetailModalTemplate">
    <div class="p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-slate-900">Task Details</h3>
            <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-4">
            <div>
                <p class="text-xs text-slate-500">Title</p>
                <p id="tdTitle" class="text-base font-semibold text-slate-900 mt-1"></p>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="text-xs text-slate-500">Priority</p>
                    <p id="tdPriority" class="text-sm font-semibold text-slate-900 capitalize mt-1"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500">Tag</p>
                    <p id="tdTag" class="text-sm font-semibold text-slate-900 mt-1"></p>
                </div>
            </div>
            <div>
                <p class="text-xs text-slate-500">Description</p>
                <p class="text-sm text-slate-700 mt-1">Add detailed description, notes, and requirements for this task.</p>
            </div>
            <div>
                <p class="text-xs text-slate-500 mb-2">Subtasks</p>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded"/> Research phase</label>
                    <label class="flex items-center gap-2 text-sm"><input type="checkbox" checked class="rounded"/> Initial draft</label>
                    <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded"/> Review & feedback</label>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button id="tdDeleteBtn" class="px-4 py-2.5 border border-rose-200 text-rose-600 rounded-lg text-sm font-semibold hover:bg-rose-50">Delete</button>
                <button onclick="closeModal(); showToast('Task updated', 'success')" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Save Changes</button>
            </div>
        </div>
    </div>
</template>
