<article class="relative isolate flex flex-col justify-end overflow-hidden rounded-3xl bg-white px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
 @if (!empty($model->getFirstMediaUrl('images', config('starterkid.spatie_conversions.medium.name'))))
        <img src="{{$imgSrc}}" alt="{{$imgAlt}}" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <x-starterkid-frontend::image-credits imageCredits="{{$imageCredits}}"/>
        @else
        <img src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{config('app.name')}}" alt="{{$imgAlt}}" class="absolute inset-0 -z-10 max-w-sm mx-auto object-contain">
        @endif
  <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/10"></div>
  <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

  <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-xs leading-6 text-gray-300">
    <time datetime="{{$dateTime}}" class="mr-8">{{$dateTime}}</time>
    <div class="-ml-4 flex items-center gap-x-4">
     
      <div class="flex gap-x-2.5">
        
        {{$author}}
      </div>
    </div>
  </div>
  <h2 class="mt-1 text-lg font-semibold text-white">
    <a href="{{$linkRoute}}" title="{{$linkTitle}}">
      <span class="absolute inset-0"></span>
      {{Str::limit($name,100)}}
    </a>
  </h2>
  <span class="text-sm text-white">{!!Str::limit($description,150)!!}</span>
</article>