<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Boilerplate Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Inter', sans-serif; }
  .scrollbar-thin::-webkit-scrollbar { width: 6px; height: 6px; }
  .scrollbar-thin::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
  .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
  .fade-in { animation: fadeIn 0.3s ease-out; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
  .slide-in { animation: slideIn 0.25s ease-out; }
  @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
  .toast-in { animation: toastIn 0.3s ease-out; }
  @keyframes toastIn { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
  .modal-backdrop { animation: fadeInBg 0.2s ease-out; }
  @keyframes fadeInBg { from { opacity: 0; } to { opacity: 1; } }
  [data-page] { display: none; }
  [data-page].active { display: block; }
</style>
</head>
<body class="bg-slate-50 text-slate-800">

<!-- Toast Container -->
<div id="toastContainer" class="fixed top-4 right-4 z-[100] space-y-2"></div>

<!-- Modal Container -->
<div id="modalContainer"></div>

<div class="flex min-h-screen">

  <!-- SIDEBAR -->
  <aside id="sidebar" class="hidden lg:flex flex-col w-64 bg-white border-r border-slate-200 fixed lg:sticky top-0 h-screen z-40">
    <div class="px-6 py-6 border-b border-slate-100 flex items-center gap-2">
      <div class="w-9 h-9 rounded-lg bg-indigo-600 flex items-center justify-center">
        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
      </div>
      <div>
        <h1 class="text-lg font-bold text-slate-900">AppBoard</h1>
        <p class="text-xs text-slate-500">v1.0 · Boilerplate</p>
      </div>
    </div>

    <nav class="flex-1 px-4 py-5 space-y-1 overflow-y-auto scrollbar-thin">
      <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Overview</p>
      <a href="#" data-nav="dashboard" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        Dashboard
      </a>
      <a href="#" data-nav="projects" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
        Projects
        <span class="ml-auto text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">24</span>
      </a>
      <a href="#" data-nav="tasks" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
        Tasks
      </a>
      <a href="#" data-nav="calendar" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        Calendar
      </a>

      <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mt-6 mb-2">Workspace</p>
      <a href="#" data-nav="messages" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        Messages
        <span class="ml-auto w-2 h-2 rounded-full bg-rose-500"></span>
      </a>
      <a href="#" data-nav="analytics" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        Analytics
      </a>
      <a href="#" data-nav="library" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        Library
      </a>
      <a href="#" data-nav="team" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        Team
      </a>

      <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider mt-6 mb-2">Account</p>
      <a href="#" data-nav="settings" class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Settings
      </a>
    </nav>

    <div class="p-4 border-t border-slate-100">
      <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer">
        <img src="https://i.pravatar.cc/80?img=47" class="w-9 h-9 rounded-full" alt="user"/>
        <div class="flex-1 min-w-0">
          <p class="text-sm font-semibold text-slate-900 truncate">Andini Pratiwi</p>
          <p class="text-xs text-slate-500 truncate">andini@app.com</p>
        </div>
        <button class="p-1 rounded hover:bg-slate-100" onclick="showToast('Logged out', 'info')">
          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
        </button>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="flex-1 flex flex-col min-w-0">

    <!-- TOPBAR -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
      <div class="flex items-center justify-between px-4 lg:px-8 py-3">
        <div class="flex items-center gap-3">
          <button id="menuBtn" class="lg:hidden p-2 rounded-lg hover:bg-slate-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
          <div class="hidden md:flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2 w-80">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input id="globalSearch" type="text" placeholder="Search anything..." class="bg-transparent outline-none text-sm flex-1 placeholder:text-slate-400"/>
            <kbd class="hidden lg:inline text-xs text-slate-400 border border-slate-300 rounded px-1.5">⌘K</kbd>
          </div>
        </div>

        <div class="flex items-center gap-2">
          <button onclick="showToast('No new notifications', 'info')" class="p-2 rounded-lg hover:bg-slate-100 relative">
            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 rounded-full"></span>
          </button>
          <button onclick="toggleThemeHint()" class="p-2 rounded-lg hover:bg-slate-100">
            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
          </button>
          <div class="h-8 w-px bg-slate-200 mx-1 hidden sm:block"></div>
          <div class="flex items-center gap-3 pl-1 cursor-pointer" onclick="navigateTo('settings')">
            <img src="https://i.pravatar.cc/80?img=47" class="w-9 h-9 rounded-full object-cover ring-2 ring-white" alt="user"/>
            <div class="hidden sm:block">
              <p class="text-sm font-semibold text-slate-900 leading-tight">Andini Pratiwi</p>
              <p class="text-xs text-slate-500">Administrator</p>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT WRAPPER -->
    <main class="flex-1 p-4 lg:p-8">
      <div id="pageContent"></div>
    </main>
  </div>
</div>

<script>
/* =========================================================
   STATE & DATA
   ========================================================= */
const state = {
  currentPage: 'dashboard',
  settingsTab: 'profile',
  libraryCategory: 'all',
  taskFilter: 'all',
};

const projects = [
  { id: 1, name: 'Website Redesign', client: 'Acme Corp', status: 'active', progress: 68, members: 5, due: 'Jul 15', color: 'indigo' },
  { id: 2, name: 'Mobile App MVP', client: 'StartupXYZ', status: 'active', progress: 42, members: 3, due: 'Aug 02', color: 'emerald' },
  { id: 3, name: 'Brand Guidelines', client: 'Nova Inc', status: 'review', progress: 90, members: 2, due: 'Jun 28', color: 'amber' },
  { id: 4, name: 'Marketing Campaign', client: 'TechFlow', status: 'active', progress: 25, members: 4, due: 'Jul 30', color: 'sky' },
  { id: 5, name: 'E-commerce Platform', client: 'ShopMore', status: 'paused', progress: 55, members: 6, due: 'Aug 20', color: 'rose' },
  { id: 6, name: 'Analytics Dashboard', client: 'DataViz Co', status: 'completed', progress: 100, members: 3, due: 'Jun 10', color: 'slate' },
];

const tasks = {
  todo: [
    { id: 1, title: 'Review wireframes for homepage', priority: 'high', tag: 'Design' },
    { id: 2, title: 'Write API documentation', priority: 'medium', tag: 'Dev' },
    { id: 3, title: 'Schedule client meeting', priority: 'low', tag: 'Management' },
  ],
  inprogress: [
    { id: 4, title: 'Implement user authentication', priority: 'high', tag: 'Dev' },
    { id: 5, title: 'Design email templates', priority: 'medium', tag: 'Design' },
  ],
  done: [
    { id: 6, title: 'Setup project repository', priority: 'low', tag: 'Dev' },
    { id: 7, title: 'Create brand moodboard', priority: 'medium', tag: 'Design' },
  ]
};

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

const libraryItems = [
  { id: 1, title: 'Brand Guidelines 2026', category: 'document', type: 'PDF', size: '2.4 MB', updated: '2 days ago', icon: 'document' },
  { id: 2, title: 'UI Component Library', category: 'design', type: 'FIGMA', size: '18.7 MB', updated: '1 week ago', icon: 'design' },
  { id: 3, title: 'Q2 Marketing Report', category: 'document', type: 'DOCX', size: '1.1 MB', updated: '3 days ago', icon: 'document' },
  { id: 4, title: 'Product Screenshots', category: 'media', type: 'ZIP', size: '45.2 MB', updated: '5 days ago', icon: 'media' },
  { id: 5, title: 'Team Onboarding Video', category: 'media', type: 'MP4', size: '128 MB', updated: '2 weeks ago', icon: 'media' },
  { id: 6, title: 'API Documentation', category: 'document', type: 'MD', size: '156 KB', updated: '1 day ago', icon: 'document' },
  { id: 7, title: 'Icon Pack v3', category: 'design', type: 'SVG', size: '3.8 MB', updated: '4 days ago', icon: 'design' },
  { id: 8, title: 'Client Presentation', category: 'document', type: 'PPTX', size: '8.9 MB', updated: '6 days ago', icon: 'document' },
];

/* =========================================================
   UTILITIES
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
  toast.className = `toast-in flex items-center gap-3 bg-white border border-slate-200 shadow-lg rounded-lg px-4 py-3 min-w-[280px] max-w-sm`;
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
  openModal(`
    <div class="p-6">
      <div class="flex items-start gap-4">
        <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center flex-shrink-0">
          <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <div class="flex-1">
          <h3 class="text-lg font-bold text-slate-900">${title}</h3>
          <p class="text-sm text-slate-600 mt-1">${message}</p>
        </div>
      </div>
      <div class="flex gap-3 mt-6">
        <button onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
        <button id="confirmBtn" class="flex-1 px-4 py-2.5 bg-rose-600 text-white rounded-lg text-sm font-semibold hover:bg-rose-700">Confirm</button>
      </div>
    </div>
  `);
  document.getElementById('confirmBtn').onclick = () => {
    closeModal();
    onConfirm();
  };
}

function toggleThemeHint() {
  showToast('Dark mode coming soon!', 'info');
}

/* =========================================================
   NAVIGATION
   ========================================================= */
function navigateTo(page) {
  state.currentPage = page;
  document.querySelectorAll('.nav-link').forEach(el => {
    el.classList.remove('bg-indigo-50', 'text-indigo-700');
    el.classList.add('text-slate-600');
  });
  const active = document.querySelector(`[data-nav="${page}"]`);
  if (active) {
    active.classList.add('bg-indigo-50', 'text-indigo-700');
    active.classList.remove('text-slate-600');
  }
  renderPage();
  // close mobile sidebar
  if (window.innerWidth < 1024) {
    document.getElementById('sidebar').classList.add('hidden');
    document.getElementById('sidebar').classList.remove('flex');
  }
  window.scrollTo(0, 0);
}

document.querySelectorAll('.nav-link').forEach(el => {
  el.addEventListener('click', (e) => {
    e.preventDefault();
    navigateTo(el.dataset.nav);
  });
});

document.getElementById('menuBtn').addEventListener('click', () => {
  const sb = document.getElementById('sidebar');
  sb.classList.toggle('hidden');
  sb.classList.toggle('flex');
});

/* =========================================================
   PAGE RENDERERS
   ========================================================= */
function renderPage() {
  const pages = {
    dashboard: renderDashboard,
    projects: renderProjects,
    tasks: renderTasks,
    calendar: renderCalendar,
    messages: renderMessages,
    analytics: renderAnalytics,
    library: renderLibrary,
    team: renderTeam,
    settings: renderSettings,
  };
  const content = document.getElementById('pageContent');
  content.innerHTML = `<div class="fade-in">${pages[state.currentPage]()}</div>`;
  bindPageEvents();
}

/* ---------- DASHBOARD ---------- */
function renderDashboard() {
  return `
    <section class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div>
        <p class="text-sm text-slate-500">Wednesday, July 01, 2026</p>
        <h2 class="text-2xl lg:text-3xl font-bold text-slate-900 mt-1">Welcome back, Andini 👋</h2>
        <p class="text-slate-600 mt-1 text-sm max-w-xl">You have <span class="font-semibold text-indigo-600">5 tasks</span> pending and <span class="font-semibold text-indigo-600">2 meetings</span> today. Let's make it productive!</p>
      </div>
      <div class="flex items-center gap-3">
        <div class="text-right hidden sm:block">
          <p class="text-xs text-slate-500">Weekly Goal</p>
          <p class="text-lg font-bold text-slate-900">5 / 7 tasks</p>
        </div>
        <div class="relative w-16 h-16">
          <svg class="w-16 h-16 -rotate-90">
            <circle cx="32" cy="32" r="28" stroke="#e2e8f0" stroke-width="6" fill="none"/>
            <circle cx="32" cy="32" r="28" stroke="#4f46e5" stroke-width="6" fill="none" stroke-dasharray="175.9" stroke-dashoffset="50" stroke-linecap="round"/>
          </svg>
          <span class="absolute inset-0 flex items-center justify-center text-sm font-bold text-slate-900">71%</span>
        </div>
      </div>
    </section>

    <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
      ${statCard('Total Projects', '24', '+3', 'indigo', '<path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>')}
      ${statCard('Active Tasks', '18', '+5', 'emerald', '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>')}
      ${statCard('Team Members', '12', '+1', 'sky', '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>')}
      ${statCard('Completed', '156', '+12', 'amber', '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>')}
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
      <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-6">
          <div>
            <h3 class="text-lg font-bold text-slate-900">Activity Overview</h3>
            <p class="text-sm text-slate-500">Tasks completed this week</p>
          </div>
          <div class="flex gap-1 bg-slate-100 p-1 rounded-lg">
            <button class="text-xs font-semibold px-3 py-1.5 rounded-md bg-white text-slate-900 shadow-sm">Week</button>
            <button class="text-xs font-semibold px-3 py-1.5 rounded-md text-slate-500">Month</button>
          </div>
        </div>
        <div class="flex items-end justify-between gap-3 h-56 px-2">
          ${['Mon','Tue','Wed','Thu','Fri','Sat','Sun'].map((d,i) => {
            const heights = [40,65,50,80,70,30,90];
            const isToday = i === 2;
            return `<div class="flex-1 flex flex-col items-center gap-2">
              <div class="w-full ${isToday ? 'bg-indigo-600 ring-2 ring-indigo-300' : 'bg-indigo-600'} rounded-t-md" style="height:${heights[i]}%"></div>
              <span class="text-xs ${isToday ? 'font-semibold text-indigo-600' : 'text-slate-500'}">${isToday ? 'Today' : d}</span>
            </div>`;
          }).join('')}
        </div>
      </div>

      <div class="bg-white border border-slate-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-5">
          <h3 class="text-lg font-bold text-slate-900">Quick Actions</h3>
        </div>
        <div class="space-y-2">
          <button onclick="openCreateProjectModal()" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-indigo-300 hover:bg-indigo-50/50 transition text-left">
            <div class="w-9 h-9 rounded-lg bg-indigo-100 flex items-center justify-center">
              <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div class="flex-1">
              <p class="text-sm font-semibold text-slate-900">New Project</p>
              <p class="text-xs text-slate-500">Create a new workspace</p>
            </div>
          </button>
          <button onclick="openCreateTaskModal()" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50/50 transition text-left">
            <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
              <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            </div>
            <div class="flex-1">
              <p class="text-sm font-semibold text-slate-900">Add Task</p>
              <p class="text-xs text-slate-500">Create a new task</p>
            </div>
          </button>
          <button onclick="openModal(inviteMemberModal())" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-sky-300 hover:bg-sky-50/50 transition text-left">
            <div class="w-9 h-9 rounded-lg bg-sky-100 flex items-center justify-center">
              <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <div class="flex-1">
              <p class="text-sm font-semibold text-slate-900">Invite Member</p>
              <p class="text-xs text-slate-500">Add to your team</p>
            </div>
          </button>
          <button onclick="navigateTo('analytics')" class="w-full flex items-center gap-3 p-3 rounded-lg border border-slate-200 hover:border-amber-300 hover:bg-amber-50/50 transition text-left">
            <div class="w-9 h-9 rounded-lg bg-amber-100 flex items-center justify-center">
              <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div class="flex-1">
              <p class="text-sm font-semibold text-slate-900">View Analytics</p>
              <p class="text-xs text-slate-500">Performance insights</p>
            </div>
          </button>
        </div>
      </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
      <div class="bg-white border border-slate-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-5">
          <h3 class="text-lg font-bold text-slate-900">Recent Projects</h3>
          <button onclick="navigateTo('projects')" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all →</button>
        </div>
        <div class="space-y-3">
          ${projects.slice(0, 4).map(p => `
            <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 cursor-pointer" onclick="openProjectDetail(${p.id})">
              <div class="w-10 h-10 rounded-lg bg-${p.color}-100 flex items-center justify-center flex-shrink-0">
                <span class="text-${p.color}-600 font-bold text-sm">${p.name.charAt(0)}</span>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-slate-900 truncate">${p.name}</p>
                <p class="text-xs text-slate-500">${p.client} · Due ${p.due}</p>
              </div>
              <span class="text-xs font-semibold ${statusColor(p.status)} px-2 py-1 rounded-full">${p.status}</span>
            </div>
          `).join('')}
        </div>
      </div>

      <div class="bg-white border border-slate-200 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-5">
          <h3 class="text-lg font-bold text-slate-900">Recent Activity</h3>
          <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all →</button>
        </div>
        <div class="space-y-3">
          ${activityItem('emerald', 'Completed task "Homepage wireframes"', '2 hours ago')}
          ${activityItem('indigo', 'Created new project "Mobile App"', '5 hours ago')}
          ${activityItem('amber', 'Uploaded 3 files to Library', 'Yesterday')}
          ${activityItem('sky', 'Invited Lina Hartono to team', '2 days ago')}
          ${activityItem('rose', 'Commented on "Brand Guidelines"', '3 days ago')}
        </div>
      </div>
    </section>
  `;
}

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

function activityItem(color, text, time) {
  return `
    <div class="flex items-start gap-3 p-2 rounded-lg hover:bg-slate-50">
      <div class="w-8 h-8 rounded-lg bg-${color}-50 flex items-center justify-center flex-shrink-0">
        <div class="w-2 h-2 rounded-full bg-${color}-500"></div>
      </div>
      <div class="flex-1 min-w-0">
        <p class="text-sm text-slate-900">${text}</p>
        <p class="text-xs text-slate-500 mt-0.5">${time}</p>
      </div>
    </div>
  `;
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

/* ---------- PROJECTS ---------- */
function renderProjects() {
  return `
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
      <div>
        <h2 class="text-2xl font-bold text-slate-900">Projects</h2>
        <p class="text-sm text-slate-500 mt-1">Manage and track all your projects</p>
      </div>
      <button onclick="openCreateProjectModal()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        New Project
      </button>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-4 mb-6">
      <div class="flex flex-col md:flex-row gap-3">
        <div class="flex-1 flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2">
          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          <input id="projectSearch" type="text" placeholder="Search projects..." class="bg-transparent outline-none text-sm flex-1"/>
        </div>
        <select id="projectFilter" class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
          <option value="all">All Status</option>
          <option value="active">Active</option>
          <option value="review">In Review</option>
          <option value="paused">Paused</option>
          <option value="completed">Completed</option>
        </select>
        <div class="flex gap-1 bg-slate-100 p-1 rounded-lg">
          <button id="viewGrid" class="p-2 rounded-md bg-white shadow-sm text-slate-900">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
          </button>
          <button id="viewList" class="p-2 rounded-md text-slate-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
        </div>
      </div>
    </div>

    <div id="projectGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
      ${projects.map(projectCard).join('')}
    </div>
  `;
}

function projectCard(p) {
  return `
    <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 transition cursor-pointer" onclick="openProjectDetail(${p.id})">
      <div class="flex items-start justify-between mb-4">
        <div class="w-11 h-11 rounded-lg bg-${p.color}-100 flex items-center justify-center">
          <span class="text-${p.color}-600 font-bold">${p.name.charAt(0)}</span>
        </div>
        <button onclick="event.stopPropagation(); openProjectMenu(${p.id})" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
        </button>
      </div>
      <h4 class="font-semibold text-slate-900">${p.name}</h4>
      <p class="text-xs text-slate-500 mt-1">${p.client}</p>
      <div class="mt-4">
        <div class="flex justify-between text-xs mb-1.5">
          <span class="text-slate-500">Progress</span>
          <span class="font-semibold text-slate-900">${p.progress}%</span>
        </div>
        <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
          <div class="h-full bg-${p.color}-600 rounded-full" style="width:${p.progress}%"></div>
        </div>
      </div>
      <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-100">
        <div class="flex -space-x-2">
          ${Array(Math.min(p.members, 3)).fill(0).map((_, i) => `<img src="https://i.pravatar.cc/40?img=${i+10}" class="w-7 h-7 rounded-full ring-2 ring-white" alt=""/>`).join('')}
          ${p.members > 3 ? `<div class="w-7 h-7 rounded-full ring-2 ring-white bg-slate-200 flex items-center justify-center text-xs font-semibold text-slate-600">+${p.members-3}</div>` : ''}
        </div>
        <span class="text-xs font-semibold ${statusColor(p.status)} px-2 py-1 rounded-full">${p.status}</span>
      </div>
    </div>
  `;
}

function openCreateProjectModal() {
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">Create New Project</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <form id="projectForm" class="space-y-4">
        <div>
          <label class="text-sm font-medium text-slate-700">Project Name</label>
          <input required type="text" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" placeholder="e.g. Website Redesign"/>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Client</label>
          <input type="text" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Client name"/>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="text-sm font-medium text-slate-700">Due Date</label>
            <input type="date" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Priority</label>
            <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
              <option>Low</option><option>Medium</option><option>High</option>
            </select>
          </div>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Description</label>
          <textarea rows="3" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Brief description..."></textarea>
        </div>
        <div class="flex gap-3 pt-2">
          <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
          <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Create Project</button>
        </div>
      </form>
    </div>
  `);
  document.getElementById('projectForm').onsubmit = (e) => {
    e.preventDefault();
    closeModal();
    showToast('Project created successfully!', 'success');
  };
}

function openProjectDetail(id) {
  const p = projects.find(x => x.id === id);
  openModal(`
    <div class="p-6">
      <div class="flex items-start justify-between mb-5">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-lg bg-${p.color}-100 flex items-center justify-center">
            <span class="text-${p.color}-600 font-bold text-lg">${p.name.charAt(0)}</span>
          </div>
          <div>
            <h3 class="text-lg font-bold text-slate-900">${p.name}</h3>
            <p class="text-sm text-slate-500">${p.client}</p>
          </div>
        </div>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="grid grid-cols-3 gap-3 mb-5">
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Status</p>
          <p class="text-sm font-semibold text-slate-900 capitalize mt-0.5">${p.status}</p>
        </div>
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Progress</p>
          <p class="text-sm font-semibold text-slate-900 mt-0.5">${p.progress}%</p>
        </div>
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Due Date</p>
          <p class="text-sm font-semibold text-slate-900 mt-0.5">${p.due}</p>
        </div>
      </div>
      <div class="mb-5">
        <p class="text-sm font-medium text-slate-700 mb-2">Team Members (${p.members})</p>
        <div class="flex -space-x-2">
          ${Array(Math.min(p.members, 5)).fill(0).map((_, i) => `<img src="https://i.pravatar.cc/40?img=${i+10}" class="w-9 h-9 rounded-full ring-2 ring-white" alt=""/>`).join('')}
        </div>
      </div>
      <div class="flex gap-3">
        <button onclick="closeModal(); showToast('Opening project...', 'info')" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Open Project</button>
        <button onclick="closeModal(); confirmAction('Archive Project', 'Are you sure you want to archive ${p.name}?', () => showToast('Project archived', 'success'))" class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Archive</button>
      </div>
    </div>
  `);
}

function openProjectMenu(id) {
  const p = projects.find(x => x.id === id);
  openModal(`
    <div class="p-4">
      <h3 class="text-base font-bold text-slate-900 mb-3 px-2">${p.name}</h3>
      <div class="space-y-1">
        <button onclick="closeModal(); openProjectDetail(${p.id})" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">View Details</button>
        <button onclick="closeModal(); showToast('Edit mode enabled', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Edit Project</button>
        <button onclick="closeModal(); showToast('Link copied!', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Copy Link</button>
        <button onclick="closeModal(); confirmAction('Delete Project', 'This action cannot be undone.', () => showToast('Project deleted', 'success'))" class="w-full text-left px-3 py-2 rounded-lg hover:bg-rose-50 text-rose-600 text-sm">Delete Project</button>
      </div>
    </div>
  `);
}

/* ---------- TASKS ---------- */
function renderTasks() {
  return `
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
      <div>
        <h2 class="text-2xl font-bold text-slate-900">Tasks</h2>
        <p class="text-sm text-slate-500 mt-1">Organize and track your work</p>
      </div>
      <button onclick="openCreateTaskModal()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Add Task
      </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      ${kanbanColumn('To Do', 'todo', tasks.todo, 'slate')}
      ${kanbanColumn('In Progress', 'inprogress', tasks.inprogress, 'indigo')}
      ${kanbanColumn('Done', 'done', tasks.done, 'emerald')}
    </div>
  `;
}

function kanbanColumn(title, key, items, color) {
  return `
    <div class="bg-slate-100 rounded-2xl p-4">
      <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
          <div class="w-2 h-2 rounded-full bg-${color}-500"></div>
          <h3 class="font-semibold text-slate-900">${title}</h3>
          <span class="text-xs bg-white text-slate-600 px-2 py-0.5 rounded-full">${items.length}</span>
        </div>
        <button onclick="openCreateTaskModal('${key}')" class="p-1 rounded hover:bg-white">
          <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        </button>
      </div>
      <div class="space-y-2">
        ${items.map(t => taskCard(t, key)).join('')}
      </div>
    </div>
  `;
}

function taskCard(t, col) {
  const priorityColor = { high: 'rose', medium: 'amber', low: 'emerald' }[t.priority];
  return `
    <div class="bg-white rounded-xl p-4 border border-slate-200 hover:border-indigo-300 transition cursor-pointer" onclick="openTaskDetail(${t.id})">
      <div class="flex items-start justify-between mb-2">
        <span class="text-xs font-semibold bg-${priorityColor}-50 text-${priorityColor}-700 px-2 py-0.5 rounded">${t.priority}</span>
        <button onclick="event.stopPropagation(); toggleTaskDone(${t.id}, '${col}')" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </button>
      </div>
      <p class="text-sm font-medium text-slate-900 ${col === 'done' ? 'line-through text-slate-400' : ''}">${t.title}</p>
      <div class="flex items-center justify-between mt-3">
        <span class="text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded">${t.tag}</span>
        <img src="https://i.pravatar.cc/40?img=${(t.id % 20) + 1}" class="w-6 h-6 rounded-full" alt=""/>
      </div>
    </div>
  `;
}

function openCreateTaskModal(column = 'todo') {
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">Add New Task</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <form id="taskForm" class="space-y-4">
        <div>
          <label class="text-sm font-medium text-slate-700">Task Title</label>
          <input required type="text" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="What needs to be done?"/>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="text-sm font-medium text-slate-700">Priority</label>
            <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
              <option>low</option><option>medium</option><option>high</option>
            </select>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Tag</label>
            <select class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
              <option>Design</option><option>Dev</option><option>Management</option><option>Research</option>
            </select>
          </div>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Column</label>
          <select id="taskColumn" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
            <option value="todo" ${column==='todo'?'selected':''}>To Do</option>
            <option value="inprogress" ${column==='inprogress'?'selected':''}>In Progress</option>
            <option value="done" ${column==='done'?'selected':''}>Done</option>
          </select>
        </div>
        <div class="flex gap-3 pt-2">
          <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
          <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Add Task</button>
        </div>
      </form>
    </div>
  `);
  document.getElementById('taskForm').onsubmit = (e) => {
    e.preventDefault();
    closeModal();
    showToast('Task added successfully!', 'success');
  };
}

function openTaskDetail(id) {
  const allTasks = [...tasks.todo, ...tasks.inprogress, ...tasks.done];
  const t = allTasks.find(x => x.id === id);
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">Task Details</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="space-y-4">
        <div>
          <p class="text-xs text-slate-500">Title</p>
          <p class="text-base font-semibold text-slate-900 mt-1">${t.title}</p>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <p class="text-xs text-slate-500">Priority</p>
            <p class="text-sm font-semibold text-slate-900 capitalize mt-1">${t.priority}</p>
          </div>
          <div>
            <p class="text-xs text-slate-500">Tag</p>
            <p class="text-sm font-semibold text-slate-900 mt-1">${t.tag}</p>
          </div>
        </div>
        <div>
          <p class="text-xs text-slate-500">Description</p>
          <p class="text-sm text-slate-700 mt-1">Add detailed description, notes, and requirements for this task.</p>
        </div>
        <div>
          <p class="text-xs text-slate-500 mb-2">Subtasks</p>
          <div class="space-y-2">
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded"/> Research phase</label>
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" checked class="rounded"/> Initial draft</label>
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded"/> Review & feedback</label>
          </div>
        </div>
        <div class="flex gap-3 pt-2">
          <button onclick="closeModal(); confirmAction('Delete Task', 'Delete this task permanently?', () => showToast('Task deleted', 'success'))" class="px-4 py-2.5 border border-rose-200 text-rose-600 rounded-lg text-sm font-semibold hover:bg-rose-50">Delete</button>
          <button onclick="closeModal(); showToast('Task updated', 'success')" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Save Changes</button>
        </div>
      </div>
    </div>
  `);
}

function toggleTaskDone(id, col) {
  showToast('Task moved to Done!', 'success');
}

/* ---------- CALENDAR ---------- */
function renderCalendar() {
  const daysInMonth = 31;
  const firstDay = 0; // Sunday
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
  openModal(`
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
            <input type="number" min="1" max="31" value="${day}" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Day"/>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Time</label>
            <input type="time" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
          </div>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Color</label>
          <div class="flex gap-2 mt-1">
            ${['indigo','emerald','amber','rose','sky'].map(c => `<button type="button" class="w-8 h-8 rounded-full bg-${c}-500 ring-2 ring-offset-2 ring-${c}-500"></button>`).join('')}
          </div>
        </div>
        <div class="flex gap-3 pt-2">
          <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
          <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Create Event</button>
        </div>
      </form>
    </div>
  `);
  document.getElementById('eventForm').onsubmit = (e) => {
    e.preventDefault();
    closeModal();
    showToast('Event created!', 'success');
  };
}

/* ---------- MESSAGES ---------- */
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
      <!-- Conversation list -->
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

      <!-- Chat area -->
      <div class="lg:col-span-2 flex flex-col">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/80?img=12" class="w-10 h-10 rounded-full" alt=""/>
            <div>
              <p class="text-sm font-semibold text-slate-900">Sarah Mitchell</p>
              <p class="text-xs text-emerald-600">● Online</p>
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
  if (input.value.trim()) {
    showToast('Message sent', 'success');
    input.value = '';
  }
}

function openNewChatModal() {
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">New Conversation</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <input type="text" placeholder="Search members..." class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm mb-4 focus:ring-2 focus:ring-indigo-500 outline-none"/>
      <div class="space-y-2 max-h-80 overflow-y-auto">
        ${teamMembers.map(m => `
          <div onclick="closeModal(); showToast('Chat with ${m.name} started', 'success')" class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer">
            <img src="https://i.pravatar.cc/80?img=${m.avatar}" class="w-10 h-10 rounded-full" alt=""/>
            <div class="flex-1">
              <p class="text-sm font-semibold text-slate-900">${m.name}</p>
              <p class="text-xs text-slate-500">${m.role}</p>
            </div>
          </div>
        `).join('')}
      </div>
    </div>
  `);
}

/* ---------- ANALYTICS ---------- */
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
        <button onclick="showToast('Viewing all items', 'info')" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all →</button>
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

/* ---------- LIBRARY ---------- */
function renderLibrary() {
  const categories = [
    { id: 'all', label: 'All Files', count: libraryItems.length },
    { id: 'document', label: 'Documents', count: libraryItems.filter(i => i.category === 'document').length },
    { id: 'design', label: 'Design', count: libraryItems.filter(i => i.category === 'design').length },
    { id: 'media', label: 'Media', count: libraryItems.filter(i => i.category === 'media').length },
  ];
  const filtered = state.libraryCategory === 'all' ? libraryItems : libraryItems.filter(i => i.category === state.libraryCategory);

  return `
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
      <div>
        <h2 class="text-2xl font-bold text-slate-900">Library</h2>
        <p class="text-sm text-slate-500 mt-1">Your files and resources</p>
      </div>
      <button onclick="openUploadModal()" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
        Upload File
      </button>
    </div>

    <div class="flex gap-2 mb-6 overflow-x-auto scrollbar-thin pb-2">
      ${categories.map(c => `
        <button onclick="setLibraryCategory('${c.id}')" class="px-4 py-2 rounded-lg text-sm font-semibold whitespace-nowrap ${state.libraryCategory === c.id ? 'bg-indigo-600 text-white' : 'bg-white border border-slate-200 text-slate-700 hover:bg-slate-50'}">
          ${c.label} <span class="ml-1 opacity-70">(${c.count})</span>
        </button>
      `).join('')}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      ${filtered.map(item => `
        <div onclick="openFileDetail(${item.id})" class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 transition cursor-pointer">
          <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-${iconColor(item.icon)}-100 flex items-center justify-center">
              ${fileIcon(item.icon)}
            </div>
            <button onclick="event.stopPropagation(); openFileMenu(${item.id})" class="p-1 rounded hover:bg-slate-100">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
            </button>
          </div>
          <h4 class="font-semibold text-slate-900 truncate">${item.title}</h4>
          <div class="flex items-center gap-2 mt-2 text-xs text-slate-500">
            <span class="font-semibold">${item.type}</span>
            <span>·</span>
            <span>${item.size}</span>
          </div>
          <p class="text-xs text-slate-400 mt-3">Updated ${item.updated}</p>
        </div>
      `).join('')}
    </div>
  `;
}

function iconColor(type) {
  return { document: 'indigo', design: 'rose', media: 'emerald' }[type] || 'slate';
}

function fileIcon(type) {
  const icons = {
    document: '<svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
    design: '<svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>',
    media: '<svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>',
  };
  return icons[type];
}

function setLibraryCategory(cat) {
  state.libraryCategory = cat;
  renderPage();
}

function openFileDetail(id) {
  const f = libraryItems.find(x => x.id === id);
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">File Details</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div class="bg-slate-50 rounded-xl p-8 flex items-center justify-center mb-5">
        <div class="w-20 h-20 rounded-2xl bg-${iconColor(f.icon)}-100 flex items-center justify-center">
          ${fileIcon(f.icon).replace('w-6 h-6', 'w-10 h-10')}
        </div>
      </div>
      <h4 class="font-semibold text-slate-900">${f.title}</h4>
      <div class="grid grid-cols-2 gap-3 mt-4">
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Type</p>
          <p class="text-sm font-semibold text-slate-900 mt-0.5">${f.type}</p>
        </div>
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Size</p>
          <p class="text-sm font-semibold text-slate-900 mt-0.5">${f.size}</p>
        </div>
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Category</p>
          <p class="text-sm font-semibold text-slate-900 capitalize mt-0.5">${f.category}</p>
        </div>
        <div class="bg-slate-50 rounded-lg p-3">
          <p class="text-xs text-slate-500">Updated</p>
          <p class="text-sm font-semibold text-slate-900 mt-0.5">${f.updated}</p>
        </div>
      </div>
      <div class="flex gap-3 mt-5">
        <button onclick="closeModal(); showToast('File downloaded', 'success')" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Download</button>
        <button onclick="closeModal(); showToast('Link copied!', 'success')" class="px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Share</button>
      </div>
    </div>
  `);
}

function openFileMenu(id) {
  const f = libraryItems.find(x => x.id === id);
  openModal(`
    <div class="p-4">
      <h3 class="text-base font-bold text-slate-900 mb-3 px-2">${f.title}</h3>
      <div class="space-y-1">
        <button onclick="closeModal(); showToast('Opening file...', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Open</button>
        <button onclick="closeModal(); showToast('Downloaded', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Download</button>
        <button onclick="closeModal(); showToast('Link copied!', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Share</button>
        <button onclick="closeModal(); showToast('Rename mode', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Rename</button>
        <button onclick="closeModal(); confirmAction('Delete File', 'Delete ${f.title} permanently?', () => showToast('File deleted', 'success'))" class="w-full text-left px-3 py-2 rounded-lg hover:bg-rose-50 text-rose-600 text-sm">Delete</button>
      </div>
    </div>
  `);
}

function openUploadModal() {
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">Upload File</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div onclick="showToast('File picker opened', 'info')" class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/30 transition">
        <svg class="w-12 h-12 mx-auto text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
        <p class="text-sm font-semibold text-slate-900 mt-3">Click to upload or drag and drop</p>
        <p class="text-xs text-slate-500 mt-1">PDF, DOC, PNG, JPG up to 50MB</p>
      </div>
      <div class="flex gap-3 mt-5">
        <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
        <button onclick="closeModal(); showToast('File uploaded!', 'success')" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Upload</button>
      </div>
    </div>
  `);
}

