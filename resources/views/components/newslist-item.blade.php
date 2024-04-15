<li>
    <div class="grid grid-cols-12 gap-5 mt-5">
        
       <div class="col-span-2">
        <div class="flex flex-col"> 
      <p class="text-sm font-bold text-font_primary">{{$dateForHumans}}</p>
       </div>
    </div>
      

    <div class="col-span-7 xl:col-span-8">
       <div class="flex flex-col">
        <a target="_blank" href="{{$href}}" title="{{$linkTitle}}">
        <h2 class="text-md xl:text-md font-bold text-font_primary">{{$title}}</h2>
       </a>
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