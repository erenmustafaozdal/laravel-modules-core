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
            'link'                      => 'Bağlantı Adresi',
            'is_active'                 => 'Bölüm aktifleştirilsin mi?',
            'background_photo'          => 'Arka Plan Fotoğrafı',
        ]
    ],

    // helpers
    'helpers' => [
        'page_management' => [
            'root'          => '<button type="button" class="btn green btn-outline">' .
                '<i class="fa fa-floppy-o"></i>' .
                '<span class="hidden-xs"> Sıralamayı Kaydet </span>' .
                '</button> tuşu ile kayıt işlemi sırasında bölümlerin <span class="label label-info">başlıkları</span>, <span class="label label-info">aktif olup olmadıkları</span> da kaydedilir.',
            'image_banner'  => 'En az <span class="label label-info">2</span>, en fazla <span class="label label-info">12</span> imaj ekleyebilirsin. İmajlara link eklemek zorunlu değildir.',
            'not_options'  => 'Bu bölümün ayarları bulunmamaktadır.',
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
