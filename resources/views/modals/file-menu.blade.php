<template id="fileMenuModalTemplate">
    <div class="p-4">
        <h3 id="fmTitle" class="text-base font-bold text-slate-900 mb-3 px-2"></h3>
        <div class="space-y-1">
            <button onclick="closeModal(); showToast('Opening file...', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Open</button>
            <button onclick="closeModal(); showToast('Downloaded', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Download</button>
            <button onclick="closeModal(); showToast('Link copied!', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Share</button>
            <button onclick="closeModal(); showToast('Rename mode', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Rename</button>
            <button id="fmDeleteBtn" class="w-full text-left px-3 py-2 rounded-lg hover:bg-rose-50 text-rose-600 text-sm">Delete</button>
        </div>
    </div>
</template>
