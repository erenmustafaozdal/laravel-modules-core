<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Dealer Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the dealers, naming is made with each routes' name
    'dealer_category' => [
        'index'                     => 'Bayi Kategorileri',
        'index_description'         => 'Sistem içindeki bütün bayi kategorileri',
        'edit'                      => 'Bayi Kategorisini Düzenle',
        'edit_description'          => ':dealer_category adlı bayi kategorisinin bilgilerini düzenle',
        'create'                    => 'Bayi Kategorisi Ekle',
        'create_description'        => 'Yeni bir bayi kategorisi ekle',
        'show'                      => 'Bayi Kategorisi Bilgileri',
        'show_description'          => ':dealer_category hakkında bilgiler',
        'dealer_category' => [
            'index'                 => ':parent_dealer_category Alt Kategorileri',
            'index_description'     => 'Bütün :parent_dealer_category alt kategorileri',
            'edit'                  => ':parent_dealer_category Alt Kategorisi Düzenle',
            'edit_description'      => ':parent_dealer_category alt kategorilerinden :dealer_category kategorisi bilgilerini düzenle',
            'create'                => ':parent_dealer_category Alt Kategorisi Ekle',
            'create_description'    => 'Yeni bir :parent_dealer_category alt kategorisi ekle',
            'show'                  => ':parent_dealer_category Alt Kategorisi Bilgileri',
            'show_description'      => ':parent_dealer_category alt kategorilerinden :dealer_category kategorisi hakkında bilgiler'
        ],
        'dealer' => [
            'index'                 => ':dealer_category Bayileri',
            'index_description'     => 'Bütün :dealer_category bayileri',
            'edit'                  => ':dealer_category/:dealer Bayisini Düzenle',
            'edit_description'      => ':dealer_category bayilerinden :dealer bayisi bilgilerini düzenle',
            'create'                => ':dealer_category Bayisi Ekle',
            'create_description'    => 'Yeni bir :dealer_category bayisi ekle',
            'show'                  => ':dealer_category/:dealer Bayi Bilgileri',
            'show_description'      => ':dealer_category bayilerindan :dealer bayisi hakkında bilgiler'
        ]
    ],
    'dealer' => [
        'index'                     => 'Bayiler',
        'index_description'         => 'Sistemde bulunan bütün bayiler',
        'edit'                      => 'Bayi Düzenle',
        'edit_description'          => ':dealer bayisi bilgilerini düzenle',
        'create'                    => 'Bayi Ekle',
        'create_description'        => 'Yeni bir bayi ekle',
        'show'                      => 'Bayi Bilgileri',
        'show_description'          => ':dealer bayisi hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'dealer_category' => [
            'root'                  => 'Bayi Kategorileri',
            'all'                   => 'Tüm Bayi Kategorileri',
            'add'                   => 'Bayi Kategorisi Ekle'
        ],
        'dealer' => [
            'root'                  => 'Bayiler',
            'all'                   => 'Tüm Bayiler',
            'add'                   => 'Bayi Ekle'
        ],
    ],

    // fields
    'fields' => [
        'dealer_category' => [
            'name'                  => 'Kategori',
            'show_address'          => 'Ziyaretçilere Bayilerin <span class="text-info">Adresleri</span> Gösterilsin mi?',
            'show_province'         => 'Ziyaretçilere Bayilerin <span class="text-info">İlleri</span> Gösterilsin mi?',
            'show_county'           => 'Ziyaretçilere Bayilerin <span class="text-info">İlçeleri</span> Gösterilsin mi?',
            'show_district'         => 'Ziyaretçilere Bayilerin <span class="text-info">Semtleri</span> Gösterilsin mi?',
            'show_neighborhood'     => 'Ziyaretçilere Bayilerin <span class="text-info">Mahalleleri</span> Gösterilsin mi?',
            'show_postal_code'      => 'Ziyaretçilere Bayilerin <span class="text-info">Posta Kodları</span> Gösterilsin mi?',
            'show_land_phone'       => 'Ziyaretçilere Bayilerin <span class="text-info">Sabit Telefonları</span> Gösterilsin mi?',
            'show_mobile_phone'     => 'Ziyaretçilere Bayilerin <span class="text-info">Cep Telefonları</span> Gösterilsin mi?',
            'show_url'              => 'Ziyaretçilere Bayilerin <span class="text-info">İnternet Adresleri</span> Gösterilsin mi?',
            'dealers_setting'       => 'Kategori Bayilerinin Ayarları'
        ],
        'dealer' => [
            'name'                  => 'Ad',
            'address'               => 'Adres',
            'land_phone'            => 'Sabit Telefon',
            'mobile_phone'          => 'Cep Telefonu',
            'url'                   => 'İnternet Adresi',
        ]
    ],

    // helpers
    'helpers' => [
        'dealer_category' => [
            'not_have_child'    => '<h3>Gösterilecek kategori yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni kategori eklemek için sağ üst tarafta bulunan <a class="btn green btn-sm btn-outline" href="javascript:;"> <i class="fa fa-plus-square"></i> Yeni Ekle </a> tuşuna tıkla.</p>',
            'show_address'      => 'Bu kategoride bulunan bayilerin adresleri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin adresleri ziyaretçilere görünmeyecek!',
            'show_province'     => 'Bu kategoride bulunan bayilerin illeri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin illeri ziyaretçilere görünmeyecek!',
            'show_county'       => 'Bu kategoride bulunan bayilerin ilçeleri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin ilçeleri ziyaretçilere görünmeyecek!',
            'show_district'     => 'Bu kategoride bulunan bayilerin semtleri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin semtleri ziyaretçilere görünmeyecek!',
            'show_neighborhood' => 'Bu kategoride bulunan bayilerin mahalleleri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin mahalleleri ziyaretçilere görünmeyecek!',
            'show_postal_code'  => 'Bu kategoride bulunan bayilerin posta kodları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin posta kodları ziyaretçilere görünmeyecek!',
            'show_land_phone'   => 'Bu kategoride bulunan bayilerin sabit telefonları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin sabit telefonları ziyaretçilere görünmeyecek!',
            'show_mobile_phone' => 'Bu kategoride bulunan bayilerin cep telefonları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin cep telefonları ziyaretçilere görünmeyecek!',
            'show_url'          => 'Bu kategoride bulunan bayilerin internet adresleri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki bayilerin internet adresleri ziyaretçilere görünmeyecek!',
        ],
        'dealer' => [
            'category_id_help'  => 'Kategori seç',
            'is_publish_help'   => 'Bayinin yayında olması, ziyaretçilerin bayiyi görebilmesini sağlar. Yayında olmayan bayiler ziyaretçilere açık değildir.',
            'province_id'       => 'Bayinin bulunduğu ili seçin.',
            'county_id'         => 'Bayinin bulunduğu ilçeyi seçin. <em class="label label-warning">Bu alan il seçildiğinde aktif olacaktır.</em>',
            'district_id'       => 'Bayinin bulunduğu semti seçin. <em class="label label-warning">Bu alan ilçe seçildiğinde aktif olacaktır.</em>',
            'neighborhood_id'   => 'Bayinin bulunduğu mahalleyi seçin. <em class="label label-warning">Bu alan semt seçildiğinde aktif olacaktır.</em>',
            'postal_code_id'    => 'Bayinin bulunduğu mekanın posta kodu. <em class="label label-warning">Bu alan mahalleyi seçtiğinde otomatik doldurulacaktır. Her hangi bir işlem yapmana gerek yok.</em>',
            'land_phone'        => 'Bayinin sabit telefon numarası. <small class="text-muted">(Ör: 0(216) 999 99 99)</small>',
            'mobile_phone'      => 'Bayinin cep telefon numarası. <small class="text-muted">(Ör: 0(506) 999 99 99)</small>',
            'url'               => 'Bayinin internet adresi. <small class="text-muted">(Ör: http://www.siteadi.com veya http://www.siteadi.com/sitenin-her-hangi-bir-sayfasi vb.)</small>',
        ]
    ],

    // permissions
    'permission' => [
        'DealerCategoryController' => [
            'icon'                              => 'fa fa-building',
            'title'                             => 'Bayi Kategorileri İşlemleri',
            // routes
            'dealer_category_index'           => 'Kategoriler Sayfası',
            'dealer_category_index_desc'      => 'Bu izne sahip olanlar bayi kategorilerinin listelendiği sayfaya gidebilir',
            'dealer_category_create'          => 'Ekle Sayfası',
            'dealer_category_create_desc'     => 'Bu izne sahip olanlar bayi kategorisi ekleme sayfasına gidebilir',
            'dealer_category_store'           => 'Ekleme',
            'dealer_category_store_desc'      => 'Bu izne sahip olanlar bayi kategorisi ekleyebilir',
            'dealer_category_show'            => 'Bilgiler Sayfası',
            'dealer_category_show_desc'       => 'Bu izne sahip olanlar bayi kategorisi bilgilerini görüntüleyebilir',
            'dealer_category_edit'            => 'Düzenleme Sayfası',
            'dealer_category_edit_desc'       => 'Bu izne sahip olanlar bayi kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'dealer_category_update'          => 'Düzenleme',
            'dealer_category_update_desc'     => 'Bu izne sahip olanlar bayi kategorisi bilgilerini düzenleyebilir',
            'dealer_category_destroy'         => 'Silme',
            'dealer_category_destroy_desc'    => 'Bu izne sahip olanlar bayi kategorisi silebilir',
            'dealer_category_dealer_category_index'       => 'Alt Kategoriler Sayfası',
            'dealer_category_dealer_category_index_desc'  => 'Bu izne sahip olanlar bayi alt kategorilerinin listelendiği sayfaya gidebilir',
            'dealer_category_dealer_category_create'      => 'Ekle Sayfası',
            'dealer_category_dealer_category_create_desc' => 'Bu izne sahip olanlar bayi alt kategorisi ekleme sayfasına gidebilir',
            'dealer_category_dealer_category_store'       => 'Ekleme',
            'dealer_category_dealer_category_store_desc'  => 'Bu izne sahip olanlar bayi alt kategorisi ekleyebilir',
            'dealer_category_dealer_category_show'        => 'Bilgiler Sayfası',
            'dealer_category_dealer_category_show_desc'   => 'Bu izne sahip olanlar bayi alt kategorisi bilgilerini görüntüleyebilir',
            'dealer_category_dealer_category_edit'        => 'Düzenleme Sayfası',
            'dealer_category_dealer_category_edit_desc'   => 'Bu izne sahip olanlar bayi alt kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'dealer_category_dealer_category_update'      => 'Düzenleme',
            'dealer_category_dealer_category_update_desc' => 'Bu izne sahip olanlar bayi alt kategorisi bilgilerini düzenleyebilir',
            'dealer_category_dealer_category_destroy'     => 'Silme',
            'dealer_category_dealer_category_destroy_desc'=> 'Bu izne sahip olanlar bayi alt kategorisi silebilir',
        ],
        'DealerCategoryApiController' => [
            'icon'                              => 'fa fa-building',
            'title'                             => 'Bayi Kategorisi Uzak Bağlantı İşlemleri',
            // routes
            'dealer_category_models'          => 'Kategorileri Listeleme',
            'dealer_category_models_desc'     => 'Bu izne sahip olanlar bayi kategorilerini bazı seçim kutularında listeleyebilir',
            'dealer_category_move'            => 'Kategorileri Taşıma',
            'dealer_category_move_desc'       => 'Bu izne sahip olanlar bayi kategorilerini taşıyarak konumunu değiştirebilir',
            'dealer_category_group'           => 'Toplu İşlem',
            'dealer_category_group_desc'      => 'Bu izne sahip olanlar bayi kategorilerinin listelendiği sayfada toplu işlem yapabilir',
            'dealer_category_detail'          => 'Detaylar',
            'dealer_category_detail_desc'     => 'Bu izne sahip olanlar bayi kategorilerinin listelendiği sayfada kategori detayını görebilir',
            'dealer_category_fastEdit'        => 'Hızlı Düzenleme Bilgileri',
            'dealer_category_fastEdit_desc'   => 'Bu izne sahip olanlar bayi kategorilerinin listelendiği sayfada hızlı düzenlemek amacıyla kategori bilgilerini sayfaya getirebilir',
            'dealer_category_index'           => 'Listeleme',
            'dealer_category_index_desc'      => 'Bu izne sahip olanlar bayi kategorilerini listeleyebilir',
            'dealer_category_store'           => 'Hızlı Ekleme',
            'dealer_category_store_desc'      => 'Bu izne sahip olanlar bayi kategorilerinin listelendiği sayfada hızlı şekilde kategori ekleyebilir',
            'dealer_category_update'          => 'Hızlı Düzenleme',
            'dealer_category_update_desc'     => 'Bu izne sahip olanlar bayi kategorilerinin listelendiği sayfada kategori bilgisini hızlı şekilde düzenleyebilir',
            'dealer_category_destroy'         => 'Silme',
            'dealer_category_destroy_desc'    => 'Bu izne sahip olanlar bayi kategorisi silebilir',
            'dealer_category_dealer_category_index'=> 'Alt Kategoriler',
            'dealer_category_dealer_category_index_desc'=> 'Bu izne sahip olanlar kategorilerin altında bulunan kategorileri listeleyebilir',
        ],
        'DealerController' => [
            'icon'                              => 'fa fa-building-o',
            'title'                             => 'Bayi İşlemleri',
            // routes
            'dealer_publish'                  => 'Bayi Yayınlama',
            'dealer_publish_desc'             => 'Bu izne sahip olanlar bayi yayınlayabilir',
            'dealer_notPublish'               => 'Bayi Yayından Kaldırma',
            'dealer_notPublish_desc'          => 'Bu izne sahip olanlar bayiyi yayından kaldırabilir',
            'dealer_index'                    => 'Bayiler Sayfası',
            'dealer_index_desc'               => 'Bu izne sahip olanlar bayilerin listelendiği sayfaya gidebilir',
            'dealer_create'                   => 'Ekle Sayfası',
            'dealer_create_desc'              => 'Bu izne sahip olanlar bayi ekleme sayfasına gidebilir',
            'dealer_store'                    => 'Ekleme',
            'dealer_store_desc'               => 'Bu izne sahip olanlar bayi ekleyebilir',
            'dealer_show'                     => 'Bilgiler Sayfası',
            'dealer_show_desc'                => 'Bu izne sahip olanlar bayi bilgilerini görüntüleyebilir',
            'dealer_edit'                     => 'Düzenleme Sayfası',
            'dealer_edit_desc'                => 'Bu izne sahip olanlar bayi bilgilerini düzenleme sayfasına gidebilir',
            'dealer_update'                   => 'Düzenleme',
            'dealer_update_desc'              => 'Bu izne sahip olanlar bayi bilgilerini düzenleyebilir',
            'dealer_destroy'                  => 'Silme',
            'dealer_destroy_desc'             => 'Bu izne sahip olanlar bayiyi silebilir',
            'dealer_category_dealer_publish'=> 'Bayi Yayınlama',
            'dealer_category_dealer_publish_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayiyi yayınlayabilir',
            'dealer_category_dealer_notPublish'=> 'Bayi Yayından Kaldırma',
            'dealer_category_dealer_notPublish_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayiyi yayından kaldırabilir',
            'dealer_category_dealer_index'  => 'Bayiler Sayfası',
            'dealer_category_dealer_index_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayilerin listelendiği sayfaya gidebilir',
            'dealer_category_dealer_create' => 'Ekle Sayfası',
            'dealer_category_dealer_create_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayi ekleme sayfasına gidebilir',
            'dealer_category_dealer_store'  => 'Ekleme',
            'dealer_category_dealer_store_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayi ekleyebilir',
            'dealer_category_dealer_show'   => 'Bilgiler Sayfası',
            'dealer_category_dealer_show_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayi bilgilerini görüntüleyebilir',
            'dealer_category_dealer_edit'   => 'Düzenleme Sayfası',
            'dealer_category_dealer_edit_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayi bilgilerini düzenleme sayfasına gidebilir',
            'dealer_category_dealer_update' => 'Düzenleme',
            'dealer_category_dealer_update_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayi bilgilerini düzenleyebilir',
            'dealer_category_dealer_destroy'=> 'Silme',
            'dealer_category_dealer_destroy_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayiyi silebilir',
        ]
        ,
        'DealerApiController' => [
            'icon'                              => 'fa fa-building-o',
            'title'                             => 'Bayi Uzak Bağlantı İşlemleri',
            // routes
            'dealer_group'                    => 'Toplu İşlem',
            'dealer_group_desc'               => 'Bu izne sahip olanlar bayilerin listelendiği sayfada toplu işlem yapabilir',
            'dealer_detail'                   => 'Detaylar',
            'dealer_detail_desc'              => 'Bu izne sahip olanlar bayilerin listelendiği sayfada bayi detayını görebilir',
            'dealer_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'dealer_fastEdit_desc'            => 'Bu izne sahip olanlar bayilerin listelendiği sayfada hızlı düzenlemek amacıyla bayi bilgilerini sayfaya getirebilir',
            'dealer_publish'                  => 'Hızlı Yayınlama',
            'dealer_publish_desc'             => 'Bu izne sahip olanlar bayilerin listelendiği sayfada hızlı şekilde bayi yayınlayabilir',
            'dealer_notPublish'               => 'Hızlı Yayından Kaldırma',
            'dealer_notPublish_desc'          => 'Bu izne sahip olanlar bayilerin listelendiği sayfada hızlı şekilde bayi yayından kaldırabilir',
            'dealer_index'                    => 'Listeleme',
            'dealer_index_desc'               => 'Bu izne sahip olanlar bayileri listeleyebilir',
            'dealer_category_dealer_index'  => 'Listeleme',
            'dealer_category_dealer_index_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait bayileri listeleyebilir',
            'dealer_store'                    => 'Hızlı Ekleme',
            'dealer_store_desc'               => 'Bu izne sahip olanlar bayilerin listelendiği sayfada hızlı şekilde bayi ekleyebilir',
            'dealer_update'                   => 'Hızlı Düzenleme',
            'dealer_update_desc'              => 'Bu izne sahip olanlar bayilerin listelendiği sayfada bayi bilgisini hızlı şekilde düzenleyebilir',
            'dealer_destroy'                  => 'Silme',
            'dealer_destroy_desc'             => 'Bu izne sahip olanlar bayiyi silebilir',
        ]
    ]
];
