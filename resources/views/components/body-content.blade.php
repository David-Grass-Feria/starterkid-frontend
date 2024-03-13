<div>

@php
 //replace youtube videos
   $content = preg_replace_callback(
       '/<oembed url="https:\/\/www\.youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)(?:&[^"]+)?"><\/oembed>/',
       function ($matches) {
           $videoId = $matches[1];
           return '<div><iframe class="aspect-video h-full w-full" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
       },
       $content
   );
 @endphp

@php
// Ersetze Vimeo-Videos
$content = preg_replace_callback(
    '/<oembed url="https:\/\/vimeo\.com\/([a-zA-Z0-9_-]+)"><\/oembed>/',
    function ($matches) {
        $videoId = $matches[1];
        return '<div><iframe class="aspect-video h-full w-full" loading="lazy" src="https://player.vimeo.com/video/' . $videoId . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>';
    },
    $content
);
@endphp



@php
// H2 Überschriften bearbeiten und ID hinzufügen
$content = preg_replace_callback(
    '/<h2(.*?)>(.*?)<\/h2>/',
    function ($matches) use (&$h2WithId) {
        $id = Str::slug($matches[2]);
        $h2WithId[] = $matches[2];
        return "<h2 id=\"{$id}\"{$matches[1]}>{$matches[2]}</h2>";
    },
    $content
);
@endphp

    <div class="grid grid-cols-12 gap-5">

<div class="col-span-12 xl:col-span-3">
   
         
         <x-starterkid-frontend::heading-item-wrapper>
               
         
         @if(isset($h2WithId))
         <x-starterkid-frontend::heading-item routeLink="#" routeTitle="{{ $heading }}" name="{{ $heading }}"/>   
            @foreach($h2WithId as $h2)
            @if($loop->last)
            <x-starterkid-frontend::heading-item-last routeLink="#{{ Str::slug($h2) }}" routeTitle="{{ $h2 }}" name="{{ $h2 }}"/>
            @else
            <x-starterkid-frontend::heading-item routeLink="#{{ Str::slug($h2) }}" routeTitle="{{ $h2 }}" name="{{ $h2 }}"/>
            @endif
          @endforeach
        @endif
         
        </x-starterkid-frontend::heading-item-wrapper>
         
    
          
</div>



     <div class="col-span-12 xl:col-span-9">   
    <div class="w-full overflow-hidden">
        <div class="mb-5">
     <h1 class="text-2xl font-bold text-gray-900 md:text-4xl xl:text-5xl">{{$heading}}</h1>
     @if(isset($dateTime))
     <div class="flex items-center space-x-2 mt-5">
        <span class="text-xs text-gray-600 xl:text-sm">{{$dateTime}}</span>
        <span class="text-xs text-gray-600 xl:text-sm">{{$author}}</span>
     </div>
     @endif
     @if(isset($imgSrc))
     <div class="mt-5">
        <img src="{{$imgSrc}}" alt="{{$imgAlt}}" />
     </div>
     @endif
        </div>
     <div class="prose mt-10">
     {!!$content!!}
     </div>   
    
    </div>
</div>
    
    </div>

