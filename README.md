# .env setting
```shell
FRONTEND_CACHE=false
FRONTEND_MINIFY=false
LOGIN_LINK=true
CREATED_BY_URL=https://all-inkl.com
CREATED_BY_ANCHOR=Tierheim CMS
ORGANIZATION_TYPE=Organization
HERO_H1=Ein Verein für
HERO_H1_COLOR=deine Stadt
HERO_DESCRIPTION=Wir engagieren uns für unsere Stadt Saalfeld/Saale. Im Saalfelder Stadtrat, im gesellschaftlichen Leben, bei Projekten, Aktionen und Veranstaltungen.
HERO_BUTTON_PRIMARY_ROUTE=#
HERO_BUTTON_PRIMARY_ANCHOR=More info
HERO_BUTTON_SECONDARY_ROUTE=#
HERO_BUTTON_SECONDARY_ANCHOR=Other info
HERO_IMAGE_CREDITS=http://localhost
HERO_IMAGE_ALT=ProjectName
ORGANIZATION_FACEBOOK_URL=
ORGANIZATION_TWITTER_URL=
ORGANIZATION_INSTAGRAM_URL=
ORGANIZATION_YOUTUBE_URL=
ORGANIZATION_LINKEDIN_URL=
ORGANIZATION_PINTEREST_URL=
ORGANIZATION_GITHUB_URL=
ORGANIZATION_WIKIPEDIA_URL=
HOMEPAGE_TITLE=Ein Verein für deine Stadt
HOMEPAGE_DESCRIPTION=Wir engagieren uns für unsere Stadt Saalfeld/Saale. Im Saalfelder Stadtrat, im gesellschaftlichen Leben, bei Projekten, Aktionen und Veranstaltungen.

CACHE_STORE=file
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
