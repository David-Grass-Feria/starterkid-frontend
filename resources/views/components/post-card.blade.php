<div class="bg-white border border-gray-300 rounded-3xl">
<article class="flex flex-col items-start justify-between text-font_primary">
    
  @if (!empty($model->getFirstMediaUrl('images', config('starterkid.spatie_conversions.medium.name'))))
 <div class="relative w-full">
    <img src="{{$imgSrc}}" alt="{{$imgAlt}}" class="aspect-[2/2] w-full object-cover rounded-t-3xl">
    <div class="px-4 bg-white">  
      <x-starterkid-frontend::image-credits imageCredits="{{$imageCredits}}"/>
      </div>
 </div>
 @else
 <div class="relative w-full p-20">
  <img src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{config('app.name')}}" class="aspect-[2/2] w-full object-contain rounded-t-3xl">
  </div>
 @endif
  

<div class="max-w-xl bg-white p-5 rounded-b-3xl text-font_primary hover:text-font_secondary hover:bg-primary group relative">
      @if(isset($dateTime))
      <div class="mt-8 flex items-center gap-x-4 text-xs">
        <time datetime="{{$dateTime}}">{{$dateTime}}</time>
        <a href="#">{{$author}}</a>
      </div>
      @endif
      <div>
        <h3 class="mt-3 text-lg font-semibold leading-6">
          <a href="{{$linkRoute}}" titel="{{$linkTitle}}">
            <span class="absolute inset-0"></span>
            {{$name}}
          </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6">{!!Str::limit($description,200)!!}</p>
      </div>
      
    </div>
  </article>
</div>