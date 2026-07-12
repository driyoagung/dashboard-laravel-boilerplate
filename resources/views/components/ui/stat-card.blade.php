@props([
    'label' => '',
    'value' => '',
    'change' => null,
    'color' => 'indigo',
    'icon' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl p-5']) }}>
    <div class="flex items-center justify-between">
        <div class="w-10 h-10 rounded-lg bg-{{ $color }}-50 dark:bg-{{ $color }}-900/30 flex items-center justify-center">
            @if($icon)
                <svg class="w-5 h-5 text-{{ $color }}-600 dark:text-{{ $color }}-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
                </svg>
            @endif
        </div>
        @if($change)
            <span class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-2 py-1 rounded-full">{{ $change }}</span>
        @endif
    </div>
    <p class="text-2xl font-bold text-slate-900 dark:text-white mt-4">{{ $value }}</p>
    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $label }}</p>
</div>
