<li class="relative flex justify-between bg-white border border-primary rounded-xl p-3">
    <div class="flex min-w-0 gap-x-4 items-center">
        @if($firstLoop)
        <img rel="preload" class="h-5 w-5 xl:h-10 xl:w-10 flex-none rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}">
        @else
        <img rel="lazy" class="h-5 w-5 xl:h-10 xl:w-10 flex-none rounded-md" src="{{$imgSrc}}" alt="{{$imgAlt}}">
        @endif
      <div class="min-w-0 flex-auto">
        <p class="text-sm font-semibold leading-6 text-font_primary">
          <a href="{{$href}}" title="{{$hrefTitle}}">
            <span class="absolute inset-x-0 -top-px bottom-0"></span>
            {{$heading}}
          </a>
        </p>
       
      </div>
    </div>
   
  </li>