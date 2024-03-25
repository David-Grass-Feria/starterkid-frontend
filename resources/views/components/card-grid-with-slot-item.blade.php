<article class="flex flex-col items-start justify-between bg-white rounded-3xl border border-gray-400">
    <div class="relative w-full">
      @if (!empty($imgSrc))
      <img src="{{$imgSrc}}" alt="{{$imgAlt}}" class="w-full object-cover rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]">
      
      @else
      <img src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{$imgAlt}}" class="w-full object-contain rounded-t-3xl aspect-[2/2] lg:aspect-[3/3]">
      @endif
      
      <x-starterkid-frontend::image-credits imageCredits="{{$imgCredits}}"/>
    </div>
    
    <a href="{{$href}}" title="{{$hrefTitle}}">
    <div class="w-full text-font_primary p-3">
      <h2 class="mt-3 text-lg font-semibold">{{$heading}}</h2>
     {{$slot}}
     
    </div>
  </a>
  </article>