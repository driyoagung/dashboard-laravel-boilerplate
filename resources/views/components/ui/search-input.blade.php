@props([
    'placeholder' => 'Search...',
    'name' => 'search',
    'value' => '',
])

<div {{ $attributes->merge(['class' => 'flex items-center gap-2 bg-slate-100 rounded-lg px-3 py-2']) }}>
    <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
    <input
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class="bg-transparent outline-none text-sm flex-1 placeholder:text-slate-400"
    />
</div>