/* ---------- TEAM ---------- */
function renderTeam() {
  return `
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
      <div>
        <h2 class="text-2xl font-bold text-slate-900">Team</h2>
        <p class="text-sm text-slate-500 mt-1">${teamMembers.length} members · ${teamMembers.filter(m => m.status === 'online').length} online</p>
      </div>
      <button onclick="openModal(inviteMemberModal())" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-indigo-700">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        Invite Member
      </button>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-4 mb-6">
      <div class="flex flex-col md:flex-row gap-3">
        <div class="flex-1 flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2">
          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          <input type="text" placeholder="Search members..." class="bg-transparent outline-none text-sm flex-1"/>
        </div>
        <select class="border border-slate-200 rounded-lg px-3 py-2 text-sm bg-white">
          <option>All Roles</option><option>Designers</option><option>Developers</option><option>Managers</option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      ${teamMembers.map(m => `
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:border-indigo-300 transition">
          <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
              <div class="relative">
                <img src="https://i.pravatar.cc/80?img=${m.avatar}" class="w-14 h-14 rounded-full" alt=""/>
                <span class="absolute bottom-0 right-0 w-3.5 h-3.5 ${statusDotColor(m.status)} rounded-full ring-2 ring-white"></span>
              </div>
              <div>
                <h4 class="font-semibold text-slate-900">${m.name}</h4>
                <p class="text-xs text-slate-500">${m.role}</p>
              </div>
            </div>
            <button onclick="openMemberMenu(${m.id})" class="p-1 rounded hover:bg-slate-100">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
            </button>
          </div>
          <div class="flex items-center justify-between pt-4 border-t border-slate-100">
            <div>
              <p class="text-xs text-slate-500">Active Projects</p>
              <p class="text-lg font-bold text-slate-900">${m.projects}</p>
            </div>
            <div class="flex gap-2">
              <button onclick="showToast('Message sent to ${m.name}', 'success')" class="p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
              </button>
              <button onclick="showToast('Viewing profile', 'info')" class="p-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
              </button>
            </div>
          </div>
        </div>
      `).join('')}
    </div>
  `;
}

