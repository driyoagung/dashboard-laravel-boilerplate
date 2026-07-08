@props(['padding' => true, 'hover' => false, 'class' => ''])

<div {{ $attributes->merge(['class' => 'bg-white border border-slate-200 rounded-2xl ' . ($padding ? 'p-6' : '') . ($hover ? ' hover:border-indigo-300 transition cursor-pointer' : '') . ' ' . $class]) }}>
    {{ $slot }}
</div>
