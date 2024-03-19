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

@php
    
    // get all image links
    $imageLinks = [];
    preg_match_all('/<img.*?src="(.*?)"/', $content, $matches);
    if (!empty($matches[1])) {
        $imageLinks = $matches[1];
    }
    
    // add conversions to the image path
    $updatedLinks = [];
    foreach ($imageLinks as $link) {
        $updatedLinks[] = preg_replace_callback(
            '/(ckimages\/\d+)/',
            function ($matches) {
                return $matches[1] . '/conversions';
            },
            $link
        );
    }
    
    // add -large to the image link before the file extension
    foreach ($updatedLinks as $large) {
    $largeLinks[] = preg_replace_callback(
        '/(ckimages\/\d+\/conversions\/.*?)(\.\w+)$/',
        function ($matches) {
            return $matches[1] . '-large' . $matches[2];
        },
        $large
    );
}

// save in the content
foreach ($imageLinks as $index => $originalLink) {
    $content = str_replace($originalLink, $largeLinks[$index], $content);
}

// replace all .jpeg in .jpg
$content = str_replace('.jpeg', '.jpg', $content);

// remove all width and height from the image links
$content = preg_replace('/<img(.*?)src="(.*?)"(.*?)width=".*?"(.*?)height=".*?"(.*?)>/i', '<img$1src="$2"$3$4$5>', $content);
$content = preg_replace('/<img(.*?)width=".*?"(.*?)height=".*?"(.*?)src="(.*?)"(.*?)>/i', '<img$1$2$3src="$4"$5>', $content);
$content = preg_replace('/<img(.*?)height=".*?"(.*?)width=".*?"(.*?)src="(.*?)"(.*?)>/i', '<img$1$2$3src="$4"$5>', $content);

@endphp

    <div class="grid grid-cols-12 gap-5">

<div class="col-span-12 xl:col-span-3">
   
         
         <x-starterkid-frontend::heading-item-wrapper>
               
         
         @if(isset($h2WithId))
         <x-starterkid-frontend::heading-item routeLink="#" routeTitle="{{ $heading }}" name="{{ $heading }}"/>   
            @foreach($h2WithId as $h2)
            @if($loop->last)
            <x-starterkid-frontend::heading-item-last routeLink="#{{ Str::slug($h2) }}" routeTitle="{!! $h2 !!}" name="{!! $h2 !!}"/>
            @else
            <x-starterkid-frontend::heading-item routeLink="#{{ Str::slug($h2) }}" routeTitle="{!! $h2 !!}" name="{!! $h2 !!}"/>
            @endif
          @endforeach
        @endif
         
        </x-starterkid-frontend::heading-item-wrapper>
         
    
          
</div>



     <div class="col-span-12 xl:col-span-9 w-full xl:max-w-xl">   
    <div class="w-full overflow-hidden">
        <div class="mb-5">
     <h1 class="text-2xl font-bold settingFontColor md:text-4xl xl:text-5xl">{{$heading}}</h1>
     @if(isset($dateTime))
     <div class="flex items-center space-x-2 mt-5">
        <span class="text-xs settingFontColor xl:text-sm">{{$dateTime}}</span>
        <span class="text-xs settingFontColor xl:text-sm">{{$author}}</span>
     </div>
     @endif
     @if(isset($imgSrc))
     @if($imgSrc)
     <div class="mt-5">
        <img src="{{$imgSrc}}" alt="{{$imgAlt}}" />
        <span class="text-xs settingFontColor">{{$imageCredits ?? url('/')}}</span>
     </div>
     @endif
     @endif
        </div>
     <div class="prose mt-10 overflow-hidden">
     {!!$content!!}
     </div>   
    
    </div>
</div>
    
    </div>

