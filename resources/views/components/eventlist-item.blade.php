<li>
    <div class="grid grid-cols-12 gap-5 mt-5">
        
       <div class="col-span-2">
        <div class="flex flex-col"> 
      <p class="text-xl font-bold text-font_primary">{{$day}}</p>
      <p class="text-md text-font_primary">{{$month}}</p>
       </div>
    </div>
      

    <div class="col-span-7 xl:col-span-8">
       <div class="flex flex-col">
        <h2 class="text-md xl:text-lg font-bold text-font_primary">{{$eventName}}</h2>
        <p class="text-xs text-font_primary">{!!$eventTime!!}</p>
        <p class="text-xs text-font_primary">{{$eventAdress}}</p>
        <p class="text-xs text-font_primary">{{$eventCity}}</p>
       </div>
    </div>

    <div class="col-span-3 xl:col-span-2">
        @if($firstLoop)
       <img rel="preload" as="image" width="80" height="80" class="w-20 rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
       @else
       <img loading="lazy" width="80" height="80" class="w-20 rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}" />
       @endif
    </div>
    
    </div>
</li>