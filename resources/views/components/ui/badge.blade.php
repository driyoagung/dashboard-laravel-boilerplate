@props([
    'color' => 'slate',
    'size' => 'md',
])

@php
$colorMap = [
    'indigo'  => 'bg-indigo-50 text-indigo-700',
    'emerald' => 'bg-emerald-50 text-emerald-700',
    'rose'    => 'bg-rose-50 text-rose-700',
    'amber'   => 'bg-amber-50 text-amber-700',
    'sky'     => 'bg-sky-50 text-sky-700',
    'slate'   => 'bg-slate-100 text-slate-600',
];

$sizeMap = [
    'sm' => 'text-xs px-1.5 py-0.5',
    'md' => 'text-xs px-2 py-1',
    'lg' => 'text-sm px-2.5 py-1',
];
@endphp

<span {{ $attributes->merge(['class' => 'font-semibold rounded-full inline-flex items-center ' . ($colorMap[$color] ?? $colorMap['slate']) . ' ' . ($sizeMap[$size] ?? $sizeMap['md'])]) }}>
    {{ $slot }}
</span>
