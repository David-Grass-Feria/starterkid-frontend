@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-lg font-semibold leading-6 text-font_primary underline decoration-bg-primary p-3'
            : 'text-lg font-semibold leading-6 text-font_primary p-3';
@endphp

<a {{$attributes->merge(['class' => $classes])}}>{{$slot}}</a>