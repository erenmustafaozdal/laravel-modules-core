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
        'company'                   => 'Firma Profili Yönetimi',
        'company_description'       => 'Firma Profili\'ni yönet',
    ],
    'design_management' => [
        'logo'                      => 'Logo-Favicon Yönetimi',
        'logo_description'          => 'Logo ve favicon düzenle',
    ],
    'frontend' => [
        'home'                      => 'Ana Sayfa',
        'company'                   => 'Firma Profili'
    ],

    // menu
    'menu' => [
        'page_management' => [
            'root'                  => 'Sayfa Yönetimleri',
            'home'                  => 'Ana Sayfa Yönetimi',
            'enterprise' => [
                'root'              => 'Kurumsal',
                'company'           => 'Firma Profili',
            ]
        ],
        'design_management' => [
            'root'                  => 'Tasarım Yönetimi',
            'logo'                  => 'Logo-Favicon Ayarları',
        ]
    ],

    // fields
    'fields' => [
        'page_management' => [
            'enable_sortable'       => 'Sıralamayı Aç',
            'disable_sortable'      => 'Sıralamayı Kapat',
            'save_sortable'         => 'Sıralamayı Kaydet',
            'auto_play'             => 'Slider otomatik oynatılsın mı?',
            'is_revert'             => 'Ürün imajı dönme efekti aktif olsun mu?',
            'order_type'            => 'Veriler nasıl sıralansın?',
            'item_type'             => 'Veriler nereden alınsın?',
            'items_type'            => 'Hangi veriler alınsın?',
            'link'                  => 'Bağlantı Adresi',
            'title'                 => 'Bölüm Başlığı',
            'is_active'             => 'Bölüm aktifleştirilsin mi?',
            'background_photo'      => 'Arka Plan Fotoğrafı',
            'ad_big_image'          => 'Reklam Banner Büyük Fotoğraf',
            'ad_small_image'        => 'Reklam Banner Küçük Fotoğraf',
            'item_visible'          => 'Neler görünsün?'
        ],
        'design_management' => [
            'current_logo'          => 'Geçerli Logo',
            'logo'                  => 'Logo',
            'current_favicon'       => 'Geçerli Favicon',
            'favicon'               => 'Favicon',
        ],
        'frontend' => [
            'language'              => 'Dil',
            'menu'                  => 'Menü',
            'phone'                 => 'Telefon',
            'see_all'               => 'Tümünü Gör',
            'review'                => 'İncele'
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
            'advertisement_banner'=> 'Reklam Banner\'ın aktif olması için iki imajın da yüklenmesi gerekiyor.',
            'not_options'  => 'Bu bölümün ayarları bulunmamaktadır.',
            'link'          => 'Veri ile alakalı bir internet adresi ekle. Bu alan zorunlu <em class="label label-warning">değildir</em>. Lütfen yazdığın internet adresinin başına <em class="label label-info">http://</em> veya <em class="label label-info">https://</em> eklemeyi unutma. <small class="text-muted">( Ör: http://siteadresi.com )</small> ',
            'item_visible'  => 'Görünenler <em class="label label-info">2</em> adet olmalı.'
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
