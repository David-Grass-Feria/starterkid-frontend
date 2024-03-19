@props(['active'])

@php
$classes = ($active ?? false)
            ? '-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 settingFontColorOnDarkBackground settingPrimaryBackgroundColor p-3 rounded-md'
            : '-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 settingFontColor';
@endphp

<a {{$attributes->merge(['class' => $classes])}}>{{$slot}}</a>