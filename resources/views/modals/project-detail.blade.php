<template id="projectDetailModalTemplate">
    <div class="p-6">
        <div class="flex items-start justify-between mb-5">
            <div class="flex items-center gap-3">
                <div id="pdIcon" class="w-12 h-12 rounded-lg flex items-center justify-center">
                    <span id="pdIconText" class="font-bold text-lg"></span>
                </div>
                <div>
                    <h3 id="pdName" class="text-lg font-bold text-slate-900"></h3>
                    <p id="pdClient" class="text-sm text-slate-500"></p>
                </div>
            </div>
            <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="grid grid-cols-3 gap-3 mb-5">
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Status</p>
                <p id="pdStatus" class="text-sm font-semibold text-slate-900 capitalize mt-0.5"></p>
            </div>
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Progress</p>
                <p id="pdProgress" class="text-sm font-semibold text-slate-900 mt-0.5"></p>
            </div>
            <div class="bg-slate-50 rounded-lg p-3">
                <p class="text-xs text-slate-500">Due Date</p>
                <p id="pdDue" class="text-sm font-semibold text-slate-900 mt-0.5"></p>
            </div>
        </div>
        <div class="mb-5">
            <p class="text-sm font-medium text-slate-700 mb-2">Team Members (<span id="pdMemberCount"></span>)</p>
            <div id="pdMembers" class="flex -space-x-2"></div>
        </div>
        <div class="flex gap-3">
            <button id="pdOpenBtn" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Open Project</button>
            <button id="pdArchiveBtn" class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Archive</button>
        </div>
    </div>
</template>
