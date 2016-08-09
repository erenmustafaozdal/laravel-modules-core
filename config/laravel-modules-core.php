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
    | Routes on / off
    | if you don't use any route; set false
    |--------------------------------------------------------------------------
    */
    'routes' => [
        'admin' => [
            'page_category'             => true,                // admin page category resource route
            'page'                      => true,                // admin page resource route
            'page_publish'              => true,                // admin page publish get route
            'page_notPublish'           => true,                // admin page not publish get route
            'category_pages'            => true,                // admin category pages resource route
            'category_pages_publish'    => true,                // admin category pages publish get route
            'category_pages_notPublish' => true                 // admin category pages not publish get route
        ],
        'api' => [
            'page_category'             => true,                // api page category resource route
            'page_category_models'      => true,                // api page category model post route
            'page_category_group'       => true,                // api page category group post route
            'page_category_detail'      => true,                // api page category detail get route
            'page_category_fastEdit'    => true,                // api page category fast edit post route
            'page'                      => true,                // api page resource route
            'page_group'                => true,                // api page group post route
            'page_detail'               => true,                // api page detail get route
            'page_fastEdit'             => true,                // api page fast edit post route
            'page_publish'              => true,                // api page publish get route
            'page_notPublish'           => true,                // api page not publish get route
            'page_contentUpdate'        => true,                // api page content update post route
            'category_pages_index'      => true,                // api category pages index get route
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | View config
    |--------------------------------------------------------------------------
    */
    'views' => [
        // all layouts default values
        'html_lang'                 => 'tr',
        'html_head' => [
            'content_type'          => 'text/html; charset=UTF-8',
            'charset'               => 'utf-8',
            'default_title'         => 'Laravel Modules',   // default page title of all pages
            'meta_description'      => 'Laravel Modules packages',
            'meta_author'           => 'Eren Mustafa ÖZDAL',
            'meta_keywords'         => 'laravel,modules,packages',
            'meta_robots'           => 'noindex,nofollow',
            'meta_googlebot'        => 'noindex,nofollow'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Used Packages for Eren Mustafa Özdal
    |--------------------------------------------------------------------------
    */
    'packages' => [
        'laravel-user-module'       => \ErenMustafaOzdal\LaravelUserModule\LaravelUserModuleServiceProvider::class,
        'laravel-page-module'       => \ErenMustafaOzdal\LaravelPageModule\LaravelPageModuleServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Menus [Action,Side]
    |--------------------------------------------------------------------------
    */
    'menus' => [
        // action menu on the top header
        // trans    => trans key
        // route    => string|array route name
        // icon     => icon class -> font awesome, simple line etc.
        'action' => [
            // add user
            [
                'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.add',
                'route'             => 'admin.user.create',
                'icon'              => 'icon-user-follow'
            ],
            // add role
            [
                'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.add',
                'route'             => 'admin.role.create',
                'icon'              => 'icon-users'
            ],
            // add page category
            [
                'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.add',
                'route'             => 'admin.page_category.create',
                'icon'              => 'icon-doc'
            ],
            // add page
            [
                'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.add',
                'route'             => 'admin.page.create',
                'icon'              => 'icon-doc'
            ]
        ],

        // side bar menu
        // trans    => trans key
        // route    => string|array route name -> array = ['route.name',['id'=>1]] etc
        // icon     => icon class -> font awesome, simple line etc.
        // access   => string|array access route name/names
        // active   => active route name or route name prefixe
        // child    => array -> child menu
        'side' => [
            // laravel user module
            [
                'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.root',
                'route'             => ['admin.page_category.page.show', 'id'=>22,'pages'=>40],
                'icon'              => 'icon-user',
                'access'            => ['admin.user.index', 'admin.user.create'],
                'active'            => ['admin.page_category.page.show', ['id'=>22,'pages'=>40]],
            ],
            [
                'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.root',
                'route'             => ['admin.page_category.page.show', 'id'=>22,'pages'=>38],
                'icon'              => 'icon-user',
                'access'            => ['admin.user.index', 'admin.user.create'],
                'active'            => ['admin.page_category.page.show', ['id'=>22,'pages'=>38]],
            ],
            [
                'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.root',
                'route'             => 'javascript:;',
                'icon'              => 'icon-user',
                'access'            => ['admin.user.index', 'admin.user.create'],
                'active'            => 'admin.user',
                'child' => [
                    [
                        'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.all',
                        'route'             => 'admin.user.index',
                        'icon'              => 'icon-list',
                        'access'            => 'admin.user.index',
                        'active'            => 'admin.user.index'
                    ],
                    [
                        'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.add',
                        'route'             => 'admin.user.create',
                        'icon'              => 'icon-plus',
                        'access'            => 'admin.user.create',
                        'active'            => 'admin.user.create'
                    ]
                ] // end of child
            ], // end of part
            [
                'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.root',
                'route'             => 'javascript:;',
                'icon'              => 'icon-users',
                'access'            => ['admin.role.index', 'admin.role.create'],
                'active'            => 'admin.role',
                'child' => [
                    [
                        'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.all',
                        'route'             => 'admin.role.index',
                        'icon'              => 'icon-list',
                        'access'            => 'admin.role.index',
                        'active'            => 'admin.role.index'
                    ],
                    [
                        'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.add',
                        'route'             => 'admin.role.create',
                        'icon'              => 'icon-plus',
                        'access'            => 'admin.role.create',
                        'active'            => 'admin.role.create'
                    ]
                ] // end of child
            ], // end of part
            // laravel page module
            [
                'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.root',
                'route'             => 'javascript:;',
                'icon'              => 'icon-doc',
                'access'            => ['admin.page_category.index', 'admin.page_category.create'],
                'active'            => 'admin.page_category',
                'child' => [
                    [
                        'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.all',
                        'route'             => 'admin.page_category.index',
                        'icon'              => 'icon-list',
                        'access'            => 'admin.page_category.index',
                        'active'            => 'admin.page_category.index'
                    ],
                    [
                        'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.add',
                        'route'             => 'admin.page_category.create',
                        'icon'              => 'icon-plus',
                        'access'            => 'admin.page_category.create',
                        'active'            => 'admin.page_category.create'
                    ]
                ] // end of child
            ], // end of part
            [
                'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.root',
                'route'             => 'javascript:;',
                'icon'              => 'icon-doc',
                'access'            => ['admin.page.index', 'admin.page.create'],
                'active'            => 'admin.page.',
                'child' => [
                    [
                        'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.all',
                        'route'             => 'admin.page.index',
                        'icon'              => 'icon-list',
                        'access'            => 'admin.page.index',
                        'active'            => 'admin.page.index'
                    ],
                    [
                        'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.add',
                        'route'             => 'admin.page.create',
                        'icon'              => 'icon-plus',
                        'access'            => 'admin.page.create',
                        'active'            => 'admin.page.create'
                    ]
                ] // end of child
            ] // end of part
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
