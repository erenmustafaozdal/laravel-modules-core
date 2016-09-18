<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Used Packages for Eren Mustafa Özdal
    |--------------------------------------------------------------------------
    */
    'packages' => [
        'laravel-user-module'       => \ErenMustafaOzdal\LaravelUserModule\LaravelUserModuleServiceProvider::class,
        'laravel-page-module'       => \ErenMustafaOzdal\LaravelPageModule\LaravelPageModuleServiceProvider::class,
        'laravel-document-module'   => \ErenMustafaOzdal\LaravelDocumentModule\LaravelDocumentModuleServiceProvider::class,
        'laravel-description-module'=> \ErenMustafaOzdal\LaravelDescriptionModule\LaravelDescriptionModuleServiceProvider::class,
        'laravel-media-module'      => \ErenMustafaOzdal\LaravelMediaModule\LaravelMediaModuleServiceProvider::class,
        'laravel-dealer-module'     => \ErenMustafaOzdal\LaravelDealerModule\LaravelDealerModuleServiceProvider::class,
        'laravel-product-module'    => \ErenMustafaOzdal\LaravelProductModule\LaravelProductModuleServiceProvider::class,
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

        'options' => [],

    ]

];
