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
// Ersetze <table> mit <table class="table-auto">
$content = preg_replace('/<table>/', '<table class="ball">', $content);
  
@endphp



    <div class="w-full p-5 xl:p-10 md:max-w-2xl xl:max-w-2xl mx-auto overflow-hidden">
        <div class="mb-5">
     <h1 class="text-2xl font-bold text-gray-900 md:text-4xl xl:text-5xl">{{$heading}}</h1>
     <div class="flex items-center space-x-2 mt-5">
        <span class="text-xs text-gray-600 xl:text-sm">{{now()}}</span>
        <span class="text-xs text-gray-600 xl:text-sm">Oliver Grau</span>
     </div>
     <div class="mt-5">
        <img src="https://www.jimdo.com/de/magazin/wp-content/uploads/2023/10/KeywordResearch_Hero-714x476.jpg" />
     </div>
        </div>
     <div class="prose mt-10">
     {!!$content!!}
     </div>   
    
    </div>
    
    
    </div>