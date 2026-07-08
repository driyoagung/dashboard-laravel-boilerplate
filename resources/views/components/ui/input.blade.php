@props([
    'label' => null,
    'type' => 'text',
    'name' => null,
    'placeholder' => null,
    'value' => null,
    'required' => false,
    'iconLeft' => null,
])

<div class="{{ $attributes->get('class', '') }}">
    @if($label)
        <label class="text-sm font-medium text-slate-700">{{ $label }}</label>
    @endif
    <div class="relative {{ $label ? 'mt-1' : '' }}">
        @if($iconLeft)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconLeft }}"/></svg>
            </div>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            {{ $attributes->except('class')->merge(['class' => 'w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none' . ($iconLeft ? ' pl-10' : '')]) }}
        />
    </div>
</div>
