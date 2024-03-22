<div class="mt-20 grid grid-cols-1 xl:grid-cols-2 gap-10 xl:gap-40 items-center text-center xl:text-left">
   



<div class="text-font_primary max-w-4xl">
  <h2 class="text-2xl xl:text-6xl font-semibold">{{$heading}}</h2>

{{$slot}}



<div class="mt-10">
<a href="{{$buttonPrimaryRoute}}" title="{{$buttonPrimaryAnchor}}">
<x-starterkid-frontend::button-secondary>{{$buttonPrimaryAnchor}}</x-starterkid-frontend::button-secondary>
</a>
</div>

</div>

<div class="relative">
  <img class="rounded-3xl w-full xl:max-w-[600px]" src="{{$imgSrc}}" alt="{{$imgAlt}}">
  <x-starterkid-frontend::image-credits imageCredits="{{$imgCredits}}"/>
  </div>

  </div>