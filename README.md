# install composer require spatie/laravel-responsecache
```shell
composer require spatie/laravel-responsecache
```

# add middleware in kernel
```shell
'cache'    => \Spatie\ResponseCache\Middlewares\CacheResponse::class,
```

# add middleware your route
```shell
->middleware('cache');
```

# add observer in model
```shell
protected static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
           \Spatie\ResponseCache\Facades\ResponseCache::forget(url('/').'/'.config('starterkid-frontend.service_slug').'/'.$model->slug);
        });
        static::deleted(function ($model) {
            \Spatie\ResponseCache\Facades\ResponseCache::forget(url('/').'/'.config('starterkid-frontend.service_slug').'/'.$model->slug);
         });
    }
```
