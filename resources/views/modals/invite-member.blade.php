<template id="inviteMemberModalTemplate">
    <div class="p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-slate-900">Invite Team Member</h3>
            <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="inviteForm" class="space-y-4">
            <div>
                <label class="text-sm font-medium text-slate-700">Email Address</label>
                <input required type="email" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="colleague@company.com"/>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Role</label>
                <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                    <option>Member</option><option>Admin</option><option>Viewer</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Personal Message (optional)</label>
                <textarea rows="3" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Add a message..."></textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Send Invite</button>
            </div>
        </form>
    </div>
</template>
