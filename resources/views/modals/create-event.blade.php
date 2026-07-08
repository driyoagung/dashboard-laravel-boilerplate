<template id="createEventModalTemplate">
    <div class="p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-slate-900">Create Event</h3>
            <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="eventForm" class="space-y-4">
            <div>
                <label class="text-sm font-medium text-slate-700">Event Title</label>
                <input required type="text" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Meeting, deadline, etc."/>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm font-medium text-slate-700">Date</label>
                    <input id="eventDate" type="number" min="1" max="31" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Day"/>
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Time</label>
                    <input type="time" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Color</label>
                <div class="flex gap-2 mt-1">
                    <button type="button" class="event-color-btn w-8 h-8 rounded-full bg-indigo-500 ring-2 ring-offset-2 ring-indigo-500" data-color="indigo"></button>
                    <button type="button" class="event-color-btn w-8 h-8 rounded-full bg-emerald-500" data-color="emerald"></button>
                    <button type="button" class="event-color-btn w-8 h-8 rounded-full bg-amber-500" data-color="amber"></button>
                    <button type="button" class="event-color-btn w-8 h-8 rounded-full bg-rose-500" data-color="rose"></button>
                    <button type="button" class="event-color-btn w-8 h-8 rounded-full bg-sky-500" data-color="sky"></button>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Create Event</button>
            </div>
        </form>
    </div>
</template>
