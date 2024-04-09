<?php 

namespace App\Services;

class DeleteCacheKeysAfterServiceUpdate

{
    public function deleteCacheKeys()
    {
        //delete more cache keys here after update service pages
        
        //$blogposts = \GrassFeria\StarterkidBlog\Models\BlogPost::frontGetBlogPostWhereStatusIsOnline()->get();
        //foreach ($blogposts as $blogpost) {
        //    $url = route('front.blog-post.show', ['slug' => $blogpost->slug]);
        //    $cacheKey = \GrassFeria\StarterkidFrontend\Services\GetCacheKey::ForUrl($url);
        //    \Illuminate\Support\Facades\Cache::forget($cacheKey);
        //    \GrassFeria\StarterkidFrontend\Jobs\PreloadCacheJob::dispatch($url);
        //}
    }
}