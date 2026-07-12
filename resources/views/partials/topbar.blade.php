<header class="bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 sticky top-0 z-30">
    <div class="flex items-center justify-between px-4 lg:px-8 py-3">
        <div class="flex items-center gap-3">
            <button id="menuBtn" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                <svg class="w-5 h-5 text-slate-600 dark:text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div class="hidden md:flex items-center gap-2 bg-slate-100 dark:bg-slate-700 rounded-lg px-3 py-2 w-80">
                <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input id="globalSearch" type="text" placeholder="Search anything..." class="bg-transparent outline-none text-sm flex-1 placeholder:text-slate-400 dark:placeholder:text-slate-500 dark:text-slate-200"/>
                <kbd class="hidden lg:inline text-xs text-slate-400 dark:text-slate-500 border border-slate-300 dark:border-slate-600 rounded px-1.5">&#x2318;K</kbd>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <button onclick="showToast('No new notifications', 'info')" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 relative">
                <svg class="w-5 h-5 text-slate-600 dark:text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 rounded-full"></span>
            </button>
            <button id="themeToggle" onclick="toggleTheme()" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                <svg id="sunIcon" class="w-5 h-5 text-slate-600 dark:text-slate-300 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <svg id="moonIcon" class="w-5 h-5 text-slate-600 dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            </button>
            <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-1 hidden sm:block"></div>
            <div class="flex items-center gap-3 pl-1 cursor-pointer" onclick="window.location='{{ route('settings') }}'">
                <img src="https://i.pravatar.cc/80?img=47" class="w-9 h-9 rounded-full object-cover ring-2 ring-white dark:ring-slate-800" alt="user"/>
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold text-slate-900 dark:text-white leading-tight">Andini Pratiwi</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Administrator</p>
                </div>
            </div>
        </div>
    </div>
</header>
