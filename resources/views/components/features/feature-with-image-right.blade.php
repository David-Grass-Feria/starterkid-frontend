<div class="mt-20 grid grid-cols-1 xl:grid-cols-2 gap-10 xl:gap-40 items-center text-center xl:text-left">
   



<div class="text-font_primary max-w-4xl">
<x-starterkid-frontend::h2 h2="{{$heading}}" />
@if(isset($description))
<x-starterkid-frontend::description description="{{$description}}" />
@endif
{{$slot}}
@if(isset($buttonPrimaryRoute))
<div class="mt-10">
<a href="{{$buttonPrimaryRoute}}" title="{{$buttonPrimaryAnchor}}">
<x-starterkid-frontend::button-secondary>{{$buttonPrimaryAnchor}}</x-starterkid-frontend::button-secondary>
</a>
</div>
@endif
</div>

<div class="relative">
  <img class="rounded-3xl" src="{{$imgSrc}}" alt="{{$imgAlt}}">
  <x-starterkid-frontend::image-credits imageCredits="{{$imgCredits}}"/>
  </div>

  </div>