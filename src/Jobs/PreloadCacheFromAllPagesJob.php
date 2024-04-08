<?php

namespace GrassFeria\StarterkidFrontend\Jobs;

use ZipArchive;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PreloadCacheFromAllPagesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;




    public function handle()
    {
        // Cache static pages
        $staticPages = config('starterkid-frontend-preload-cache.static_pages');
        foreach ($staticPages as $routeName) {
            \GrassFeria\StarterkidFrontend\Jobs\PreloadCacheJob::dispatch(route($routeName));
        }

        // Cache model-based pages
        $modelConfigs = config('starterkid-frontend-preload-cache.models');

        foreach ($modelConfigs as $modelConfig) {
            $modelClass = $modelConfig['class'];
            $scopeMethod = $modelConfig['scope'];
            $routeName = $modelConfig['route'];

            $instances = $modelClass::$scopeMethod()->get();

            foreach ($instances as $instance) {
                \GrassFeria\StarterkidFrontend\Jobs\PreloadCacheJob::dispatch(route($routeName, $instance->slug));
            }
        }
    }
}
