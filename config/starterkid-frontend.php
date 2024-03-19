<?php

return [

'login_link'                                    => env('LOGIN_LINK',true),
'created_by_on_footer_url'                      => env('CREATED_BY_ON_FOOTER_URL','https://all-inkl.com'),
'created_by_on_footer_anchor'                   => env('CREATED_BY_ON_FOOTER_ANCHOR','Tierheim CMS'),
'organization_type'                             => env('ORGANIZATION_TYPE','Organization'),
'hero_h1'                                       => env('HERO_H1','Ein Verein für'),
"hero_h1_color"                                 => env('HERO_H1_COLOR','deine Stadt'),
"hero_description"                              => env('HERO_DESCRIPTION','Wir engagieren uns für unsere Stadt Saalfeld/Saale. Im Saalfelder Stadtrat, im gesellschaftlichen Leben, bei Projekten, Aktionen und Veranstaltungen.'),
"hero_button_primary_route"                     => env('HERO_BUTTON_PRIMARY_ROUTE','#'),
"hero_button_primary_anchor"                    => env('HERO_BUTTON_PRIMARY_ANCHOR','More info'),
"hero_button_secondary_route"                   => env('HERO_BUTTON_SECONDARY_ROUTE','#'),
"hero_button_secondary_anchor"                  => env('HERO_BUTTON_SECONDARY_ANCHOR','Other info'),
"hero_image_credits"                            => env('HERO_IMAGE_CREDITS',env('APP_URL')),
"hero_image_alt"                                => env('HERO_IMAGE_ALT',env('APP_NAME')),
];