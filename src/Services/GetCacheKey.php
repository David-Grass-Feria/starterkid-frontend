<?php

namespace GrassFeria\StarterkidFrontend\Services;

class GetCacheKey

{
    public static function forUrl($url)
    {
        return 'response-' . md5($url);
    }
}