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
    */
    'views' => [
        // all layouts default values
        'html_lang'                     => 'tr',
        'html_head' => [
            'content_type'              => 'text/html; charset=UTF-8',
            'charset'                   => 'utf-8',
            'default_title'             => 'Laravel Modules',   // default page title of all pages
            'meta_description'          => 'Laravel Modules packages',
            'meta_author'               => 'Eren Mustafa ÖZDAL',
            'meta_keywords'             => 'laravel,modules,packages',
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
        'laravel-user-module'           => \ErenMustafaOzdal\LaravelUserModule\LaravelUserModuleServiceProvider::class,
        'laravel-page-module'           => \ErenMustafaOzdal\LaravelPageModule\LaravelPageModuleServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Menus [Action,Side]
    |--------------------------------------------------------------------------
    */
    'menus' => [
        // action menu on the top header
        // title    => trans key
        // route    => route name
        // icon     => icon class -> font awesome, simple line etc.
        'action' => [
            // add user
            [
                'trans'                     => 'laravel-modules-core::laravel-user-module/admin.menu.user.add',
                'route'                     => 'admin.user.create',
                'icon'                      => 'icon-user-follow'
            ],
            // add role
            [
                'trans'                     => 'laravel-modules-core::laravel-user-module/admin.menu.role.add',
                'route'                     => 'admin.role.create',
                'icon'                      => 'icon-users'
            ],
            // add page category
            [
                'trans'                     => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.add',
                'route'                     => 'admin.page_category.create',
                'icon'                      => 'icon-doc'
            ],
            // add page
            [
                'trans'                     => 'laravel-modules-core::laravel-page-module/admin.menu.page.add',
                'route'                     => 'admin.page.create',
                'icon'                      => 'icon-doc'
            ]
        ]
    ],



    /*
    |--------------------------------------------------------------------------
    | Elfinder Configs
    |--------------------------------------------------------------------------
    */
    'elfinder' => [
        /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */
        'dir' => ['files'], // create this directory in public dir

        /*
        |--------------------------------------------------------------------------
        | Filesystem disks (Flysytem)
        |--------------------------------------------------------------------------
        |
        | Define an array of Filesystem disks, which use Flysystem.
        | You can set extra options, example:
        |
        | 'my-disk' => [
        |        'URL' => url('to/disk'),
        |        'alias' => 'Local storage',
        |    ]
        */
        'disks' => [

        ],

        /*
        |--------------------------------------------------------------------------
        | Routes group config
        |--------------------------------------------------------------------------
        |
        | The default group settings for the elFinder routes.
        |
        */

        'route' => [
            'prefix' => 'elfinder',
            'middleware' => ['auth','permission'], //Set to null to disable middleware filter
        ],

        /*
        |--------------------------------------------------------------------------
        | Access filter
        |--------------------------------------------------------------------------
        |
        | Filter callback to check the files
        |
        */

        'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

        /*
        |--------------------------------------------------------------------------
        | Roots
        |--------------------------------------------------------------------------
        |
        | By default, the roots file is LocalFileSystem, with the above public dir.
        | If you want custom options, you can set your own roots below.
        |
        */

        'roots' => null,

        /*
        |--------------------------------------------------------------------------
        | Options
        |--------------------------------------------------------------------------
        |
        | These options are merged, together with 'roots' and passed to the Connector.
        | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
        |
        */

        'options' => array(),

        /*
        |--------------------------------------------------------------------------
        | Root Options
        |--------------------------------------------------------------------------
        |
        | These options are merged, together with every root by default.
        | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1#root-options
        |
        */
        'root_options' => array(
            'uploadAllow'   => ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'],
            'uploadDeny'    => ['all'],
            'uploadMaxSize' => '5M',
        ),
    ]

];
