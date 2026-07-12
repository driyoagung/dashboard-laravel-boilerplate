<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - AppBoard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-thin::-webkit-scrollbar { width: 6px; height: 6px; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
        .dark .scrollbar-thin::-webkit-scrollbar-thumb { background: #475569; }
        .fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .slide-in { animation: slideIn 0.25s ease-out; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
        .toast-in { animation: toastIn 0.3s ease-out; }
        @keyframes toastIn { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        .modal-backdrop { animation: fadeInBg 0.2s ease-out; }
        @keyframes fadeInBg { from { opacity: 0; } to { opacity: 1; } }
        
        /* Dark mode base styles */
        .dark body {
            background-color: #0f172a;
            color: #e2e8f0;
        }
        
        /* Dark mode overrides for dynamically rendered content */
        .dark .bg-white { background-color: #1e293b !important; }
        .dark .bg-slate-50 { background-color: #0f172a !important; }
        .dark .bg-slate-100 { background-color: #334155 !important; }
        .dark .text-slate-900 { color: #f1f5f9 !important; }
        .dark .text-slate-800 { color: #e2e8f0 !important; }
        .dark .text-slate-700 { color: #cbd5e1 !important; }
        .dark .text-slate-600 { color: #94a3b8 !important; }
        .dark .text-slate-500 { color: #64748b !important; }
        .dark .text-slate-400 { color: #475569 !important; }
        .dark .border-slate-200 { border-color: #334155 !important; }
        .dark .border-slate-100 { border-color: #1e293b !important; }
        .dark .hover\:bg-slate-50:hover { background-color: #1e293b !important; }
        .dark .hover\:bg-slate-100:hover { background-color: #334155 !important; }
        
        /* Dark mode for cards and containers */
        .dark .bg-white.border { 
            background-color: #1e293b !important; 
            border-color: #334155 !important; 
        }
        
        /* Dark mode for inputs */
        .dark input, .dark select, .dark textarea {
            background-color: #334155 !important;
            border-color: #475569 !important;
            color: #e2e8f0 !important;
        }
        .dark input::placeholder, .dark textarea::placeholder {
            color: #64748b !important;
        }
        
        /* Dark mode for modals */
        .dark .modal-backdrop .bg-white {
            background-color: #1e293b !important;
        }
        
        /* Dark mode for toasts */
        .dark .toast-in {
            background-color: #1e293b !important;
            border-color: #334155 !important;
        }
        
        /* Dark mode for progress bars */
        .dark .bg-slate-100 {
            background-color: #334155 !important;
        }
        
        /* Dark mode for badges */
        .dark .bg-indigo-50 { background-color: rgba(79, 70, 229, 0.2) !important; }
        .dark .bg-emerald-50 { background-color: rgba(16, 185, 129, 0.2) !important; }
        .dark .bg-amber-50 { background-color: rgba(245, 158, 11, 0.2) !important; }
        .dark .bg-rose-50 { background-color: rgba(244, 63, 94, 0.2) !important; }
        .dark .bg-sky-50 { background-color: rgba(14, 165, 233, 0.2) !important; }
        
        /* Dark mode for specific components */
        .dark .bg-indigo-600 { background-color: #4f46e5 !important; }
        .dark .bg-emerald-600 { background-color: #059669 !important; }
        .dark .bg-rose-600 { background-color: #e11d48 !important; }
        .dark .bg-amber-500 { background-color: #f59e0b !important; }
        
        /* Dark mode for calendar cells */
        .dark .aspect-square {
            background-color: #1e293b !important;
            border-color: #334155 !important;
        }
        .dark .aspect-square:hover {
            border-color: #4f46e5 !important;
        }
        
        /* Dark mode for tables */
        .dark table {
            color: #e2e8f0 !important;
        }
        .dark th {
            color: #94a3b8 !important;
        }
        .dark tr {
            border-color: #334155 !important;
        }
        .dark tr:hover {
            background-color: #1e293b !important;
        }
    </style>
    <script>
        // Initialize dark mode before page load to prevent flash
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    @stack('styles')
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200">

    @include('partials.toast-container')
    @include('partials.modal-container')

    <div class="flex min-h-screen">
        @include('partials.sidebar', ['currentPage' => $currentPage ?? ''])

        <div class="flex-1 flex flex-col min-w-0">
            @include('partials.topbar')

            <main class="flex-1 p-4 lg:p-8">
                <div class="fade-in">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
