@props(['active'])

@php
$classes = ($active ?? false)
? 'px-3 py-2 flex items-center justify-center text-yellow-800 border-b border-white'
: 'px-3 py-2 flex items-center justify-center text-gray-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>