<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Product Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the products, naming is made with each routes' name
    'product_category' => [
        'index'                     => 'Ürün Kategorileri',
        'index_description'         => 'Sistem içindeki bütün ürün kategorileri',
        'edit'                      => 'Ürün Kategorisini Düzenle',
        'edit_description'          => ':product_category adlı ürün kategorisinin bilgilerini düzenle',
        'create'                    => 'Ürün Kategorisi Ekle',
        'create_description'        => 'Yeni bir ürün kategorisi ekle',
        'show'                      => 'Ürün Kategorisi Bilgileri',
        'show_description'          => ':product_category hakkında bilgiler'
    ],
    'product' => [
        'index'                     => 'Ürünler',
        'index_description'         => 'Sistemde bulunan bütün ürünler',
        'edit'                      => 'Ürün Düzenle',
        'edit_description'          => ':product ürünü bilgilerini düzenle',
        'create'                    => 'Ürün Ekle',
        'create_description'        => 'Yeni bir ürün ekle',
        'show'                      => 'Ürün Bilgileri',
        'show_description'          => ':product ürünü hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'product_category' => [
            'root'                  => 'Ürün Kategorileri',
            'all'                   => 'Tüm Ürün Kategorileri',
            'add'                   => 'Ürün Kategorisi Ekle'
        ],
        'product_brand' => [
            'root'                  => 'Markalar',
            'all'                   => 'Tüm Markalar',
            'add'                   => 'Marka Ekle'
        ],
        'product_showcase' => [
            'root'                  => 'Vitrinler',
            'all'                   => 'Tüm Vitrinler',
            'add'                   => 'Vitrin Ekle'
        ],
        'product' => [
            'root'                  => 'Ürünler',
            'all'                   => 'Tüm Ürünler',
            'add'                   => 'Ürün Ekle'
        ],
    ],

    // fields
    'fields' => [
        'product_category' => [
            'name'                  => 'Kategori',
        ],
        'product_brand' => [
            'name'                  => 'Marka Adı',
        ],
        'product_showcase' => [
            'name'                  => 'Vitrin Adı',
        ],
        'product' => [
            'name'                  => 'Ad',
            'amount'                => 'Fiyat',
            'code'                  => 'Kod',
            'short_description'     => 'Kısa Açıklama',
            'description'           => 'Açıklama',
            'meta_title'            => 'SEO Başlık',
            'meta_description'      => 'SEO Açıklama',
            'meta_keywords'         => 'SEO Anahtar Kelimeler',
        ]
    ],

    // helpers
    'helpers' => [
        'product_category' => [
            'not_have_child'    => '<h3>Gösterilecek kategori yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni kategori eklemek için sağ üst tarafta bulunan <a class="btn green btn-sm btn-outline" href="javascript:;"> <i class="fa fa-plus-square"></i> Yeni Ekle </a> tuşuna tıkla.</p>',
        ],
        'product' => [
            'category_id_help'  => 'Kategori seç',
            'brand_id_help'     => 'Marka seç',
            'is_publish_help'   => 'Ürünün yayında olması, ziyaretçilerin ürünü görebilmesini sağlar. Yayında olmayan ürünler ziyaretçilere açık değildir.',
            'amount'            => 'Ürünün fiyatını yaz',
            'code'              => 'Ürünün kodunu yaz',
            'short_description' => 'Ürüne ait kısa bir açıklama yaz. <em class="label label-info">Bu açıklama; asıl açıklamanın özeti olmalıdır</em>',
            'description'       => 'Ürünün açıklamasını yaz',
            'meta_title_help'               => 'Arama motorlarını bilgilendirmek amacıyla içerik başlığı yazın.',
            'meta_description_help'         => 'Arama motorlarını bilgilendirmek amacıyla içerik açıklaması yazın.',
            'meta_keywords_help'            => 'Arama motorlarını bilgilendirmek amacıyla içerik ile ilgili anahtar kelimeler yazın. Anahtar kelimeler arasına <em class="label label-info">virgül (,)</em> koyun.',
        ]
    ],

    // permissions
    'permission' => [
        'ProductCategoryController' => [
            'icon'                              => 'fa fa-cart-plus',
            'title'                             => 'Ürün Kategorileri İşlemleri',
            // routes
            'product_category_index'           => 'Kategoriler Sayfası',
            'product_category_index_desc'      => 'Bu izne sahip olanlar ürün kategorilerinin listelendiği sayfaya gidebilir',
            'product_category_create'          => 'Ekle Sayfası',
            'product_category_create_desc'     => 'Bu izne sahip olanlar ürün kategorisi ekleme sayfasına gidebilir',
            'product_category_store'           => 'Ekleme',
            'product_category_store_desc'      => 'Bu izne sahip olanlar ürün kategorisi ekleyebilir',
            'product_category_show'            => 'Bilgiler Sayfası',
            'product_category_show_desc'       => 'Bu izne sahip olanlar ürün kategorisi bilgilerini görüntüleyebilir',
            'product_category_edit'            => 'Düzenleme Sayfası',
            'product_category_edit_desc'       => 'Bu izne sahip olanlar ürün kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'product_category_update'          => 'Düzenleme',
            'product_category_update_desc'     => 'Bu izne sahip olanlar ürün kategorisi bilgilerini düzenleyebilir',
            'product_category_destroy'         => 'Silme',
            'product_category_destroy_desc'    => 'Bu izne sahip olanlar ürün kategorisi silebilir',
        ],
        'ProductCategoryApiController' => [
            'icon'                              => 'fa fa-cart-plus',
            'title'                             => 'Ürün Kategorisi Uzak Bağlantı İşlemleri',
            // routes
            'product_category_models'          => 'Kategorileri Listeleme',
            'product_category_models_desc'     => 'Bu izne sahip olanlar ürün kategorilerini bazı seçim kutularında listeleyebilir',
            'product_category_move'            => 'Kategorileri Taşıma',
            'product_category_move_desc'       => 'Bu izne sahip olanlar ürün kategorilerini taşıyarak konumunu değiştirebilir',
            'product_category_group'           => 'Toplu İşlem',
            'product_category_group_desc'      => 'Bu izne sahip olanlar ürün kategorilerinin listelendiği sayfada toplu işlem yapabilir',
            'product_category_detail'          => 'Detaylar',
            'product_category_detail_desc'     => 'Bu izne sahip olanlar ürün kategorilerinin listelendiği sayfada kategori detayını görebilir',
            'product_category_index'           => 'Listeleme',
            'product_category_index_desc'      => 'Bu izne sahip olanlar ürün kategorilerini listeleyebilir',
            'product_category_store'           => 'Hızlı Ekleme',
            'product_category_store_desc'      => 'Bu izne sahip olanlar ürün kategorilerinin listelendiği sayfada hızlı şekilde kategori ekleyebilir',
            'product_category_update'          => 'Hızlı Düzenleme',
            'product_category_update_desc'     => 'Bu izne sahip olanlar ürün kategorilerinin listelendiği sayfada kategori bilgisini hızlı şekilde düzenleyebilir',
            'product_category_destroy'         => 'Silme',
            'product_category_destroy_desc'    => 'Bu izne sahip olanlar ürün kategorisi silebilir',
        ],
        'ProductBrandController' => [
            'icon'                              => 'fa fa-cart-arrow-down',
            'title'                             => 'Marka İşlemleri',
            // routes
            'product_brand_index'               => 'Markalar Sayfası',
            'product_brand_index_desc'          => 'Bu izne sahip olanlar markaların listelendiği sayfaya gidebilir',
            'product_brand_create'              => 'Ekle Sayfası',
            'product_brand_create_desc'         => 'Bu izne sahip olanlar marka ekleme sayfasına gidebilir',
            'product_brand_store'               => 'Ekleme',
            'product_brand_store_desc'          => 'Bu izne sahip olanlar marka ekleyebilir',
            'product_brand_show'                => 'Bilgiler Sayfası',
            'product_brand_show_desc'           => 'Bu izne sahip olanlar marka bilgilerini görüntüleyebilir',
            'product_brand_edit'                => 'Düzenleme Sayfası',
            'product_brand_edit_desc'           => 'Bu izne sahip olanlar marka bilgilerini düzenleme sayfasına gidebilir',
            'product_brand_update'              => 'Düzenleme',
            'product_brand_update_desc'         => 'Bu izne sahip olanlar marka bilgilerini düzenleyebilir',
            'product_brand_destroy'             => 'Silme',
            'product_brand_destroy_desc'        => 'Bu izne sahip olanlar marka silebilir',
        ],
        'ProductBrandApiController' => [
            'icon'                              => 'fa fa-cart-arrow-down',
            'title'                             => 'Marka Uzak Bağlantı İşlemleri',
            // routes
            'product_brand_models'              => 'Markaları Listeleme',
            'product_brand_models_desc'         => 'Bu izne sahip olanlar markaları bazı seçim kutularında listeleyebilir',
            'product_brand_group'               => 'Toplu İşlem',
            'product_brand_group_desc'          => 'Bu izne sahip olanlar markaların listelendiği sayfada toplu işlem yapabilir',
            'product_brand_detail'              => 'Detaylar',
            'product_brand_detail_desc'         => 'Bu izne sahip olanlar markaların listelendiği sayfada marka detayını görebilir',
            'product_brand_fastEdit'            => 'Hızlı Düzenleme Bilgileri',
            'product_brand_fastEdit_desc'       => 'Bu izne sahip olanlar markaların listelendiği sayfada hızlı düzenlemek amacıyla marka bilgilerini sayfaya getirebilir',
            'product_brand_index'               => 'Listeleme',
            'product_brand_index_desc'          => 'Bu izne sahip olanlar markaları listeleyebilir',
            'product_brand_store'               => 'Hızlı Ekleme',
            'product_brand_store_desc'          => 'Bu izne sahip olanlar markaların listelendiği sayfada hızlı şekilde marka ekleyebilir',
            'product_brand_update'              => 'Hızlı Düzenleme',
            'product_brand_update_desc'         => 'Bu izne sahip olanlar markaların listelendiği sayfada marka bilgisini hızlı şekilde düzenleyebilir',
            'product_brand_destroy'             => 'Silme',
            'product_brand_destroy_desc'        => 'Bu izne sahip olanlar marka silebilir',
        ],
        'ProductShowcaseController' => [
            'icon'                              => 'fa fa-trophy',
            'title'                             => 'Vitrin İşlemleri',
            // routes
            'product_showcase_index'            => 'Vitrinler Sayfası',
            'product_showcase_index_desc'       => 'Bu izne sahip olanlar vitrinlerin listelendiği sayfaya gidebilir',
            'product_showcase_create'           => 'Ekle Sayfası',
            'product_showcase_create_desc'      => 'Bu izne sahip olanlar vitrin ekleme sayfasına gidebilir',
            'product_showcase_store'            => 'Ekleme',
            'product_showcase_store_desc'       => 'Bu izne sahip olanlar vitrin ekleyebilir',
            'product_showcase_show'             => 'Bilgiler Sayfası',
            'product_showcase_show_desc'        => 'Bu izne sahip olanlar vitrin bilgilerini görüntüleyebilir',
            'product_showcase_edit'             => 'Düzenleme Sayfası',
            'product_showcase_edit_desc'        => 'Bu izne sahip olanlar vitrin bilgilerini düzenleme sayfasına gidebilir',
            'product_showcase_update'           => 'Düzenleme',
            'product_showcase_update_desc'      => 'Bu izne sahip olanlar vitrin bilgilerini düzenleyebilir',
            'product_showcase_destroy'          => 'Silme',
            'product_showcase_destroy_desc'     => 'Bu izne sahip olanlar vitrin silebilir',
        ],
        'ProductShowcaseApiController' => [
            'icon'                              => 'fa fa-trophy',
            'title'                             => 'Vitrin Uzak Bağlantı İşlemleri',
            // routes
            'product_showcase_models'           => 'Vitrinleri Listeleme',
            'product_showcase_models_desc'      => 'Bu izne sahip olanlar vitrinleri bazı seçim kutularında listeleyebilir',
            'product_showcase_group'            => 'Toplu İşlem',
            'product_showcase_group_desc'       => 'Bu izne sahip olanlar vitrinlerin listelendiği sayfada toplu işlem yapabilir',
            'product_showcase_detail'           => 'Detaylar',
            'product_showcase_detail_desc'      => 'Bu izne sahip olanlar vitrinlerin listelendiği sayfada vitrin detayını görebilir',
            'product_showcase_fastEdit'         => 'Hızlı Düzenleme Bilgileri',
            'product_showcase_fastEdit_desc'    => 'Bu izne sahip olanlar vitrinlerin listelendiği sayfada hızlı düzenlemek amacıyla vitrin bilgilerini sayfaya getirebilir',
            'product_showcase_index'            => 'Listeleme',
            'product_showcase_index_desc'       => 'Bu izne sahip olanlar vitrinleri listeleyebilir',
            'product_showcase_store'            => 'Hızlı Ekleme',
            'product_showcase_store_desc'       => 'Bu izne sahip olanlar vitrinlerin listelendiği sayfada hızlı şekilde vitrin ekleyebilir',
            'product_showcase_update'           => 'Hızlı Düzenleme',
            'product_showcase_update_desc'      => 'Bu izne sahip olanlar vitrinlerin listelendiği sayfada vitrin bilgisini hızlı şekilde düzenleyebilir',
            'product_showcase_destroy'          => 'Silme',
            'product_showcase_destroy_desc'     => 'Bu izne sahip olanlar vitrin silebilir',
        ],
        'ProductController' => [
            'icon'                              => 'fa fa-diamond',
            'title'                             => 'Ürün İşlemleri',
            // routes
            'product_publish'                  => 'Ürün Yayınlama',
            'product_publish_desc'             => 'Bu izne sahip olanlar ürün yayınlayabilir',
            'product_notPublish'               => 'Ürün Yayından Kaldırma',
            'product_notPublish_desc'          => 'Bu izne sahip olanlar ürünü yayından kaldırabilir',
            'product_index'                    => 'Ürünler Sayfası',
            'product_index_desc'               => 'Bu izne sahip olanlar ürünlerin listelendiği sayfaya gidebilir',
            'product_create'                   => 'Ekle Sayfası',
            'product_create_desc'              => 'Bu izne sahip olanlar ürün ekleme sayfasına gidebilir',
            'product_store'                    => 'Ekleme',
            'product_store_desc'               => 'Bu izne sahip olanlar ürün ekleyebilir',
            'product_show'                     => 'Bilgiler Sayfası',
            'product_show_desc'                => 'Bu izne sahip olanlar ürün bilgilerini görüntüleyebilir',
            'product_edit'                     => 'Düzenleme Sayfası',
            'product_edit_desc'                => 'Bu izne sahip olanlar ürün bilgilerini düzenleme sayfasına gidebilir',
            'product_update'                   => 'Düzenleme',
            'product_update_desc'              => 'Bu izne sahip olanlar ürün bilgilerini düzenleyebilir',
            'product_destroy'                  => 'Silme',
            'product_destroy_desc'             => 'Bu izne sahip olanlar ürünü silebilir',
        ]
        ,
        'ProductApiController' => [
            'icon'                              => 'fa fa-diamond',
            'title'                             => 'Ürün Uzak Bağlantı İşlemleri',
            // routes
            'product_group'                    => 'Toplu İşlem',
            'product_group_desc'               => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada toplu işlem yapabilir',
            'product_detail'                   => 'Detaylar',
            'product_detail_desc'              => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada ürün detayını görebilir',
            'product_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'product_fastEdit_desc'            => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada hızlı düzenlemek amacıyla ürün bilgilerini sayfaya getirebilir',
            'product_publish'                  => 'Hızlı Yayınlama',
            'product_publish_desc'             => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada hızlı şekilde ürün yayınlayabilir',
            'product_notPublish'               => 'Hızlı Yayından Kaldırma',
            'product_notPublish_desc'          => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada hızlı şekilde ürün yayından kaldırabilir',
            'product_index'                    => 'Listeleme',
            'product_index_desc'               => 'Bu izne sahip olanlar ürünleri listeleyebilir',
            'product_store'                    => 'Hızlı Ekleme',
            'product_store_desc'               => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada hızlı şekilde ürün ekleyebilir',
            'product_update'                   => 'Hızlı Düzenleme',
            'product_update_desc'              => 'Bu izne sahip olanlar ürünlerin listelendiği sayfada ürün bilgisini hızlı şekilde düzenleyebilir',
            'product_destroy'                  => 'Silme',
            'product_destroy_desc'             => 'Bu izne sahip olanlar ürünü silebilir',
        ]
    ]
];
