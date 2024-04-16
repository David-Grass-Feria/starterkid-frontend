<li>
    <div class="grid grid-cols-12 gap-5 mt-5">
        
       <div class="col-span-2">
        <div class="flex flex-col"> 
         <p class="text-xs font-bold text-font_primary">{{$dateForHumans}}</p>
         
       </div>
    </div>
      

    <div class="col-span-7 xl:col-span-8 xl:max-w-lg">
       <div class="flex flex-col">
         
        <a target="_blank" href="{{$href}}" title="{{$linkTitle}}">
         
        <h2 class="text-md xl:text-lg font-bold text-font_primary">{{$title}}</h2>
        <p class="text-xs text-font_primary">{!!$description!!}</p>
        @if($firstLoop)
         <img rel="preload" as="image" width="24" height="14" class="w-6" src="{{$imgSrcThumb}}" alt="{{$imgAltThumb}}" />
         @else
         <img loading="lazy" width="24" height="14" class="w-6" src="{{$imgSrcThumb}}" alt="{{$imgAltThumb}}" />
         @endif
       </a>
       </div>
    </div>

    <div class="col-span-3 xl:col-span-2">
        @if($firstLoop)
       <img rel="preload" as="image" width="80" height="80" class="w-20 xl:w-48 rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
       @else
       <img loading="lazy" width="80" height="80" class="w-20 xl:w-48 rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
       @endif
    </div>
    
    </div>
</li>