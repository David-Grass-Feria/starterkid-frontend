@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-lg font-semibold leading-6 settingFontColorOnDarkBackground settingPrimaryBackgroundColor p-3 rounded-md'
            : 'text-lg font-semibold leading-6 settingFontColor p-3';
@endphp

<a {{$attributes->merge(['class' => $classes])}}>{{$slot}}</a>