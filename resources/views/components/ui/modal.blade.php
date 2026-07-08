@props([
    'id' => 'modal',
    'maxWidth' => 'lg',
])

@php
$widths = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
];
@endphp

<template id="{{ $id }}Template">
    <div class="modal-backdrop fixed inset-0 bg-slate-900/50 z-50 flex items-center justify-center p-4" onclick="if(event.target===this) closeModal()">
        <div class="bg-white rounded-2xl shadow-xl {{ $widths[$maxWidth] ?? 'max-w-lg' }} w-full max-h-[90vh] overflow-y-auto slide-in">
            {{ $slot }}
        </div>
    </div>
</template>
