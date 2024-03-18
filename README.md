# .env setting
```shell
LOGIN_LINK=true
CREATED_BY_ON_FOOTER_URL="https://all-inkl.com"
CREATED_BY_ON_FOOTER_ANCHOR="Tierheim CMS"
ORGANIZATION_TYPE="Organization"
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
