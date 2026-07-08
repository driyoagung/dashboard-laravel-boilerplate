<template id="fileDetailModalTemplate">
    <div class="p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-slate-900">File Details</h3>
            <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="bg-slate-50 rounded-xl p-8 flex items-center justify-center mb-5">
            <div id="fdIcon" class="w-20 h-20 rounded-2xl flex items-center justify-center"></div>
        </div>
        <h4 id="fdTitle" class="font-semibold text-slate-900"></h4>
        <div class="grid grid-cols-2 gap-3 mt-4">
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Type</p>
                <p id="fdType" class="text-sm font-semibold text-slate-900 mt-0.5"></p>
            </div>
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Size</p>
                <p id="fdSize" class="text-sm font-semibold text-slate-900 mt-0.5"></p>
            </div>
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Category</p>
                <p id="fdCategory" class="text-sm font-semibold text-slate-900 capitalize mt-0.5"></p>
            </div>
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Updated</p>
                <p id="fdUpdated" class="text-sm font-semibold text-slate-900 mt-0.5"></p>
            </div>
        </div>
        <div class="flex gap-3 mt-5">
            <button onclick="closeModal(); showToast('File downloaded', 'success')" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Download</button>
            <button onclick="closeModal(); showToast('Link copied!', 'success')" class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Share</button>
        </div>
    </div>
</template>
