<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')
hello from homepage

@include('starterkid-frontend::footer',['services' => $services])
</div>