@props(['active'])

@php
$classes = ($active ?? false)
            ? ' text-white bg-info border-b-2 border-indigo-400 text-sm font-medium text-gray-900 focus:outline-none hover:text-white focus:border-indigo-700 transition duration-150 ease-in-out'
            : ' text-white border-b-2 bg-white text-gray-800  border-transparent text-sm font-medium text-gray-500  hover:border-gray-300 focus:outline-none hover:text-black focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
