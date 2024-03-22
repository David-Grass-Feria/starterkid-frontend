<div class="mt-5 xl:mt-20 grid grid-cols-1 xl:grid-cols-2 gap-10 xl:gap-40 items-center">
   



    <div class="text-font_primary max-w-4xl text-center">
      <h1 class="text-4xl font-bold tracking-tight text-font_primary sm:text-6xl xl:text-8xl">{{$h1}}
        <br><span class="text-primary">{{$h1Color}}</span>
        </h1>
        <p class="mt-6 text-lg leading-8 text-font_primary">{{$description}}</p>
    
    <div class="flex items-center mt-10 space-x-5 justify-center">
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
    
    <div class="relative">
      <img class="rounded-3xl shadow-xl w-full h-full xl:max-w-[600px]" src="{{$imgSrc}}" alt="{{$imgAlt}}">
      <x-starterkid-frontend::image-credits imageCredits="{{config('starterkid-frontend.hero_image_credits')}}"/>
      </div>
    
      </div>