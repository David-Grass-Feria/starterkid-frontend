<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')




<x-starterkid-frontend::card>

<x-starterkid-frontend::wrapper>






@include('homepage')




<x-starterkid-frontend::features.feature-with-image-left 
heading="{{config('starterkid-frontend.hero_h1')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
imgSrc="https://tierschutzverein-muenchen.de/img/containers/assets/v1/startseite/shop-startseite-finish.jpg/8afa9ab3541f90875830f0d7814585b0.jpg" 
imgAlt="{{config('starterkid-frontend.hero_image_alt')}}"
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" /> 

<x-starterkid-frontend::features.feature-with-image-right 
heading="{{config('starterkid-frontend.hero_h1')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
imgSrc="https://tierschutzverein-muenchen.de/img/containers/assets/v1/startseite/shop-startseite-finish.jpg/8afa9ab3541f90875830f0d7814585b0.jpg" 
imgAlt="{{config('starterkid-frontend.hero_image_alt')}}"
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" /> 



  
      
     
     
</x-starterkid-frontend::wrapper>


</x-starterkid-frontend::card>


@include('starterkid-frontend::footer',['services' => $services])
</div>