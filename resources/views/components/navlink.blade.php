@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-lg font-semibold leading-6 text-font_secondary bg-primary p-3 rounded-md'
            : 'text-lg font-semibold leading-6 text-font_primary p-3';
@endphp

<a {{$attributes->merge(['class' => $classes])}}>{{$slot}}</a>