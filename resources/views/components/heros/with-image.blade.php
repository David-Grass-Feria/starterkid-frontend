<div class="grid grid-cols-1 xl:grid-cols-2 gap-10 items-center">



<div class="w-full xl:max-w-2xl mx-auto mt-10">
    <div class="relative isolate">
      <div>
         <div class="text-center">
           <h1 class="text-4xl font-bold tracking-tight text-font_primary sm:text-6xl xl:text-8xl">{{$h1}}<br><span class="text-primary">{{$h1Color}}</span></h1>
           <p class="mt-6 text-lg leading-8 text-font_primary">{{$description}}</p>
           <div class="mt-10 flex items-center justify-center gap-x-6">
            @if(isset($buttonPrimaryRoute))
             <a href="{{$buttonPrimaryRoute}}" title="{{$buttonPrimaryAnchor}}">
             <x-starterkid-frontend::button-primary>{{$buttonPrimaryAnchor}}</x-starterkid-frontend::button-primary>
             </a>
             @endif
             @if(isset($buttonSecondaryRoute))
             <a href="{{$buttonSecondaryRoute}}" title="{{$buttonSecondaryAnchor}}">
             <x-starterkid-frontend::button-secondary>{{$buttonSecondaryAnchor}}</x-starterkid-frontend::button-secondary>
             </a>
             @endif
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="relative">
    <img class="border border-gray-300 rounded-3xl w-full mt-10" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
    <x-starterkid-frontend::image-credits imageCredits="{{config('starterkid-frontend.hero_image_credits')}}"/>
   </div>

  </div>