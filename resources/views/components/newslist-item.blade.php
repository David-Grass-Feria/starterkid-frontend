<li>
    <div class="grid grid-cols-12 gap-5 mt-5">
        
       <div class="col-span-2">
        <div class="flex flex-col"> 
         <p class="text-xs font-bold text-font_primary">{{$dateForHumans}}</p>
         
       </div>
    </div>
      

    <div class="col-span-7 xl:col-span-8 xl:max-w-lg">
       <div class="flex flex-col">
         
        <a class="space-y-5" target="_blank" href="{{$href}}" title="{{$linkTitle}}">
         <div class="flex items-center space-x-1">
        <img class="w-4" src="{{$imgSrcThumb}}" alt="{{$imgSrcAltThumb}}" />
        <span class="text-xs">{{$vendorName}}</span>
         </div> 
        <h2 class="text-md xl:text-lg font-bold text-font_primary">{{$title}}</h2>
        <p class="text-xs text-font_primary">{!!$description!!}</p>
        <p class="text-xs text-font_primary">{{$vendor}}</p>
       </a>
       </div>
    </div>

    <div class="col-span-3 xl:col-span-2">
        @if($firstLoop)
       <img rel="preload" as="image" width="80" height="80" class="w-20 xl:w-44 rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
       @else
       <img loading="lazy" width="80" height="80" class="w-20 xl:w-44 rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
       @endif
    </div>
    
    </div>
</li>