<div>
  <div class="rounded-3xl group relative bg-white p-6 text-font_primary h-96 shadow-md border border-primary">
    <div>
      <span class="inline-flex rounded-lg p-3">
        @if($firstLoop)
      <img rel="preload" as="image" width="40" height="40" class="h-10 w-10 rounded-3xl object-contain" src="{{$imgSrc}}" alt="{{$imgAlt}}">
      @else
      <img loading="lazy" width="40" height="40" class="h-10 w-10 rounded-3xl object-contain" src="{{$imgSrc}}" alt="{{$imgAlt}}">
      @endif
      </span>
    </div>
    <div class="mt-8">
      <h3 class="text-base font-semibold leading-6">
        <a wire:navigate href="{{$href}}" title="{{$hrefTitle}}" class="focus:outline-none">
          <!-- Extend touch target to entire panel -->
          <span class="absolute inset-0" aria-hidden="true"></span>
          {{$heading}}
        </a>
      </h3>
      <p class="mt-2 text-sm text-gray-500">{!! $preview !!}</p>
    </div>
   
  </div>
</div>


