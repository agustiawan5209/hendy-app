@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-white text-black'
            : 'bg-black text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
