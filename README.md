# .env setting
```shell
'login_link'                     => env('LOGIN_LINK',true),
'created_by_on_footer_url'       => env('CREATED_BY_ON_FOOTER_URL','https://all-inkl.com'),
'created_by_on_footer_anchor'    => env('CREATED_BY_ON_FOOTER_ANCHOR','Tierheim CMS'),
'organization_type'              => env('ORGANIZATION_TYPE','Organization'),
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
