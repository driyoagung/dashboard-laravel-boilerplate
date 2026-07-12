@props([
    'src' => '',
    'alt' => '',
    'size' => 'md',
    'status' => null,
])

@php
$sizes = ['sm' => 'w-7 h-7', 'md' => 'w-9 h-9', 'lg' => 'w-10 h-10', 'xl' => 'w-14 h-14'];
$dotSizes = ['sm' => 'w-2 h-2', 'md' => 'w-2.5 h-2.5', 'lg' => 'w-3 h-3', 'xl' => 'w-3.5 h-3.5'];
$s = $sizes[$size] ?? $sizes['md'];
$ds = $dotSizes[$size] ?? $dotSizes['md'];

$statusColors = [
    'online' => 'bg-emerald-500',
    'away' => 'bg-amber-500',
    'offline' => 'bg-slate-400',
];
@endphp

<div class="relative inline-flex {{ $attributes->get('class', '') }}">
    <img src="{{ $src }}" class="{{ $s }} rounded-full object-cover {{ $status ? 'ring-2 ring-white dark:ring-slate-800' : '' }}" alt="{{ $alt }}"/>
    @if($status && isset($statusColors[$status]))
        <span class="absolute bottom-0 right-0 {{ $ds }} {{ $statusColors[$status] }} rounded-full ring-2 ring-white dark:ring-slate-800"></span>
    @endif
</div>
