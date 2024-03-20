<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')




<x-starterkid-frontend::card>

<x-starterkid-frontend::wrapper>






<x-starterkid-frontend::heros.with-image 
h1="{{config('starterkid-frontend.hero_h1')}}" 
h1Color="{{config('starterkid-frontend.hero_h1_color')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" 
buttonSecondaryRoute="{{config('starterkid-frontend.hero_button_secondary_route')}}" 
buttonSecondaryAnchor="{{config('starterkid-frontend.hero_button_secondary_anchor')}}" 
imgSrc="https://bfs-saalfeld.de/storage/logos/1/homepage/burger-fur-saalfeld.jpg" 
imgAlt="{{config('starterkid-frontend.hero_image_alt')}}" />





      
     
     
</x-starterkid-frontend::wrapper>


</x-starterkid-frontend::card>


@include('starterkid-frontend::footer',['services' => $services])
</div>