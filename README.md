# .env setting
```shell
LOGIN_LINK=true
CREATED_BY_ON_FOOTER_URL="https://all-inkl.com"
CREATED_BY_ON_FOOTER_ANCHOR="Tierheim CMS"
ORGANIZATION_TYPE="Organization"
RESPONSE_CACHE_ENABLED=true
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
<x-starterkid-frontend::heros.simple 
h1="{{config('starterkid-frontend.hero_h1')}}" 
h1Color="{{config('starterkid-frontend.hero_h1_color')}}" 
description="{{config('starterkid-frontend.hero_description')}}" 
buttonPrimaryRoute="{{config('starterkid-frontend.hero_button_primary_route')}}" 
buttonPrimaryAnchor="{{config('starterkid-frontend.hero_button_primary_anchor')}}" 
buttonSecondaryRoute="{{config('starterkid-frontend.hero_button_secondary_route')}}" 
buttonSecondaryAnchor="{{config('starterkid-frontend.hero_button_secondary_anchor')}}" /> 
```
