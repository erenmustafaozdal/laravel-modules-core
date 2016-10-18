<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Company Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the companys, naming is made with each routes' name
    'page_management' => [
        'home'                      => 'Ana Sayfa Yönetimi',
        'home_description'          => 'Ana Sayfa\'yı yönet',
    ],

    // menu
    'menu' => [
        'page_management' => [
            'root'                      => 'Sayfa Yönetimleri',
            'home'                      => 'Ana Sayfa Yönetimi',
        ],
    ],

    // fields
    'fields' => [
        'page_management' => [
            'enable_sortable'           => 'Sıralamayı Aç',
            'disable_sortable'          => 'Sıralamayı Kapat',
            'save_sortable'             => 'Sıralamayı Kaydet',
            'section_title'             => 'Bölüm Başlığı',
            'auto_play'                 => 'Slider otomatik oynatılsın mı?',
            'item_type'                 => 'Veriler nereden alınsın?',
            'items_type'                => 'Hangi veriler alınsın?',
        ]
    ],

    // helpers
    'helpers' => [
        'page_management' => [

        ]
    ],

    // permissions
    'permission' => [
        'PageManagementController' => [
            'icon'                          => 'fa fa-files-o',
            'title'                         => 'Sayfa Yönetimi İşlemleri',
            // routes
            'page_management_home'          => 'Ana Sayfa Yönetimi',
            'page_management_home_desc'     => 'Bu izne sahip olanlar ana sayfayı yönetme sayfasına gidebilir',
        ]
    ]
];
