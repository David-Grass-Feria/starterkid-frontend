<article class="flex flex-col items-start justify-between bg-white rounded-3xl border border-primary">
    <div class="relative w-full">
      @if (!empty($imgSrc))
      
            @if($firstLoop)
            <img rel="preload" as="image" width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" class="w-full object-cover rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]" 
            src="{{$imgSrc}}" alt="{{$imgAlt}}" />
            @else
            <img loading="lazy" width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" class="w-full object-cover rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]" 
            src="{{$imgSrc}}" alt="{{$imgAlt}}" />
            @endif
      @else
      

            @if($firstLoop)
            <img rel="preload" as="image" width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" class="w-full object-contain rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]" 
            src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{$imgAlt}}" />
            @else
            <img loading="lazy" width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" class="w-full object-contain rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]" 
            src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{$imgAlt}}" />
            @endif
      @endif
      
      <x-starterkid-frontend::image-credits imageCredits="{{$imgCredits}}"/>
    </div>
    
    
    <div class="w-full text-font_primary p-3">
      <h2 class="mt-3 text-lg font-bold">{{$heading}}</h2>
     {{$slot}}
     <div class="mt-10">
      <a wire:navigate href="{{$href}}" title="{{$hrefTitle}}">
   <x-starterkid-frontend::button-secondary class="w-full">{{$hrefAnchor}}</x-starterkid-frontend::button-secondary>
      </a>
    </div>
    </div>
  
  </article>