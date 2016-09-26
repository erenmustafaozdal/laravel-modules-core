<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Contact Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the contacts, naming is made with each routes' name
    'contact' => [
        'index'                     => 'Şubeler',
        'index_description'         => 'Sistemde bulunan bütün şubeler',
        'edit'                      => 'Şube Düzenle',
        'edit_description'          => ':contact şubesi bilgilerini düzenle',
        'create'                    => 'Şube Ekle',
        'create_description'        => 'Yeni bir şube ekle',
        'show'                      => 'Şube Bilgileri',
        'show_description'          => ':contact şubesi hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'contact' => [
            'root'                  => 'İletişim',
            'all'                   => 'Tüm Şubeler',
            'add'                   => 'Şube Ekle'
        ],
    ],

    // fields
    'fields' => [
        'contact' => [
            'name'                  => 'Ad',
            'address'               => 'Adres',
            'map_title'             => 'Harita İşaretçi Başlığı',
            'map'                   => 'Harita',
            'search_location'       => 'Konum Ara',
            'number_title'          => 'Numara Başlığı',
            'number'                => 'Numara',
            'add_number'            => 'Yeni Numara Ekle',
            'numbers'               => 'Numaralar',
            'email_title'           => 'E-posta Başlığı',
            'email'                 => 'E-Posta',
            'add_email'             => 'Yeni E-posta Ekle',
            'emails'                => 'E-postalar',
        ]
    ],

    // helpers
    'helpers' => [
        'contact' => [
            'is_publish_help'   => 'Şubenin yayında olması, ziyaretçilerin şubeyi görebilmesini sağlar. Yayında olmayan şubeler ziyaretçilere açık değildir.',
            'province_id'       => 'Şubenin bulunduğu ili seçin.',
            'county_id'         => 'Şubenin bulunduğu ilçeyi seçin. <em class="label label-warning">Bu alan il seçildiğinde aktif olacaktır.</em>',
            'district_id'       => 'Şubenin bulunduğu semti seçin. <em class="label label-warning">Bu alan ilçe seçildiğinde aktif olacaktır.</em>',
            'neighborhood_id'   => 'Şubenin bulunduğu mahalleyi seçin. <em class="label label-warning">Bu alan semt seçildiğinde aktif olacaktır.</em>',
            'postal_code_id'    => 'Şubenin bulunduğu mekanın posta kodu. <em class="label label-warning">Bu alan mahalleyi seçtiğinde otomatik doldurulacaktır. Her hangi bir işlem yapmana gerek yok.</em>',
            'number'            => 'Şubeye ait sabit telefon, cep telefonu veya fax numarası. <small class="text-muted">(Ör: 0(506) 999 99 99)</small>',
            'email'             => 'Şubenin e-posta adresi.',
            'location'          => '<h4>Şubenin Konum Bilgilerini Belirle</h4>' .
                '<p><em class="label label-info">Harita İşaretçi Başlığı</em> alanı ile haritaya eklediğin konumun penceresindeki başlığı belirtebilirsin.</p>' .
                '<p class="margin-top-10">' .
                    'Konumu harita üzerinde işaretlemek için iki yöntem var:' .
                    '<ol>' .
                        '<li>Haritanın üzerinde bulunan <em class="label label-info">Konum Ara</em> alanı ile istediğin yeri arayıp, seçebilirsin. Sen seçim yaptığında konum harita üzerine eklenecektir.</li>' .
                        '<li>Harita üzerinde fare yardımıyla konumunu bulabilirsin. Konumu bu şekilde bulduğunda farenin <em class="label label-danger">sağ</em> tuşunu tıklayıp, açılan menüden <em class="label label-info">İşaretçi Ekle</em> seçimini yaptığında tıkladığın yer haritaya konum olarak eklenecektir.</li>' .
                    '</ol>' .
                '</p>' .
                '<p class="margin-top-10">' .
                    'Harita ziyaretçilere senin kaydettiğin şekilde görüntülenecektir. Bu sebeple haritanın yakınlığını (zoom) dikkatli bir şekilde ayarla.' .
                '</p>',
            'map_title'         => 'Haritadaki işaretçinin üzerine tıklandığında açılan pencerede görünmesini istediğin başlığı yaz.',
            'search_location'   => 'Haritada hızlı arama yapmak için konum adı yaz. <small class="text-muted">(Ör: Ankara)</small>',
        ]
    ],

    // permissions
    'permission' => [
        'ContactController' => [
            'icon'                              => 'fa fa-phone',
            'title'                             => 'İletişim İşlemleri',
            // routes
            'contact_publish'                  => 'Şube Yayınlama',
            'contact_publish_desc'             => 'Bu izne sahip olanlar şube yayınlayabilir',
            'contact_notPublish'               => 'Şube Yayından Kaldırma',
            'contact_notPublish_desc'          => 'Bu izne sahip olanlar şubeyi yayından kaldırabilir',
            'contact_index'                    => 'Şubeler Sayfası',
            'contact_index_desc'               => 'Bu izne sahip olanlar şubelerin listelendiği sayfaya gidebilir',
            'contact_create'                   => 'Ekle Sayfası',
            'contact_create_desc'              => 'Bu izne sahip olanlar şube ekleme sayfasına gidebilir',
            'contact_store'                    => 'Ekleme',
            'contact_store_desc'               => 'Bu izne sahip olanlar şube ekleyebilir',
            'contact_show'                     => 'Bilgiler Sayfası',
            'contact_show_desc'                => 'Bu izne sahip olanlar şube bilgilerini görüntüleyebilir',
            'contact_edit'                     => 'Düzenleme Sayfası',
            'contact_edit_desc'                => 'Bu izne sahip olanlar şube bilgilerini düzenleme sayfasına gidebilir',
            'contact_update'                   => 'Düzenleme',
            'contact_update_desc'              => 'Bu izne sahip olanlar şube bilgilerini düzenleyebilir',
            'contact_destroy'                  => 'Silme',
            'contact_destroy_desc'             => 'Bu izne sahip olanlar şubeyi silebilir',
        ]
        ,
        'ContactApiController' => [
            'icon'                              => 'fa fa-phone',
            'title'                             => 'İletişim Uzak Bağlantı İşlemleri',
            // routes
            'contact_group'                    => 'Toplu İşlem',
            'contact_group_desc'               => 'Bu izne sahip olanlar şubelerin listelendiği sayfada toplu işlem yapabilir',
            'contact_detail'                   => 'Detaylar',
            'contact_detail_desc'              => 'Bu izne sahip olanlar şubelerin listelendiği sayfada şube detayını görebilir',
            'contact_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'contact_fastEdit_desc'            => 'Bu izne sahip olanlar şubelerin listelendiği sayfada hızlı düzenlemek amacıyla şube bilgilerini sayfaya getirebilir',
            'contact_publish'                  => 'Hızlı Yayınlama',
            'contact_publish_desc'             => 'Bu izne sahip olanlar şubelerin listelendiği sayfada hızlı şekilde şube yayınlayabilir',
            'contact_notPublish'               => 'Hızlı Yayından Kaldırma',
            'contact_notPublish_desc'          => 'Bu izne sahip olanlar şubelerin listelendiği sayfada hızlı şekilde şube yayından kaldırabilir',
            'contact_index'                    => 'Listeleme',
            'contact_index_desc'               => 'Bu izne sahip olanlar şubeleri listeleyebilir',
            'contact_store'                    => 'Hızlı Ekleme',
            'contact_store_desc'               => 'Bu izne sahip olanlar şubelerin listelendiği sayfada hızlı şekilde şube ekleyebilir',
            'contact_update'                   => 'Hızlı Düzenleme',
            'contact_update_desc'              => 'Bu izne sahip olanlar şubelerin listelendiği sayfada şube bilgisini hızlı şekilde düzenleyebilir',
            'contact_destroy'                  => 'Silme',
            'contact_destroy_desc'             => 'Bu izne sahip olanlar şubeyi silebilir',
        ]
    ]
];
