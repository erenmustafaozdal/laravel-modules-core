<?php

return [
    /*
    |--------------------------------------------------------------------------
    | General config
    |--------------------------------------------------------------------------
    */
    'app_name'                      => 'Laravel Modules',
    'copyright_year'                => '2016',
    'logos' => [
        'default'                   => 'vendor/laravel-modules-core/assets/global/img/logo-light.png',
        'light'                     => 'vendor/laravel-modules-core/assets/global/img/logo-dark.png',
        'green'                     => 'vendor/laravel-modules-core/assets/global/img/logo-light.png',
    ],
    'custom_css'                    => '',

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
    | Modules Options
    |--------------------------------------------------------------------------
    |
    | ## Options
    |
    | --- data_table                    : data table options for all models
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
        ],
        'document' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],

        // description module
        'description_category' => [
            'show_relation_category_link'   => true,
            'show_relation_model_link'      => true,
            'nestable_level_root'           => 0,
            'nestable_level_nested'         => 1
        ],
        'description' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],

        // media module
        'media_category' => [
            'show_relation_category_link'   => true,
            'show_relation_model_link'      => true,
            'nestable_level_root'           => 0,
            'nestable_level_nested'         => 1
        ],
        'media' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],

        // dealer module
        'dealer_category' => [
            'show_relation_category_link'   => true,
            'show_relation_model_link'      => true,
            'nestable_level_root'           => 0,
            'nestable_level_nested'         => 1
        ],
        'dealer' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],

        // product module
        'product_category' => [
            'nestable_level_root'           => 0,
        ],
        'product_brand' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],
        'product_showcase' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],
        'product' => [
            'datatable_filter'              => true,
            'datatable_tools'               => true,
            'datatable_fast_add'            => true,
            'datatable_group_action'        => true,
            'datatable_detail'              => true
        ],
    ],



    /*
    |--------------------------------------------------------------------------
    | Elfinder Configs
    |--------------------------------------------------------------------------
    */
    'elfinder' => [
        /*
        |--------------------------------------------------------------------------
        | Routes group config
        |--------------------------------------------------------------------------
        |
        | The default group settings for the elFinder routes.
        |
        */

        'route' => [
            'middleware' => ['auth','permission'], //Set to null to disable middleware filter
        ],

        /*
        |--------------------------------------------------------------------------
        | Root Options
        |--------------------------------------------------------------------------
        |
        | These options are merged, together with every root by default.
        | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1#root-options
        |
        */
        'root_options' => [
            'uploadAllow'   => [
                'image/gif',
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'application/msword',
                'application/vnd.ms-word.document.macroenabled.12',
                'application/vnd.ms-word.template.macroenabled.12',
                'application/pdf',
                'application/vnd.ms-excel',
                'application/vnd.ms-excel.addin.macroenabled.12',
                'application/vnd.ms-excel.sheet.binary.macroenabled.12',
                'application/vnd.ms-excel.sheet.macroenabled.12',
                'application/vnd.ms-excel.template.macroenabled.12',
                'application/vnd.ms-officetheme',
                'application/vnd.ms-powerpoint',
                'application/vnd.ms-powerpoint.addin.macroenabled.12',
                'application/vnd.ms-powerpoint.presentation.macroenabled.12',
                'application/vnd.ms-powerpoint.slide.macroenabled.12',
                'application/vnd.ms-powerpoint.slideshow.macroenabled.12',
                'application/vnd.ms-powerpoint.template.macroenabled.12',
                'application/vnd.ms-project',
                'image/vnd.adobe.photoshop',
                'text/css',
                'text/csv',
                'text/html',
                'text/plain',
                'application/json',
                'application/vnd.oasis.opendocument.chart',
                'application/vnd.oasis.opendocument.chart-template',
                'application/vnd.oasis.opendocument.database',
                'application/vnd.oasis.opendocument.formula',
                'application/vnd.oasis.opendocument.formula-template',
                'application/vnd.oasis.opendocument.graphics',
                'application/vnd.oasis.opendocument.graphics-template',
                'application/vnd.oasis.opendocument.image',
                'application/vnd.oasis.opendocument.image-template',
                'application/vnd.oasis.opendocument.presentation',
                'application/vnd.oasis.opendocument.presentation-template',
                'application/vnd.oasis.opendocument.spreadsheet',
                'application/vnd.oasis.opendocument.spreadsheet-template',
                'application/vnd.oasis.opendocument.text',
                'application/vnd.oasis.opendocument.text-master',
                'application/vnd.oasis.opendocument.text-template',
                'application/vnd.oasis.opendocument.text-web'
            ],
            'uploadDeny'    => ['all'],
            'uploadMaxSize' => '5M',
        ],
    ]

];
