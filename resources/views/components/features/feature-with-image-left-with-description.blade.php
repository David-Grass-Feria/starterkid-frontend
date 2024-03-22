<div class="mt-20 grid grid-cols-1 xl:grid-cols-2 gap-10 xl:gap-40 items-center text-center xl:text-left">
   
<div class="relative order-2 xl:order-1">
<img class="rounded-3xl w-full xl:max-w-[600px]" src="{{$imgSrc}}" alt="{{$imgAlt}}">
<x-starterkid-frontend::image-credits imageCredits="{{$imgCredits}}"/>
</div>


<div class="text-font_primary max-w-4xl order-1 xl:order-2">
  <h2 class="text-2xl xl:text-6xl font-semibold">{{$heading}}</h2>
<p class="mt-6 text-lg leading-8 text-font_primary">{{$description}}</p>



<div class="mt-10">
<a href="{{$buttonPrimaryRoute}}" title="{{$buttonPrimaryAnchor}}">
<x-starterkid-frontend::button-secondary>{{$buttonPrimaryAnchor}}</x-starterkid-frontend::button-secondary>
</a>
</div>

</div>


  </div>