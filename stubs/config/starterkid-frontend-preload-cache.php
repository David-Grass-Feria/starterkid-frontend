<?php

return [
    
    'static_pages' => [
        'front.homepage',
        
    ],
    
    
    'models' => [
        [
            'class' => \GrassFeria\StarterkidBlog\Models\BlogPost::class,
            'scope' => 'frontGetBlogPostWhereStatusIsOnline',
            'route' => 'front.blog-post.show',
        ],
        [
            'class' => \GrassFeria\StarterkidService\Models\Service::class,
            'scope' => 'frontGetServicesWhereStatusIsOnline',
            'route' => 'front.service.show',
        ],
        [
            'class' => \GrassFeria\StarterkidWiki\Models\Wiki::class,
            'scope' => 'frontGetWikisWhereStatusIsOnline',
            'route' => 'front.wiki.show',
        ],
        // Füge hier weitere Model-Konfigurationen hinzu
    ],
];