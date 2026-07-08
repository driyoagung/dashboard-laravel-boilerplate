@props([
    'label' => null,
    'name' => null,
    'checked' => false,
])

<label class="relative inline-flex items-center cursor-pointer {{ $attributes->get('class', '') }}">
    <input type="checkbox" name="{{ $name }}" {{ $checked ? 'checked' : '' }} class="sr-only peer" onchange="{{ $attributes->get('onchange', '') }}"/>
    <div class="w-11 h-6 bg-slate-200 peer-focus:ring-2 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-indigo-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
    @if($label)
        <span class="ml-3 text-sm font-medium text-slate-700">{{ $label }}</span>
    @endif
</label>
