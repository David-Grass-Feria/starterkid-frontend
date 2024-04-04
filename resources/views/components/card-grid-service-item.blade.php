<div class="relative flex items-center space-x-3 rounded-lg border border-primary bg-white px-6 py-5">

 
    <div class="flex-shrink-0">
      <img width="40" height="40" class="h-10 w-10 rounded-3xl object-contain" src="{{$imgSrc}}" alt="{{$imgAlt}}">
    </div>
    <div class="min-w-0 flex-1 text-font_primary">
      <a wire:navigate href="{{$href}}" title="{{$hrefTitle}}" class="focus:outline-none">
        <span class="absolute inset-0" aria-hidden="true"></span>
        <p class="text-lg font-bold">{{$heading}}</p>
        <p class="truncate text-xs">{!! $preview !!}</p>
      </a>
    </div>
 

</div>

