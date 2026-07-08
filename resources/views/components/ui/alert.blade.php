@props([
    'type' => 'info',
    'title' => null,
    'dismissible' => false,
])

@php
$types = [
    'success' => ['bg' => 'bg-emerald-50 border-emerald-200', 'icon' => 'emerald', 'path' => 'M5 13l4 4L19 7'],
    'error'   => ['bg' => 'bg-rose-50 border-rose-200', 'icon' => 'rose', 'path' => 'M6 18L18 6M6 6l12 12'],
    'warning' => ['bg' => 'bg-amber-50 border-amber-200', 'icon' => 'amber', 'path' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
    'info'    => ['bg' => 'bg-indigo-50 border-indigo-200', 'icon' => 'indigo', 'path' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
];
$t = $types[$type] ?? $types['info'];
@endphp

<div {{ $attributes->merge(['class' => 'border rounded-lg p-4 flex gap-3 ' . $t['bg']]) }}>
    <div class="w-8 h-8 rounded-full bg-{{ $t['icon'] }}-100 flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-{{ $t['icon'] }}-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $t['path'] }}"/>
        </svg>
    </div>
    <div class="flex-1 min-w-0">
        @if($title)
            <p class="text-sm font-semibold text-slate-900">{{ $title }}</p>
        @endif
        <div class="text-sm text-slate-600 {{ $title ? 'mt-1' : '' }}">
            {{ $slot }}
        </div>
    </div>
    @if($dismissible)
        <button onclick="this.closest('[class*=border]').remove()" class="text-slate-400 hover:text-slate-600 flex-shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    @endif
</div>
