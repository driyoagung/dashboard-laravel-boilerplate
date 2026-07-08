/* =========================================================
   Analytics Page
   ========================================================= */

function statCard(label, value, change, color, iconPath) {
    return `
        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex items-center justify-between">
                <div class="w-10 h-10 rounded-lg bg-${color}-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-${color}-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">${iconPath}</svg>
                </div>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">${change}</span>
            </div>
            <p class="text-2xl font-bold text-slate-900 mt-4">${value}</p>
            <p class="text-sm text-slate-500">${label}</p>
        </div>
    `;
}

function renderAnalytics() {
    return `
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Analytics</h2>
                <p class="text-sm text-slate-500 mt-1">Performance insights and metrics</p>
            </div>
            <div class="flex gap-2">
                <select class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
                    <option>Last 7 days</option><option>Last 30 days</option><option>Last 90 days</option><option>This year</option>
                </select>
                <button onclick="showToast('Report exported', 'success')" class="inline-flex items-center gap-2 border border-slate-200 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            ${statCard('Total Revenue', '$48,290', '+12.5%', 'emerald', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>')}
            ${statCard('Active Users', '2,847', '+8.2%', 'indigo', '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>')}
            ${statCard('Conversion', '3.24%', '+0.8%', 'amber', '<path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>')}
            ${statCard('Avg. Session', '4m 32s', '-2.1%', 'rose', '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>')}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Revenue Trend</h3>
                        <p class="text-sm text-slate-500">Monthly performance</p>
                    </div>
                </div>
                <div class="flex items-end justify-between gap-2 h-56 px-2">
                    ${[35,50,45,70,60,85,75,90,80,95,88,92].map((h, i) => `
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-indigo-600 rounded-t-md hover:bg-indigo-700 cursor-pointer" style="height:${h}%" title="$${(h*50).toLocaleString()}"></div>
                            <span class="text-xs text-slate-500">${['J','F','M','A','M','J','J','A','S','O','N','D'][i]}</span>
                        </div>
                    `).join('')}
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6">
                <h3 class="text-lg font-bold text-slate-900 mb-1">Traffic Sources</h3>
                <p class="text-sm text-slate-500 mb-5">Where users come from</p>
                <div class="space-y-4">
                    ${[
                        { name: 'Organic Search', value: 42, color: 'indigo' },
                        { name: 'Direct', value: 28, color: 'emerald' },
                        { name: 'Social Media', value: 18, color: 'amber' },
                        { name: 'Referral', value: 12, color: 'sky' },
                    ].map(s => `
                        <div>
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="font-medium text-slate-700">${s.name}</span>
                                <span class="font-semibold text-slate-900">${s.value}%</span>
                            </div>
                            <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-${s.color}-500 rounded-full" style="width:${s.value}%"></div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-bold text-slate-900">Top Performing Items</h3>
                <button onclick="showToast('Viewing all items', 'info')" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all &rarr;</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 text-left">
                            <th class="pb-3 font-semibold text-slate-500 text-xs uppercase">Name</th>
                            <th class="pb-3 font-semibold text-slate-500 text-xs uppercase">Category</th>
                            <th class="pb-3 font-semibold text-slate-500 text-xs uppercase">Views</th>
                            <th class="pb-3 font-semibold text-slate-500 text-xs uppercase">Revenue</th>
                            <th class="pb-3 font-semibold text-slate-500 text-xs uppercase">Growth</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${[
                            { name: 'Premium Plan', cat: 'Subscription', views: '12.4k', rev: '$24,500', growth: '+18.2%', up: true },
                            { name: 'Team Workspace', cat: 'Product', views: '8.9k', rev: '$18,200', growth: '+12.5%', up: true },
                            { name: 'API Access', cat: 'Service', views: '5.2k', rev: '$9,800', growth: '+8.7%', up: true },
                            { name: 'Enterprise License', cat: 'License', views: '3.1k', rev: '$15,600', growth: '-2.3%', up: false },
                            { name: 'Custom Integration', cat: 'Service', views: '2.8k', rev: '$7,400', growth: '+5.1%', up: true },
                        ].map(r => `
                            <tr class="border-b border-slate-100 hover:bg-slate-50">
                                <td class="py-3 font-medium text-slate-900">${r.name}</td>
                                <td class="py-3 text-slate-600">${r.cat}</td>
                                <td class="py-3 text-slate-600">${r.views}</td>
                                <td class="py-3 font-semibold text-slate-900">${r.rev}</td>
                                <td class="py-3">
                                    <span class="text-xs font-semibold ${r.up ? 'text-emerald-600 bg-emerald-50' : 'text-rose-600 bg-rose-50'} px-2 py-1 rounded-full">${r.growth}</span>
                                </td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            </div>
        </div>
    `;
}

document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('pageContent');
    if (content) content.innerHTML = renderAnalytics();
});
