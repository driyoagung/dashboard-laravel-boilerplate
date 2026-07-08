/* =========================================================
   Calendar Page
   ========================================================= */

const events = [
    { date: 3, title: 'Team Standup', time: '09:00', color: 'indigo' },
    { date: 5, title: 'Client Review', time: '14:00', color: 'emerald' },
    { date: 8, title: 'Sprint Planning', time: '10:00', color: 'amber' },
    { date: 12, title: 'Design Workshop', time: '13:00', color: 'rose' },
    { date: 15, title: 'Project Deadline', time: '17:00', color: 'sky' },
    { date: 18, title: 'Team Lunch', time: '12:00', color: 'emerald' },
    { date: 22, title: 'Product Demo', time: '15:00', color: 'indigo' },
    { date: 25, title: 'Monthly Review', time: '10:00', color: 'amber' },
    { date: 28, title: 'Strategy Meeting', time: '11:00', color: 'rose' },
];

function renderCalendar() {
    const daysInMonth = 31;
    const firstDay = 0;
    const today = 1;
    let cells = '';
    for (let i = 0; i < firstDay; i++) cells += '<div></div>';
    for (let d = 1; d <= daysInMonth; d++) {
        const ev = events.find(e => e.date === d);
        const isToday = d === today;
        cells += `
            <div onclick="openDayDetail(${d})" class="aspect-square border border-slate-200 rounded-lg p-2 hover:border-indigo-300 cursor-pointer ${isToday ? 'bg-indigo-50 border-indigo-300' : 'bg-white'}">
                <p class="text-xs font-semibold ${isToday ? 'text-indigo-600' : 'text-slate-700'}">${d}</p>
                ${ev ? `<div class="mt-1 text-xs bg-${ev.color}-100 text-${ev.color}-700 px-1.5 py-0.5 rounded truncate">${ev.title}</div>` : ''}
            </div>
        `;
    }
    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Calendar</h2>
                <p class="text-sm text-slate-500 mt-1">July 2026</p>
            </div>
            <div class="flex gap-2">
                <button onclick="showToast('Previous month', 'info')" class="p-2 border border-slate-200 rounded-lg hover:bg-slate-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="showToast('Today', 'info')" class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-semibold hover:bg-slate-50">Today</button>
                <button onclick="showToast('Next month', 'info')" class="p-2 border border-slate-200 rounded-lg hover:bg-slate-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
                <button onclick="openCreateEventModal()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Event
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <div class="lg:col-span-3 bg-white border border-slate-200 rounded-2xl p-5">
                <div class="grid grid-cols-7 gap-2 mb-2">
                    ${['Sun','Mon','Tue','Wed','Thu','Fri','Sat'].map(d => `<div class="text-center text-xs font-semibold text-slate-500 py-2">${d}</div>`).join('')}
                </div>
                <div class="grid grid-cols-7 gap-2">${cells}</div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-5">
                <h3 class="font-bold text-slate-900 mb-4">Upcoming Events</h3>
                <div class="space-y-3">
                    ${events.slice(0, 5).map(e => `
                        <div class="flex gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer" onclick="openDayDetail(${e.date})">
                            <div class="w-10 h-10 rounded-lg bg-${e.color}-100 flex flex-col items-center justify-center flex-shrink-0">
                                <span class="text-[10px] text-${e.color}-600 font-semibold">JUL</span>
                                <span class="text-sm font-bold text-${e.color}-700 -mt-0.5">${e.date}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-900 truncate">${e.title}</p>
                                <p class="text-xs text-slate-500">${e.time}</p>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        </div>
    `;
}

function openDayDetail(day) {
    const dayEvents = events.filter(e => e.date === day);
    openModal(`
        <div class="p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">July ${day}, 2026</h3>
                    <p class="text-sm text-slate-500">${dayEvents.length} event(s)</p>
                </div>
                <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            ${dayEvents.length === 0 ? `<p class="text-sm text-slate-500 text-center py-8">No events scheduled for this day.</p>` :
                dayEvents.map(e => `
                    <div class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg mb-2">
                        <div class="w-10 h-10 rounded-lg bg-${e.color}-100 flex items-center justify-center">
                            <span class="text-${e.color}-600 font-bold text-sm">${e.date}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">${e.title}</p>
                            <p class="text-xs text-slate-500">${e.time}</p>
                        </div>
                        <button onclick="closeModal(); confirmAction('Delete Event', 'Remove this event?', () => showToast('Event deleted', 'success'))" class="p-1 rounded hover:bg-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/></svg>
                        </button>
                    </div>
                `).join('')
            }
            <button onclick="closeModal(); openCreateEventModal(${day})" class="mt-4 w-full px-4 py-2.5 border border-indigo-200 text-indigo-600 rounded-lg text-sm font-semibold hover:bg-indigo-50">+ Add Event</button>
        </div>
    `);
}

function openCreateEventModal(day = '') {
    openModalFromTemplate('createEventModalTemplate');
    const dateInput = document.getElementById('eventDate');
    if (dateInput && day) dateInput.value = day;

    const form = document.getElementById('eventForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Event created!', 'success'); };

    document.querySelectorAll('.event-color-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.event-color-btn').forEach(b => {
                b.classList.remove('ring-2', 'ring-offset-2', `ring-${b.dataset.color}-500`);
            });
            btn.classList.add('ring-2', 'ring-offset-2', `ring-${btn.dataset.color}-500`);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderCalendar();
});
