<div class="relative flex items-center space-x-3 h-48 rounded-3xl border border-gray-400 bg-white text-font_primary hover:bg-primary hover:text-white">
      <div class="flex-shrink-0">
        <img class="h-24 w-24 object-contain rounded-3xl p-3" src="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" alt="{{$imgAlt}}">
      </div>
      <div class="min-w-0 flex-1">
        <a href="{{$linkRoute}}" title="{{$linkTitle}}" class="focus:outline-none">
          <span class="absolute inset-0" aria-hidden="true"></span>
          <p class="text-lg font-bold">{{Str::limit($name,100)}}</p>
          <p class="text-sm">{!!Str::limit($description,150)!!}</p>
        </a>
      </div>
    </div>
  

 
  