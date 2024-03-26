<x-slot:title>{{config('starterkid-frontend.homepage_title')}}</x-slot>
<x-slot:robots>index, follow</x-slot>
<x-slot:description>{{config('starterkid-frontend.homepage_description')}}</x-slot>
<div>
@include('starterkid-frontend::header')



@include('homepage')




@include('starterkid-frontend::footer',['services' => $services])
</div>