/* =========================================================
   AppBoard Boilerplate - Core Utilities
   ========================================================= */

function showToast(message, type = 'success') {
    const container = document.getElementById('toastContainer');
    const colors = {
        success: 'bg-emerald-500',
        error: 'bg-rose-500',
        info: 'bg-indigo-500',
        warning: 'bg-amber-500',
    };
    const icons = {
        success: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>',
        error: '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>',
        info: '<path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        warning: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>',
    };
    const toast = document.createElement('div');
    toast.className = 'toast-in flex items-center gap-3 bg-white border border-slate-200 shadow-lg rounded-lg px-4 py-3 min-w-[280px] max-w-sm';
    toast.innerHTML = `
        <div class="w-8 h-8 rounded-full ${colors[type]} flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">${icons[type]}</svg>
        </div>
        <p class="text-sm font-medium text-slate-900 flex-1">${message}</p>
        <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    `;
    container.appendChild(toast);
    setTimeout(() => toast.remove(), 3500);
}

function openModalFromTemplate(templateId) {
    const container = document.getElementById('modalContainer');
    const tpl = document.getElementById(templateId);
    if (!tpl) return;
    container.innerHTML = `
        <div class="modal-backdrop fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4" onclick="if(event.target===this) closeModal()">
            <div class="bg-white rounded-2xl shadow-xl max-w-lg w-full max-h-[90vh] overflow-y-auto slide-in">
                ${tpl.innerHTML}
            </div>
        </div>
    `;
}

function openModal(content) {
    const container = document.getElementById('modalContainer');
    container.innerHTML = `
        <div class="modal-backdrop fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4" onclick="if(event.target===this) closeModal()">
            <div class="bg-white rounded-2xl shadow-xl max-w-lg w-full max-h-[90vh] overflow-y-auto slide-in">
                ${content}
            </div>
        </div>
    `;
}

function closeModal() {
    document.getElementById('modalContainer').innerHTML = '';
}

function confirmAction(title, message, onConfirm) {
    openModalFromTemplate('confirmModalTemplate');
    document.getElementById('confirmTitle').textContent = title;
    document.getElementById('confirmMessage').textContent = message;
    document.getElementById('confirmBtn').onclick = () => {
        closeModal();
        onConfirm();
    };
}

function toggleThemeHint() {
    toggleTheme();
}

function toggleTheme() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');
    
    if (isDark) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
}

function statusColor(status) {
    const map = {
        active: 'bg-emerald-50 text-emerald-700',
        review: 'bg-amber-50 text-amber-700',
        paused: 'bg-slate-100 text-slate-600',
        completed: 'bg-indigo-50 text-indigo-700',
    };
    return map[status] || 'bg-slate-100 text-slate-600';
}

document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menuBtn');
    if (menuBtn) {
        menuBtn.addEventListener('click', () => {
            const sb = document.getElementById('sidebar');
            sb.classList.toggle('hidden');
            sb.classList.toggle('flex');
        });
    }

    const globalSearch = document.getElementById('globalSearch');
    if (globalSearch) {
        document.addEventListener('keydown', (e) => {
            if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                e.preventDefault();
                globalSearch.focus();
                showToast('Search activated', 'info');
            }
        });
        globalSearch.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && e.target.value) {
                showToast(`Searching: "${e.target.value}"`, 'info');
            }
        });
    }
});
