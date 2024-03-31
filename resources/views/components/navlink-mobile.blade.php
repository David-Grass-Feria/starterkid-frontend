@props(['active'])

@php
$classes = ($active ?? false)
            ? '-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-font_primary underline decoration-text-primary p-3'
            : '-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-font_primary';
@endphp

<a {{$attributes->merge(['class' => $classes])}}>{{$slot}}</a>