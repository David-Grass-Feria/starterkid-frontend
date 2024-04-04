<div class="w-full xl:max-w-7xl mx-auto">

@php
 //replace youtube videos
   $content = preg_replace_callback(
       '/<oembed url="https:\/\/www\.youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)(?:&[^"]+)?"><\/oembed>/',
       function ($matches) {
           $videoId = $matches[1];
           return '<div><iframe class="aspect-video h-full w-full" width="900" height="506" loading="lazy" src="https://www.youtube-nocookie.com/embed/' . $videoId . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
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
        return '<div><iframe class="aspect-video h-full w-full" loading="lazy" width="900" height="506" src="https://player.vimeo.com/video/' . $videoId . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>';
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
        return "<h2 class=\"anchored\" id=\"{$id}\"{$matches[1]}>{$matches[2]}</h2>";
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

    // replace all images with webp
    $webpLinks = [];
foreach ($largeLinks as $link) {
    $webpLinks[] = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $link);
}

}

// save in the content
foreach ($imageLinks as $index => $originalLink) {
    $content = str_replace($originalLink, $webpLinks[$index], $content);
}

// replace all .jpeg in .jpg
$content = str_replace('.jpeg', '.jpg', $content);

// change all width and height from the image links
$content = preg_replace_callback(
    '/<img(.*?)src="(.*?)"(.*?)(width=".*?")(.*?)(height=".*?")(.*?)>/i',
    function ($matches) {
        $widthAttribute = config('starterkid.image_width_height_attributes.large.width');
        $width = "width=\"{$widthAttribute}\"";
        
        $aspectRatio = 16 / 9;
        $heightValue = round(900 / $aspectRatio);
        $height = "height=\"{$heightValue}\"";
        
       
        
        return "<img$matches[1] src=\"$matches[2]\"$matches[3] $width $matches[5] $height>";
    },
    $content
);

$content = preg_replace_callback(
    '/<img(.*?)(width=".*?")(.*?)(height=".*?")(.*?)src="(.*?)"(.*?)>/i',
    function ($matches) {
        $widthAttribute = config('starterkid.image_width_height_attributes.large.width');
        $width = "width=\"{$widthAttribute}\"";
        
        $aspectRatio = 16 / 9;
        $heightValue = round(900 / $aspectRatio);
        $height = "height=\"{$heightValue}\"";
        
        
        
        return "<img$matches[1] $width $matches[3] $height $matches[5] src=\"$matches[6]\">";
    },
    $content
);





@endphp






    <div class="grid grid-cols-12 gap-5 xl:gap-40 mt-2 xl:mt-20">

<div class="col-span-12 mx-auto xl:col-span-3">
   
         
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
     <h1 class="text-2xl font-bold text-font_primary md:text-4xl xl:text-5xl">{{$heading}}</h1>
     @if(isset($dateTime))
     <div class="flex items-center space-x-2 mt-5">
        <span class="text-xs text-font_primary xl:text-sm">{{$dateTime}}</span>
        <span class="text-xs text-font_primary xl:text-sm">{{$author}}</span>
     </div>
     @endif
     @if(isset($imgSrc))
     @if($imgSrc)
     <div class="relative mt-5">
        <picture>
            <source media="(max-width: 480px)" srcset="{{$imgSrcMedium}}">
            <source media="(min-width: 600px)" srcset="{{$imgSrc}}">
            <img src="{{$imgSrc}}" alt="{{$imgAlt}}" width="{{config('starterkid.image_width_height_attributes.large.width')}}" height="{{config('starterkid.image_width_height_attributes.large.height')}}" class="w-full xl:max-w-[600px]">

          </picture>
     <x-starterkid-frontend::image-credits imageCredits="{{$imageCredits}}"/>
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




</div>

@push('styles')

<link rel="preload" href="{{$imgSrcMedium}}" as="image">
@endpush