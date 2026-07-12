@props([
    'label' => null,
    'name' => null,
    'rows' => 3,
    'placeholder' => null,
    'value' => null,
    'required' => false,
])

<div class="{{ $attributes->get('class', '') }}">
    @if($label)
        <label class="text-sm font-medium text-slate-700">{{ $label }}</label>
    @endif
    <textarea
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        {{ $attributes->except('class')->merge(['class' => 'w-full border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none resize-none' . ($label ? ' mt-1' : '')]) }}
    >{{ $value ?? $slot }}</textarea>
</div>
