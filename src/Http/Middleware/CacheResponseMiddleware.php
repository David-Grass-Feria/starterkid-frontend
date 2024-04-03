<?php

namespace GrassFeria\StarterkidFrontend\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CacheResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $cacheKey = \GrassFeria\StarterkidFrontend\Services\GetCacheKey::ForUrl($request->url());

        if (Cache::has($cacheKey)) {
            return response(Cache::get($cacheKey));
        }

        $response = $next($request);

        Cache::forever($cacheKey, $response->getContent());

        return $response;
    }
}
