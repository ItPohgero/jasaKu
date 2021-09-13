@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-gray-200 px-3 py-2 rounded-xl flex items-center justify-center text-gray-400'
: 'bg-gray-100 px-3 py-2 rounded-xl flex items-center justify-center text-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>