<div class="bg-white">

<div class="relative">
  @if (!empty($model->getFirstMediaUrl('images', 'medium')))
  <img src="{{$imgSrc}}" alt="{{$imgAlt}}" class="w-full h-full xl:w-[600px] xl:h-[400px] object-cover rounded-t-3xl">
  @else
  <img src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{$imgAlt}}" class="w-full xl:w-[600px] xl:h-[400px] object-contain border-l border-r border-t border-gray-400 rounded-t-3xl">
  @endif
  <x-starterkid-frontend::image-credits imageCredits="{{$imageCredits}}"/>
</div>

<a href="{{$linkRoute}}" title="{{$linkTitle}}" class="bg-white text-font_primary border-b border-l border-r border-gray-400 rounded-b-3xl p-3 flex flex-col justify-evenly hover:bg-primary hover:text-white h-52 cursor-pointer">
 
<h2 class="text-xl font-bold">{{$name}}</h2>
<p class="text-sm">{!!Str::limit($description,200)!!}</p>

<div class="flex items-center space-x-2">
<p class="text-xs">{{$dateTime}}</p>
<p class="text-xs">{{$author}}</p>
</div>
</a>

</div>