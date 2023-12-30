@props(['active'])

@php
    $classes = $active ?? false ? 'p-4 bg-sky-700 font-bold' : 'p-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
