<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')


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


<x-starterkid-frontend::features.feature-wrapper>
      <x-starterkid-frontend::features.feature heading="Push to deploy" description="Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute left-1 top-1 h-5 w-5 settingPrimaryFontColor" viewBox="0 0 16 16">
                <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
              </svg>
        </x-slot>
      </x-starterkid-frontend::features.feature>

      <x-starterkid-frontend::features.feature heading="Push to deploy" description="Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute left-1 top-1 h-5 w-5 settingPrimaryFontColor" viewBox="0 0 16 16">
                <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
              </svg>
        </x-slot>
      </x-starterkid-frontend::features.feature>

      <x-starterkid-frontend::features.feature heading="Push to deploy" description="Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute left-1 top-1 h-5 w-5 settingPrimaryFontColor" viewBox="0 0 16 16">
                <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
              </svg>
        </x-slot>
      </x-starterkid-frontend::features.feature>

      <x-starterkid-frontend::features.feature heading="Push to deploy" description="Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute left-1 top-1 h-5 w-5 settingPrimaryFontColor" viewBox="0 0 16 16">
                <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
              </svg>
        </x-slot>
      </x-starterkid-frontend::features.feature>

      <x-starterkid-frontend::features.feature heading="Push to deploy" description="Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute left-1 top-1 h-5 w-5 settingPrimaryFontColor" viewBox="0 0 16 16">
                <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
              </svg>
        </x-slot>
      </x-starterkid-frontend::features.feature>

      <x-starterkid-frontend::features.feature heading="Push to deploy" description="Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute left-1 top-1 h-5 w-5 settingPrimaryFontColor" viewBox="0 0 16 16">
                <path d="M0 10a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M.91 7.204A3 3 0 0 1 2 7h12c.384 0 .752.072 1.09.204l-1.867-3.422A1.5 1.5 0 0 0 11.906 3H4.094a1.5 1.5 0 0 0-1.317.782z"/>
              </svg>
        </x-slot>
      </x-starterkid-frontend::features.feature>
     
    </x-starterkid-frontend::features.feature-wrapper>
      
     
     
  






</x-starterkid-frontend::wrapper>


@include('starterkid-frontend::footer',['services' => $services])
</div>