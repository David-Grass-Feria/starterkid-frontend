


<article class="flex flex-col items-start justify-between bg-white rounded-3xl border border-primary">
    <div class="relative w-full">
      @if (!empty($imgSrc))
      
      
        <img width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" class="w-full object-cover rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]" 
        src="{{$imgSrc}}" alt="{{$imgAlt}}" />
      @else
      <img width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" class="w-full object-contain rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]" 
    src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{$imgAlt}}" />
     
      @endif
      
      <x-starterkid-frontend::image-credits imageCredits="{{$imgCredits}}"/>
    </div>
    
    <a href="{{$href}}" title="{{$hrefTitle}}">
    <div class="w-full text-font_primary p-3">
      <div class="mt-8 flex items-center gap-x-4 text-xs">
        <time datetime="{{$dateTime}}">{{$dateTime}}</time>
        <p>{{$author}}</p>
      </div>
      <div class="group relative">
        <h2 class="mt-3 text-lg font-bold">{{$heading}}</h2>
        <p class="mt-5 line-clamp-3 text-sm">{!!$preview!!}</p>
      </div>
     
    </div>
  </a>
  </article>

