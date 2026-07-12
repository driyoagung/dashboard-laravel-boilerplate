@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => null,
])

<div class="{{ $attributes->get('class', '') }}">
    @if($label)
        <label class="text-sm font-medium text-slate-700">{{ $label }}</label>
    @endif
    <select
        name="{{ $name }}"
        {{ $attributes->except('class')->merge(['class' => 'border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100 w-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none' . ($label ? ' mt-1' : '')]) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach($options as $value => $label)
            <option value="{{ is_string($value) ? $value : $label }}" {{ (is_string($value) ? $value : $label) == $selected ? 'selected' : '' }}>
                {{ is_string($value) ? $label : $label }}
            </option>
        @endforeach
        {{ $slot }}
    </select>
</div>
