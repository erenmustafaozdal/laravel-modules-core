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
        'laravel-document-module'   => \ErenMustafaOzdal\LaravelDocumentModule\LaravelDocumentModuleServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Modules Options
    |--------------------------------------------------------------------------
    |
    | ## Options
    |
    | - is_responsive                   : data table is responsive or not
    | - datatable_filter                : open or close data table filter
    | - datatable_tools                 : open or close data table exporting tools
    | - datatable_fast_add              : open or close data table fast adding modal support
    | - datatable_group_action          : open or close data table group action support
    | - datatable_detail                : open or close data table show row detail support
    |
    | - show_relation_category_link     : show or not nested categories link on table
    | - show_relation_model_link        : show or not nested models link on table
    |
    | ### nestable_level is : 0 (unlimited), 1 (only root level) or any integer > 1
    | - nestable_level_root             : nestable level on root of model category index
    | - nestable_level_nested           : nestable level on nested category of model category index
    |--------------------------------------------------------------------------
    */
    'options' => [
        // dataTable
        'data_table' => [
            'is_responsive'                 => true,
        ],
        // user module
        'role' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],
        'user' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],

        // page module
        'page_category' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],
        'page' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],

        // document module
        'document_category' => [
            'show_relation_category_link'   => true,
            'show_relation_model_link'      => true,
            'nestable_level_root'           => 0,
            'nestable_level_nested'         => 1
        ]
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
                'icon'              => 'icon-note'
            ],
            // add page
            [
                'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.add',
                'route'             => 'admin.page.create',
                'icon'              => 'icon-note'
            ],
            // add document category
            [
                'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.add',
                'route'             => 'admin.document_category.create',
                'icon'              => 'icon-doc'
            ],
            // add document
            [
                'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.add',
                'route'             => 'admin.document.create',
                'icon'              => 'icon-doc'
            ]
        ],

        // side bar menu
        // trans    => trans key
        // route    => string|array route name -> array = ['route.name',['id'=>1]] etc
        // icon     => icon class -> font awesome, simple line etc.
        // access   => string|array access route name/names
        // active   => string|array active route name or route name prefix
        // child    => array -> child menu
        'side' => [
            // laravel user module
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
                'icon'              => 'icon-note',
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
                'icon'              => 'icon-note',
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
            ], // end of part
            // laravel document module
            [
                'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.root',
                'route'             => 'javascript:;',
                'icon'              => 'icon-doc',
                'access'            => ['admin.document_category.index', 'admin.document_category.create'],
                'active'            => 'admin.document_category',
                'child' => [
                    [
                        'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.all',
                        'route'             => 'admin.document_category.index',
                        'icon'              => 'icon-list',
                        'access'            => 'admin.document_category.index',
                        'active'            => 'admin.document_category.index'
                    ],
                    [
                        'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.add',
                        'route'             => 'admin.document_category.create',
                        'icon'              => 'icon-plus',
                        'access'            => 'admin.document_category.create',
                        'active'            => 'admin.document_category.create'
                    ]
                ] // end of child
            ], // end of part
            [
                'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.root',
                'route'             => 'javascript:;',
                'icon'              => 'icon-doc',
                'access'            => ['admin.document.index', 'admin.document.create'],
                'active'            => 'admin.document.',
                'child' => [
                    [
                        'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.all',
                        'route'             => 'admin.document.index',
                        'icon'              => 'icon-list',
                        'access'            => 'admin.document.index',
                        'active'            => 'admin.document.index'
                    ],
                    [
                        'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.add',
                        'route'             => 'admin.document.create',
                        'icon'              => 'icon-plus',
                        'access'            => 'admin.document.create',
                        'active'            => 'admin.document.create'
                    ]
                ] // end of child
            ], // end of part
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
        'dir' => ['dosyalar'], // create this directory in public dir

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
