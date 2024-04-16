# .env setting
```shell
FRONTEND_CACHE=false
FRONTEND_MINIFY=false
CREATED_BY_ANCHOR="David Grass Feria"
CREATED_BY_URL="#"
ORGANIZATION_FACEBOOK_URL="https://www.facebook.com/buergerfuersaalfeld/"
ORGANIZATION_INSTAGRAM_URL="https://www.instagram.com/buerger.fuer.saalfeld/"
SERVICE_SLUG="verein"
SERVICE_TITLE="Verein"
#IMAGE_CONVERSIONS_MEDIUM_WIDTH=300
#IMAGE_WIDTH_HEIGHT_ATTRIBUTES_WIDTH=600
#IMAGE_WIDTH_HEIGHT_ATTRIBUTES_HEIGHT=400
FRONTEND_CACHE=true
FRONTEND_MINIFY=true
DEFAULT_FONT_FAMILY="Nunito, sans-serif"
SERP_API_KEY=


```



# add this to tailwind.config.js
```shell
 './vendor/grass-feria/starterkid-frontend/**/*.blade.php',
'./vendor/grass-feria/starterkid-blog/**/*.blade.php',
'./vendor/grass-feria/starterkid-service/**/*.blade.php',
```


# loop left right left right
```shell
@if($loop->iteration % 2 == 0)
        // Gerade
@else
        // Ungerade
@endif
```
# card grid item
```shell
@php
$blogposts = \GrassFeria\StarterkidBlog\Models\BlogPost::frontGetBlogPostWhereStatusIsOnline()->get()->take(3);
@endphp
<div class="xl:mt-60">  
    <x-starterkid-frontend::card-grid>
          
          
          @foreach($blogposts as $blogpost)
          <x-starterkid-frontend::card-grid-blogpost-item :firstLoop="$loop->first"
                   imgSrc="{{$blogpost->getFirstMediaUrl('images', 'medium')}}"
                   imgAlt="{{$blogpost->name}}" 
                   imgCredits="{{$blogpost->image_credits}}" 
                   dateTime="{{$blogpost->getPublished()}}" 
                   author="{{$blogpost->author}}" 
                   heading="{{$blogpost->name}}" 
                   preview="{!!Str::limit($blogpost->preview,200)!!}" 
                   href="{{route('front.blog-post.show',$blogpost->slug)}}"
                   hrefAnchor="Read more" 
                   hrefTitle="{{$blogpost->name}}" />
          @endforeach
          
          
    
           
        </x-starterkid-frontend::card-grid>
      </div>
```
# get events from radioactive.de
```shell
$events = (new \GrassFeria\StarterkidFrontend\Services\Scrape\RegioActiveEvents())->getEventsForCity('saalfeld','07318');
```
f
