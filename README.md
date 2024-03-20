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

# homepage blade
```shell
<x-starterkid-frontend::heros.with-image 
h1="{{config('starterkid-frontend.hero_h1')}}" 
h1Color="{{config('starterkid-frontend.hero_h1_color')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" 
buttonSecondaryRoute="{{config('starterkid-frontend.hero_button_secondary_route')}}" 
buttonSecondaryAnchor="{{config('starterkid-frontend.hero_button_secondary_anchor')}}" 
imgSrc="{{Cache::has('logo') ? Cache::get('logo') : asset('/logo.png')}}" 
imgAlt="{{config('starterkid-frontend.hero_image_alt')}}" />
```


```shell
<x-starterkid-frontend::features.feature-with-image-left 
heading="{{config('starterkid-frontend.hero_h1')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
imgSrc="https://tierschutzverein-muenchen.de/img/containers/assets/v1/startseite/shop-startseite-finish.jpg/8afa9ab3541f90875830f0d7814585b0.jpg" 
imgAlt="{{config('starterkid-frontend.hero_image_alt')}}"
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" /> 
```

```shell
<x-starterkid-frontend::features.feature-with-image-right 
heading="{{config('starterkid-frontend.hero_h1')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
imgSrc="https://tierschutzverein-muenchen.de/img/containers/assets/v1/startseite/shop-startseite-finish.jpg/8afa9ab3541f90875830f0d7814585b0.jpg" 
imgAlt="{{config('starterkid-frontend.hero_image_alt')}}"
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" /> 
```
