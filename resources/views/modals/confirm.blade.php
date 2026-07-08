<template id="confirmModalTemplate">
    <div class="p-6">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <div class="flex-1">
                <h3 id="confirmTitle" class="text-lg font-bold text-slate-900"></h3>
                <p id="confirmMessage" class="text-sm text-slate-600 mt-1"></p>
            </div>
        </div>
        <div class="flex gap-3 mt-6">
            <button onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
            <button id="confirmBtn" class="flex-1 px-4 py-2.5 bg-rose-600 text-white rounded-lg text-sm font-semibold hover:bg-rose-700">Confirm</button>
        </div>
    </div>
</template>
