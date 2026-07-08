@props([
    'title' => '',
    'subtitle' => null,
    'date' => null,
])

<div {{ $attributes->merge(['class' => 'flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6']) }}>
    <div>
        @if($date)
            <p class="text-sm text-slate-500">{{ $date }}</p>
        @endif
        <h2 class="{{ $date ? 'text-2xl lg:text-3xl' : 'text-2xl' }} font-bold text-slate-900 {{ $date ? 'mt-1' : '' }}">{{ $title }}</h2>
        @if($subtitle)
            <p class="text-sm text-slate-500 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    <div class="flex items-center gap-3">
        {{ $slot }}
    </div>
</div>
