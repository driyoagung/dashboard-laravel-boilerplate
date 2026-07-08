<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - AppBoard</title>
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
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800">

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
