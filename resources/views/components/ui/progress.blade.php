@props([
    'value' => 0,
    'max' => 100,
    'color' => 'indigo',
    'size' => 'md',
    'showLabel' => false,
])

@php
$percent = min(100, max(0, ($value / $max) * 100));
$heights = ['sm' => 'h-1', 'md' => 'h-1.5', 'lg' => 'h-2.5'];
$h = $heights[$size] ?? $heights['md'];
@endphp

<div class="{{ $attributes->get('class', '') }}">
    @if($showLabel)
        <div class="flex justify-between text-xs mb-1.5">
            <span class="text-slate-500 dark:text-slate-400">{{ $slot }}</span>
            <span class="font-semibold text-slate-900 dark:text-white">{{ round($percent) }}%</span>
        </div>
    @endif
    <div class="{{ $h }} bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
        <div class="h-full bg-{{ $color }}-600 rounded-full transition-all duration-300" style="width: {{ $percent }}%"></div>
    </div>
</div>
