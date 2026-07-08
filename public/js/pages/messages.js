/* =========================================================
   Messages Page
   ========================================================= */

const conversations = [
    { id: 1, name: 'Sarah Mitchell', avatar: 12, lastMsg: 'Can you review the latest mockups?', time: '10:24', unread: 2, online: true },
    { id: 2, name: 'Design Team', avatar: 32, lastMsg: 'David: New palette uploaded', time: '09:15', unread: 0, online: true },
    { id: 3, name: 'Raka Wijaya', avatar: 5, lastMsg: 'Thanks for the feedback!', time: 'Yesterday', unread: 0, online: false },
    { id: 4, name: 'Lina Hartono', avatar: 20, lastMsg: 'Meeting moved to 3 PM', time: 'Yesterday', unread: 1, online: true },
    { id: 5, name: 'Budi Santoso', avatar: 15, lastMsg: 'The report is ready', time: 'Mon', unread: 0, online: false },
];

const messages = [
    { from: 'Sarah Mitchell', text: 'Hi Andini! How is the homepage redesign going?', time: '10:20', me: false },
    { from: 'me', text: 'Hi Sarah! Almost done with the hero section. Should I send the preview?', time: '10:22', me: true },
    { from: 'Sarah Mitchell', text: 'Yes please! Also, can you check the mobile breakpoints?', time: '10:23', me: false },
    { from: 'Sarah Mitchell', text: 'Can you review the latest mockups?', time: '10:24', me: false },
];

const teamMembers = [
    { id: 1, name: 'Sarah Mitchell', role: 'Lead Designer', avatar: 12, status: 'online', projects: 4 },
    { id: 2, name: 'David Chen', role: 'Full Stack Developer', avatar: 32, status: 'online', projects: 3 },
    { id: 3, name: 'Raka Wijaya', role: 'Product Manager', avatar: 5, status: 'away', projects: 5 },
    { id: 4, name: 'Lina Hartono', role: 'UX Researcher', avatar: 20, status: 'online', projects: 2 },
    { id: 5, name: 'Budi Santoso', role: 'DevOps Engineer', avatar: 15, status: 'offline', projects: 3 },
    { id: 6, name: 'Maya Rodriguez', role: 'Content Strategist', avatar: 25, status: 'online', projects: 4 },
];

function renderMessages() {
    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Messages</h2>
                <p class="text-sm text-slate-500 mt-1">Chat with your team</p>
            </div>
            <button onclick="openNewChatModal()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                New Chat
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 bg-white border border-slate-200 rounded-2xl overflow-hidden" style="min-height: 600px;">
            <div class="lg:col-span-1 border-r border-slate-200 flex flex-col">
                <div class="p-4 border-b border-slate-100">
                    <div class="flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search conversations..." class="bg-transparent outline-none text-sm flex-1"/>
                    </div>
                </div>
                <div class="flex-1 overflow-y-auto scrollbar-thin">
                    ${conversations.map((c, i) => `
                        <div onclick="selectConversation(${c.id})" class="flex items-center gap-3 p-4 border-b border-slate-100 hover:bg-slate-50 cursor-pointer ${i===0 ? 'bg-indigo-50/50' : ''}">
                            <div class="relative">
                                <img src="https://i.pravatar.cc/80?img=${c.avatar}" class="w-10 h-10 rounded-full" alt=""/>
                                ${c.online ? '<span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 rounded-full ring-2 ring-white"></span>' : ''}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-slate-900 truncate">${c.name}</p>
                                    <span class="text-xs text-slate-500">${c.time}</span>
                                </div>
                                <p class="text-xs text-slate-500 truncate mt-0.5">${c.lastMsg}</p>
                            </div>
                            ${c.unread > 0 ? `<span class="w-5 h-5 rounded-full bg-indigo-600 text-white text-xs flex items-center justify-center font-semibold">${c.unread}</span>` : ''}
                        </div>
                    `).join('')}
                </div>
            </div>

            <div class="lg:col-span-2 flex flex-col">
                <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/80?img=12" class="w-10 h-10 rounded-full" alt=""/>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Sarah Mitchell</p>
                            <p class="text-xs text-emerald-600">&#x25CF; Online</p>
                        </div>
                    </div>
                    <div class="flex gap-1">
                        <button onclick="showToast('Calling...', 'info')" class="p-2 rounded-lg hover:bg-slate-100">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </button>
                        <button onclick="showToast('Video call started', 'info')" class="p-2 rounded-lg hover:bg-slate-100">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="flex-1 overflow-y-auto scrollbar-thin p-5 space-y-4 bg-slate-50/50">
                    ${messages.map(m => `
                        <div class="flex ${m.me ? 'justify-end' : 'justify-start'}">
                            <div class="max-w-[70%] ${m.me ? 'bg-indigo-600 text-white' : 'bg-white border border-slate-200'} rounded-2xl px-4 py-2.5">
                                <p class="text-sm">${m.text}</p>
                                <p class="text-xs ${m.me ? 'text-indigo-200' : 'text-slate-400'} mt-1">${m.time}</p>
                            </div>
                        </div>
                    `).join('')}
                </div>
                <div class="p-4 border-t border-slate-100">
                    <form onsubmit="event.preventDefault(); sendMessage()" class="flex items-center gap-2">
                        <button type="button" onclick="showToast('Attach file', 'info')" class="p-2 rounded-lg hover:bg-slate-100">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                        </button>
                        <input id="messageInput" type="text" placeholder="Type a message..." class="flex-1 bg-slate-100 rounded-lg px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-indigo-500"/>
                        <button type="submit" class="p-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    `;
}

function selectConversation(id) {
    showToast('Conversation loaded', 'info');
}

function sendMessage() {
    const input = document.getElementById('messageInput');
    if (input && input.value.trim()) {
        showToast('Message sent', 'success');
        input.value = '';
    }
}

function openNewChatModal() {
    openModalFromTemplate('newChatModalTemplate');
    document.getElementById('memberList').innerHTML = teamMembers.map(m => `
        <div onclick="closeModal(); showToast('Chat with ${m.name} started', 'success')" class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer">
            <img src="https://i.pravatar.cc/80?img=${m.avatar}" class="w-10 h-10 rounded-full" alt=""/>
            <div class="flex-1">
                <p class="text-sm font-semibold text-slate-900">${m.name}</p>
                <p class="text-xs text-slate-500">${m.role}</p>
            </div>
        </div>
    `).join('');
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderMessages();
});
