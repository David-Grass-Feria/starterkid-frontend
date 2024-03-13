<article class="flex flex-col items-start justify-between p-5 rounded-md border settingFontColor shadow-md bg-white">
    @if(isset($imgSrc))
    <div class="relative w-full">
      <img src="{{$imgSrc}}" alt="{{$imgAlt}}" class="aspect-[16/9] w-full rounded-md bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
      <div class="absolute inset-0 rounded-md ring-1 ring-inset ring-gray-900/10"></div>
    </div>
    @endif
    <div class="max-w-xl">
      @if(isset($dateTime))
      <div class="mt-8 flex items-center gap-x-4 text-xs">
        <time datetime="{{$dateTime}}">{{$dateTime}}</time>
        <a href="#">{{$author}}</a>
      </div>
      @endif
      <div class="group relative">
        <h3 class="mt-3 text-lg font-semibold leading-6">
          <a href="{{$linkRoute}}" titel="{{$linkTitle}}">
            <span class="absolute inset-0"></span>
            {{$name}}
          </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6">{!!Str::limit($description,200)!!}</p>
      </div>
      <div class="relative mt-8 flex items-center gap-x-4">
        <a href="{{$linkRoute}}" titel="{{$linkTitle}}">
       <x-starterkid::starterkid.button-primary>{{$buttonText}}</x-starterkid::starterkid.button-primary>
        </a>
      </div>
    </div>
  </article>