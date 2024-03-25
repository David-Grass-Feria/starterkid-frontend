# .env setting
```shell
LOGIN_LINK=true
CREATED_BY_ON_FOOTER_URL="https://all-inkl.com"
CREATED_BY_ON_FOOTER_ANCHOR="Tierheim CMS"
ORGANIZATION_TYPE="Organization"
HERO_H1="Ein Verein für"
HERO_H1_COLOR="deine Stadt"
HERO_DESCRIPTION="Wir engagieren uns für unsere Stadt Saalfeld/Saale. Im Saalfelder Stadtrat, im gesellschaftlichen Leben, bei Projekten, Aktionen und Veranstaltungen."
HERO_BUTTON_PRIMARY_ROUTE="#"
HERO_BUTTON_PRIMARY_ANCHOR="More info"
HERO_BUTTON_SECONDARY_ROUTE="#"
HERO_BUTTON_SECONDARY_ANCHOR="Other info"
HERO_IMAGE_CREDITS=APP_URL
HERO_IMAGE_ALT=APP_NAME
ORGANIZATION_FACEBOOK_URL=""
ORGANIZATION_TWITTER_URL=""
ORGANIZATION_INSTAGRAM_URL=""
ORGANIZATION_YOUTUBE_URL=""
ORGANIZATION_LINKEDIN_URL=""
ORGANIZATION_PINTEREST_URL=""
ORGANIZATION_GITHUB_URL=""
ORGANIZATION_WIKIPEDIA_URL=""
RESPONSE_CACHE_ENABLED=false
```

# add observer in model
```shell
protected static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
           \Spatie\ResponseCache\Facades\ResponseCache::forget(url('/').'/'.config('starterkid-service.service_slug').'/'.$model->slug);
        });
        static::deleted(function ($model) {
            \Spatie\ResponseCache\Facades\ResponseCache::forget(url('/').'/'.config('starterkid-service.service_slug').'/'.$model->slug);
         });
    }
```



# featrue image left with checkmarks
```shell
@if($loop->iteration % 2 == 0)
        // Gerade
@else
        // Ungerade
@endif
```
# featrue image left with checkmarks
```shell
<x-starterkid-frontend::card-grid-with-slot-item 
               imgSrc="{{$blogpost->getFirstMediaUrl('images', 'medium')}}" 
               imgAlt="{{$blogpost->name}}" 
               imgCredits="{{$blogpost->image_credits}}" 
               heading="{{$blogpost->name}}"
               href="{{route('front.blog-post.show',$blogpost->slug)}}" 
               hrefTitle="{{$blogpost->name}}">
//content here
</x-starterkid-frontend::card-grid-with-slot-item> 
```
