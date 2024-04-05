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
        if(!config('starterkid-frontend.frontend_cache')){
            return $next($request);
        }

        if(request('page')){
            return $next($request);
        }
        
        $cacheKey = \GrassFeria\StarterkidFrontend\Services\GetCacheKey::ForUrl($request->url());

        if (Cache::has($cacheKey)) {
            return response(Cache::get($cacheKey));
        }

        $response = $next($request);
        $htmlContent = $response->getContent();

        // Pseudo-Code zum Parsen des HTML-Inhalts und Hinzufügen der Versionsnummer
        $document = new \DOMDocument();
        @$document->loadHTML($htmlContent);
        $images = $document->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // Generiere eine Versionsnummer, z.B. basierend auf dem aktuellen Timestamp
            $version = time(); // Beispiel, besser wäre eine spezifische Logik, die sich bei jedem Cache-Reset ändert
            $newSrc = $src . '?version=' . $version;
            $img->setAttribute('src', $newSrc);
        }

        $htmlContent = $document->saveHTML();
        Cache::forever($cacheKey, $htmlContent);

        return response($htmlContent);
    }
}
