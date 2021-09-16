@props(['active'])

@php
$classes = ($active ?? false)
? 'px-3 py-2 rounded-xl flex items-center justify-center text-yellow-600 animate-bounce'
: 'px-3 py-2 rounded-xl flex items-center justify-center
text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>