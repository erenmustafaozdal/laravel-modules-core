<?php

return [
    /*
    |--------------------------------------------------------------------------
    | General config
    |--------------------------------------------------------------------------
    */
    'app_name'                      => 'Laravel Modules',       // on some places
    'copyright_year'                => '2016',

    /*
    |--------------------------------------------------------------------------
    | View config
    |--------------------------------------------------------------------------
    | dot notation of blade view path, its position on the /resources/views directory
    */
    'views' => [
        // all layouts default values
        'html_lang'                     => 'tr',
        'html_head' => [
            'content_type'              => 'text/html; charset=UTF-8',
            'charset'                   => 'utf-8',
            'default_title'             => 'Laravel User Module',   // default page title of all pages
            'meta_description'          => 'Laravel User Module package',
            'meta_author'               => 'Eren Mustafa ÖZDAL',
            'meta_keywords'             => 'laravel,user,module,package',
            'meta_robots'               => 'noindex,nofollow',
            'meta_googlebot'            => 'noindex,nofollow'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Used Packages for Eren Mustafa Özdal
    |--------------------------------------------------------------------------
    */
    'packages' => [
        'laravel-user-module'           => \ErenMustafaOzdal\LaravelUserModule\LaravelUserModuleServiceProvider::class
    ]

];
