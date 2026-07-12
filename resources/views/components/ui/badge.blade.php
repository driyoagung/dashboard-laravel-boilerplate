@props([
    'color' => 'slate',
    'size' => 'md',
])

@php
$colorMap = [
    'indigo'  => 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300',
    'emerald' => 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300',
    'rose'    => 'bg-rose-50 dark:bg-rose-900/30 text-rose-700 dark:text-rose-300',
    'amber'   => 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300',
    'sky'     => 'bg-sky-50 dark:bg-sky-900/30 text-sky-700 dark:text-sky-300',
    'slate'   => 'bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300',
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
