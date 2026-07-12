@props(['padding' => true, 'hover' => false, 'class' => ''])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl ' . ($padding ? 'p-6' : '') . ($hover ? ' hover:border-indigo-300 dark:hover:border-indigo-600 transition cursor-pointer' : '') . ' ' . $class]) }}>
    {{ $slot }}
</div>