function statusDotColor(s) {
  return { online: 'bg-emerald-500', away: 'bg-amber-500', offline: 'bg-slate-400' }[s];
}

function inviteMemberModal() {
  return `
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
  `;
}

function openMemberMenu(id) {
  const m = teamMembers.find(x => x.id === id);
  openModal(`
    <div class="p-4">
      <h3 class="text-base font-bold text-slate-900 mb-3 px-2">${m.name}</h3>
      <div class="space-y-1">
        <button onclick="closeModal(); showToast('Viewing profile', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">View Profile</button>
        <button onclick="closeModal(); showToast('Message sent', 'success')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Send Message</button>
        <button onclick="closeModal(); showToast('Edit mode', 'info')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-slate-50 text-sm">Edit Role</button>
        <button onclick="closeModal(); confirmAction('Remove Member', 'Remove ${m.name} from the team?', () => showToast('Member removed', 'success'))" class="w-full text-left px-3 py-2 rounded-lg hover:bg-rose-50 text-rose-600 text-sm">Remove from Team</button>
      </div>
    </div>
  `);
}

/* ---------- SETTINGS ---------- */
function renderSettings() {
  const tabs = [
    { id: 'profile', label: 'Profile', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>' },
    { id: 'notifications', label: 'Notifications', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>' },
    { id: 'security', label: 'Security', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>' },
    { id: 'billing', label: 'Billing', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>' },
    { id: 'preferences', label: 'Preferences', icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>' },
  ];

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

function setSettingsTab(tab) {
  state.settingsTab = tab;
  renderPage();
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
          <button onclick="openChangePasswordModal()" class="px-4 py-2 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Change</button>
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
          <p class="text-sm text-slate-600 mt-1">$29/month · Renews Aug 1, 2026</p>
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
        <p class="text-sm font-semibold text-slate-900">•••• •••• •••• 4242</p>
        <p class="text-xs text-slate-500">Expires 12/28</p>
      </div>
      <button onclick="showToast('Edit payment method', 'info')" class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-semibold text-slate-700 hover:bg-slate-50">Edit</button>
    </div>
    <h4 class="text-sm font-semibold text-slate-900 mb-3">Recent Invoices</h4>
    <div class="space-y-2">
      ${['Jun 1, 2026', 'May 1, 2026', 'Apr 1, 2026'].map(d => `
        <div class="flex items-center justify-between p-3 border border-slate-200 rounded-lg">
          <div>
            <p class="text-sm font-medium text-slate-900">Invoice · ${d}</p>
            <p class="text-xs text-slate-500">Pro Plan · $29.00</p>
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
          <option>English</option><option selected>Indonesia</option><option>Español</option><option>Français</option>
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

function openChangePasswordModal() {
  openModal(`
    <div class="p-6">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-lg font-bold text-slate-900">Change Password</h3>
        <button onclick="closeModal()" class="p-1 rounded hover:bg-slate-100">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <form onsubmit="event.preventDefault(); closeModal(); showToast('Password changed!', 'success')" class="space-y-4">
        <div>
          <label class="text-sm font-medium text-slate-700">Current Password</label>
          <input required type="password" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">New Password</label>
          <input required type="password" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Confirm New Password</label>
          <input required type="password" class="mt-1 w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none"/>
        </div>
        <div class="flex gap-3 pt-2">
          <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2.5 border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</button>
          <button type="submit" class="flex-1 px-4 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700">Update Password</button>
        </div>
      </form>
    </div>
  `);
}

/* =========================================================
   EVENT BINDINGS & INIT
   ========================================================= */
function bindPageEvents() {
  // Project search & filter
  const projectSearch = document.getElementById('projectSearch');
  const projectFilter = document.getElementById('projectFilter');
  if (projectSearch) {
    projectSearch.oninput = filterProjects;
    projectFilter.onchange = filterProjects;
  }
}

function filterProjects() {
  const q = document.getElementById('projectSearch').value.toLowerCase();
  const f = document.getElementById('projectFilter').value;
  const filtered = projects.filter(p => {
    const matchQ = p.name.toLowerCase().includes(q) || p.client.toLowerCase().includes(q);
    const matchF = f === 'all' || p.status === f;
    return matchQ && matchF;
  });
  document.getElementById('projectGrid').innerHTML = filtered.map(projectCard).join('') || '<p class="col-span-full text-center text-slate-500 py-12">No projects found</p>';
}

// Global search shortcut
document.addEventListener('keydown', (e) => {
  if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
    e.preventDefault();
    document.getElementById('globalSearch')?.focus();
    showToast('Search activated', 'info');
  }
});

document.getElementById('globalSearch').addEventListener('keypress', (e) => {
  if (e.key === 'Enter' && e.target.value) {
    showToast(`Searching: "${e.target.value}"`, 'info');
  }
});

// Initial render
navigateTo('dashboard');
</script>

</body>
</html>