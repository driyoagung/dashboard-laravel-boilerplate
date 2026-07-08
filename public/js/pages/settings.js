/* =========================================================
   Settings Page
   ========================================================= */

const state = { settingsTab: 'profile' };

const tabs = [
    { id: 'profile', label: 'Profile', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>' },
    { id: 'notifications', label: 'Notifications', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>' },
    { id: 'security', label: 'Security', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>' },
    { id: 'billing', label: 'Billing', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>' },
    { id: 'preferences', label: 'Preferences', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>' },
];

function setSettingsTab(tab) {
    state.settingsTab = tab;
    document.getElementById('pageContent').innerHTML = renderSettings();
}

function settingsContent() {
    const tab = state.settingsTab;
    if (tab === 'profile') return `
        <h3 class="text-lg font-bold text-slate-900 mb-1">Profile Information</h3>
        <p class="text-sm text-slate-500 mb-6">Update your personal details</p>
        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-100">
            <img src="https://i.pravatar.cc/80?img=47" class="w-20 h-20 rounded-full" alt=""/>
            <div>
                <button onclick="showToast('Upload dialog opened', 'info')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Change Photo</button>
                <button onclick="showToast('Photo removed', 'success')" class="ml-2 px-4 py-2 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Remove</button>
                <p class="text-xs text-slate-500 mt-2">JPG, PNG. Max 2MB.</p>
            </div>
        </div>
        <form onsubmit="event.preventDefault(); showToast('Profile updated!', 'success')" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-slate-700">First Name</label>
                    <input type="text" value="Andini" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
                </div>
                <div>
                    <label class="text-sm font-medium text-slate-700">Last Name</label>
                    <input type="text" value="Pratiwi" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Email</label>
                <input type="email" value="andini@app.com" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Bio</label>
                <textarea rows="3" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">Product designer with 5+ years of experience.</textarea>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="showToast('Changes discarded', 'info')" class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Save Changes</button>
            </div>
        </form>
    `;
    if (tab === 'notifications') return `
        <h3 class="text-lg font-bold text-slate-900 mb-1">Notification Preferences</h3>
        <p class="text-sm text-slate-500 mb-6">Choose what you want to be notified about</p>
        <div class="space-y-4">
            ${[
                { title: 'Email Notifications', desc: 'Receive updates via email', on: true },
                { title: 'Push Notifications', desc: 'Browser push notifications', on: true },
                { title: 'Task Assignments', desc: 'When a task is assigned to you', on: true },
                { title: 'Project Updates', desc: 'Status changes in your projects', on: false },
                { title: 'Team Messages', desc: 'New messages from team members', on: true },
                { title: 'Marketing Emails', desc: 'Product news and offers', on: false },
            ].map(n => `
                <div class="flex items-center justify-between p-4 border border-slate-200 rounded-lg">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">${n.title}</p>
                        <p class="text-xs text-slate-500 mt-0.5">${n.desc}</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" ${n.on ? 'checked' : ''} class="sr-only peer" onchange="showToast('Preference updated', 'success')"/>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:ring-2 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-indigo-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
            `).join('')}
        </div>
    `;
    if (tab === 'security') return `
        <h3 class="text-lg font-bold text-slate-900 mb-1">Security Settings</h3>
        <p class="text-sm text-slate-500 mb-6">Keep your account safe</p>
        <div class="space-y-4">
            <div class="p-4 border border-slate-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Password</p>
                        <p class="text-xs text-slate-500 mt-0.5">Last changed 3 months ago</p>
                    </div>
                    <button onclick="openModalFromTemplate('changePasswordModalTemplate'); bindPasswordForm()" class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Change</button>
                </div>
            </div>
            <div class="p-4 border border-slate-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Two-Factor Authentication</p>
                        <p class="text-xs text-slate-500 mt-0.5">Add extra security to your account</p>
                    </div>
                    <button onclick="showToast('2FA setup started', 'info')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Enable</button>
                </div>
            </div>
            <div class="p-4 border border-slate-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Active Sessions</p>
                        <p class="text-xs text-slate-500 mt-0.5">3 devices currently logged in</p>
                    </div>
                    <button onclick="confirmAction('Sign Out All', 'Sign out from all other devices?', () => showToast('All sessions ended', 'success'))" class="px-4 py-2 border border-rose-200 text-rose-600 rounded-lg text-sm font-semibold hover:bg-rose-50">Sign Out All</button>
                </div>
            </div>
            <div class="p-4 border border-rose-200 bg-rose-50/50 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-rose-900">Delete Account</p>
                        <p class="text-xs text-rose-700 mt-0.5">Permanently delete your account and data</p>
                    </div>
                    <button onclick="confirmAction('Delete Account', 'This action is irreversible. All data will be lost.', () => showToast('Account deletion requested', 'warning'))" class="px-4 py-2 bg-rose-600 text-white rounded-lg text-sm font-semibold hover:bg-rose-700">Delete</button>
                </div>
            </div>
        </div>
    `;
    if (tab === 'billing') return `
        <h3 class="text-lg font-bold text-slate-900 mb-1">Billing & Subscription</h3>
        <p class="text-sm text-slate-500 mb-6">Manage your plan and payment methods</p>
        <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-5 mb-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-indigo-600 uppercase">Current Plan</p>
                    <p class="text-xl font-bold text-slate-900 mt-1">Pro Plan</p>
                    <p class="text-sm text-slate-600 mt-1">$29/month &middot; Renews Aug 1, 2026</p>
                </div>
                <button onclick="showToast('Opening plan selection...', 'info')" class="px-4 py-2 bg-white border border-indigo-200 text-indigo-700 rounded-lg text-sm font-semibold hover:bg-indigo-100">Change Plan</button>
            </div>
        </div>
        <h4 class="text-sm font-semibold text-slate-900 mb-3">Payment Method</h4>
        <div class="p-4 border border-slate-200 rounded-lg flex items-center gap-3 mb-4">
            <div class="w-12 h-8 bg-slate-900 rounded flex items-center justify-center">
                <span class="text-white text-xs font-bold">VISA</span>
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold text-slate-900">&#x2022;&#x2022;&#x2022;&#x2022; &#x2022;&#x2022;&#x2022;&#x2022; &#x2022;&#x2022;&#x2022;&#x2022; 4242</p>
                <p class="text-xs text-slate-500">Expires 12/28</p>
            </div>
            <button onclick="showToast('Edit payment method', 'info')" class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-semibold text-slate-700 hover:bg-slate-50">Edit</button>
        </div>
        <h4 class="text-sm font-semibold text-slate-900 mb-3">Recent Invoices</h4>
        <div class="space-y-2">
            ${['Jun 1, 2026', 'May 1, 2026', 'Apr 1, 2026'].map(d => `
                <div class="flex items-center justify-between p-3 border border-slate-200 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-slate-900">Invoice &middot; ${d}</p>
                        <p class="text-xs text-slate-500">Pro Plan &middot; $29.00</p>
                    </div>
                    <button onclick="showToast('Downloading invoice...', 'info')" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">Download</button>
                </div>
            `).join('')}
        </div>
    `;
    if (tab === 'preferences') return `
        <h3 class="text-lg font-bold text-slate-900 mb-1">Preferences</h3>
        <p class="text-sm text-slate-500 mb-6">Customize your experience</p>
        <div class="space-y-5">
            <div>
                <label class="text-sm font-medium text-slate-700">Language</label>
                <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                    <option>English</option><option selected>Indonesia</option><option>Espa&#xF1;ol</option><option>Fran&#xE7;ais</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Timezone</label>
                <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                    <option>(GMT+07:00) Jakarta</option><option>(GMT+08:00) Singapore</option><option>(GMT+09:00) Tokyo</option>
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Date Format</label>
                <div class="mt-2 grid grid-cols-3 gap-2">
                    ${['DD/MM/YYYY','MM/DD/YYYY','YYYY-MM-DD'].map((f,i) => `
                        <button onclick="showToast('Format changed', 'success')" class="px-3 py-2 border ${i===0?'border-indigo-500 bg-indigo-50 text-indigo-700':'border-slate-200'} rounded-lg text-sm font-medium hover:bg-slate-50">${f}</button>
                    `).join('')}
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Theme</label>
                <div class="mt-2 grid grid-cols-3 gap-2">
                    ${['Light','Dark','System'].map((t,i) => `
                        <button onclick="showToast('${t} theme selected', 'info')" class="px-3 py-2 border ${i===0?'border-indigo-500 bg-indigo-50 text-indigo-700':'border-slate-200'} rounded-lg text-sm font-medium hover:bg-slate-50">${t}</button>
                    `).join('')}
                </div>
            </div>
            <div class="flex gap-3 pt-4 border-t border-slate-100">
                <button onclick="showToast('Preferences saved!', 'success')" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Save Preferences</button>
            </div>
        </div>
    `;
}

function renderSettings() {
    return `
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Settings</h2>
            <p class="text-sm text-slate-500 mt-1">Manage your account preferences</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <div class="lg:col-span-1">
                <div class="bg-white border border-slate-200 rounded-2xl p-2">
                    ${tabs.map(t => `
                        <button onclick="setSettingsTab('${t.id}')" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium ${state.settingsTab === t.id ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-50'}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">${t.icon}</svg>
                            ${t.label}
                        </button>
                    `).join('')}
                </div>
            </div>

            <div class="lg:col-span-3">
                <div class="bg-white border border-slate-200 rounded-2xl p-6">
                    ${settingsContent()}
                </div>
            </div>
        </div>
    `;
}

function bindPasswordForm() {
    const form = document.getElementById('passwordForm');
    if (form) form.onsubmit = (e) => { e.preventDefault(); closeModal(); showToast('Password changed!', 'success'); };
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderSettings();
});
