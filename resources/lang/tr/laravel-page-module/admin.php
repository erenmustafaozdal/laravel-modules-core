<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Page Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the pages, naming is made with each routes' name
    'page_category' => [
        'index'                             => 'Sayfa Kategorileri',
        'index_description'                 => 'Sistem içindeki bütün sayfa kategorileri',
        'edit'                              => 'Sayfa Kategorisi Düzenle',
        'edit_description'                  => ':page_category adlı sayfa kategorisinin bilgierini düzenle',
        'create'                            => 'Sayfa Kategorisi Ekle',
        'create_description'                => 'Yeni bir sayfa kategorisi ekle',
        'show'                              => 'Sayfa Kategorisi Bilgileri',
        'show_description'                  => ':page_category hakkında bilgiler'
    ],
    'page' => [
        'index'                             => 'Sayfalar',
        'index_description'                 => 'Sistemde bulunan bütün sayfalar',
        'edit'                              => 'Sayfa Düzenle',
        'edit_description'                  => ':page sayfası bilgierini düzenle',
        'create'                            => 'Sayfa Ekle',
        'create_description'                => 'Yeni bir sayfa ekle',
        'show'                              => 'Sayfa Bilgileri',
        'show_description'                  => ':page sayfası hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'page_category' => [
            'root'                          => 'Sayfa Kategorileri',
            'all'                           => 'Tüm Sayfa Kategorileri',
            'add'                           => 'Sayfa Kategorisi Ekle'
        ],
        'page' => [
            'root'                          => 'Sayfalar',
            'all'                           => 'Tüm Sayfalar',
            'add'                           => 'Sayfa Ekle'
        ],
    ],

    // fields
    'fields' => [
        'page_category' => [
            'name'                          => 'Kategori Adı'
        ],
        'page' => [
            'title'                         => 'Sayfa Başlığı',
            'slug'                          => 'Tanımlama',
            'description'                   => 'Açıklama',
            'content'                       => 'İçerik',
            'meta_title'                    => 'META Başlık',
            'meta_description'              => 'META Açıklama',
            'meta_keywords'                 => 'META Anahtar Kelimeler',
            'content_info'                  => 'İçerik Bilgileri',
            'seo'                           => 'SEO Bilgileri',
        ]
    ],

    // helpers
    'helpers' => [
        'page_category' => [

        ],
        'page' => [
            'category_id_help'              => 'Sayfanın kategorisini seç. Bu alan <em class="label label-warning">zorunludur</em>.',
            'slug'                          => 'Benzersiz bir tanımlama yapın. Tanımlama yaparken <em class="label label-warning">Türkçe karakterler</em> kullanmayın. İzin verilen karakterler: <em class="label label-info">büyük küçük harfler (A-Z)</em>, <em class="label label-info">rakamlar (0-9)</em>, <em class="label label-info">tire (-)</em> ve <em class="label label-info">alt tire (_)</em>. Bu alanı boş bırakırsan; sistem otomatik olarak üretecektir.',
            'meta_title_help'               => 'Arama motorlarını bilgilendirmek amacıyla içerik başlığı yazın.',
            'meta_description_help'         => 'Arama motorlarını bilgilendirmek amacıyla içerik açıklaması yazın.',
            'meta_keywords_help'            => 'Arama motorlarını bilgilendirmek amacıyla içerik ile ilgili anahtar kelimeler yazın. Anahtar kelimeler arasına <em class="label label-info">virgül (,)</em> koyun.',
            'is_publish_help'               => 'Sayfanın yayında olması, ziyaretçilerin sayfayı görebilmesini sağlar. Yayında olmayan sayfalar ziyaretçilere açık değildir.',
        ]
    ],

    // permissions
    'permission' => [
        'PageCategoryController' => [
            'icon'                          => 'fa fa-files-o',
            'title'                         => 'Sayfa Kategorileri İşlemleri',
            // routes
            'page_category_index'           => 'Kategoriler Sayfası',
            'page_category_index_desc'      => 'Bu izne sahip olanlar sayfa kategorilerinin listelendiği sayfaya gidebilir',
            'page_category_create'          => 'Ekle Sayfası',
            'page_category_create_desc'     => 'Bu izne sahip olanlar sayfa kategorisi ekleme sayfasına gidebilir',
            'page_category_store'           => 'Ekleme',
            'page_category_store_desc'      => 'Bu izne sahip olanlar sayfa kategorisi ekleyebilir',
            'page_category_show'            => 'Bilgiler Sayfası',
            'page_category_show_desc'       => 'Bu izne sahip olanlar sayfa kategorisi bilgilerini görüntüleyebilir',
            'page_category_edit'            => 'Düzenleme Sayfası',
            'page_category_edit_desc'       => 'Bu izne sahip olanlar sayfa kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'page_category_update'          => 'Düzenleme',
            'page_category_update_desc'     => 'Bu izne sahip olanlar sayfa kategorisi bilgilerini düzenleyebilir',
            'page_category_destroy'         => 'Silme',
            'page_category_destroy_desc'    => 'Bu izne sahip olanlar sayfa kategorisi silebilir',
        ],
        'PageCategoryApiController' => [
            'icon'                          => 'fa fa-files-o',
            'title'                         => 'Sayfa Kategorisi Uzak Bağlantı İşlemleri',
            // routes
            'page_category_models'          => 'Kategorileri Listeleme',
            'page_category_models_desc'     => 'Bu izne sahip olanlar sayfa kategorilerini bazı seçim kutularında listeleyebilir',
            'page_category_group'           => 'Toplu İşlem',
            'page_category_group_desc'      => 'Bu izne sahip olanlar sayfa kategorilerinin listelendiği sayfada toplu işlem yapabilir',
            'page_category_detail'          => 'Detaylar',
            'page_category_detail_desc'     => 'Bu izne sahip olanlar sayfa kategorilerinin listelendiği sayfada kategori detayını görebilir',
            'page_category_fastEdit'        => 'Hızlı Düzenleme Bilgileri',
            'page_category_fastEdit_desc'   => 'Bu izne sahip olanlar sayfa kategorilerinin listelendiği sayfada hızlı düzenlemek amacıyla kategori bilgilerini sayfaya getirebilir',
            'page_category_index'           => 'Listeleme',
            'page_category_index_desc'      => 'Bu izne sahip olanlar sayfa kategorilerini listeleyebilir',
            'page_category_store'           => 'Hızlı Ekleme',
            'page_category_store_desc'      => 'Bu izne sahip olanlar sayfa kategorilerinin listelendiği sayfada hızlı şekilde kategori ekleyebilir',
            'page_category_update'          => 'Hızlı Düzenleme',
            'page_category_update_desc'     => 'Bu izne sahip olanlar sayfa kategorilerinin listelendiği sayfada kategori bilgisini hızlı şekilde düzenleyebilir',
            'page_category_destroy'         => 'Silme',
            'page_category_destroy_desc'    => 'Bu izne sahip olanlar sayfa kategorisi silebilir',
        ],
        'PageController' => [
            'icon'                          => 'fa fa-file',
            'title'                         => 'Sayfa İşlemleri',
            // routes
            'page_index'                    => 'Sayfalar Sayfası',
            'page_index_desc'               => 'Bu izne sahip olanlar sayfaların listelendiği sayfaya gidebilir',
            'page_create'                   => 'Ekle Sayfası',
            'page_create_desc'              => 'Bu izne sahip olanlar sayfa ekleme sayfasına gidebilir',
            'page_store'                    => 'Ekleme',
            'page_store_desc'               => 'Bu izne sahip olanlar sayfa ekleyebilir',
            'page_show'                     => 'Bilgiler Sayfası',
            'page_show_desc'                => 'Bu izne sahip olanlar sayfa bilgilerini görüntüleyebilir',
            'page_edit'                     => 'Düzenleme Sayfası',
            'page_edit_desc'                => 'Bu izne sahip olanlar sayfa bilgilerini düzenleme sayfasına gidebilir',
            'page_update'                   => 'Düzenleme',
            'page_update_desc'              => 'Bu izne sahip olanlar sayfa bilgilerini düzenleyebilir',
            'page_destroy'                  => 'Silme',
            'page_destroy_desc'             => 'Bu izne sahip olanlar sayfayı silebilir',
        ]
        ,
        'PageApiController' => [
            'icon'                          => 'fa fa-file',
            'title'                         => 'Sayfa Uzak Bağlantı İşlemleri',
            // routes
            'page_group'                    => 'Toplu İşlem',
            'page_group_desc'               => 'Bu izne sahip olanlar sayfaların listelendiği sayfada toplu işlem yapabilir',
            'page_detail'                   => 'Detaylar',
            'page_detail_desc'              => 'Bu izne sahip olanlar sayfaların listelendiği sayfada sayfa detayını görebilir',
            'page_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'page_fastEdit_desc'            => 'Bu izne sahip olanlar sayfaların listelendiği sayfada hızlı düzenlemek amacıyla sayfa bilgilerini sayfaya getirebilir',
            'page_publish'                  => 'Hızlı Yayınlama',
            'page_publish_desc'             => 'Bu izne sahip olanlar sayfaların listelendiği sayfada hızlı şekilde sayfa yayınlayabilir',
            'page_notPublish'               => 'Hızlı Yayından Kaldırma',
            'page_notPublish_desc'          => 'Bu izne sahip olanlar sayfaların listelendiği sayfada hızlı şekilde sayfa yayından kaldırabilir',
            'page_index'                    => 'Listeleme',
            'page_index_desc'               => 'Bu izne sahip olanlar sayfaları listeleyebilir',
            'page_store'                    => 'Hızlı Ekleme',
            'page_store_desc'               => 'Bu izne sahip olanlar sayfaların listelendiği sayfada hızlı şekilde sayfa ekleyebilir',
            'page_update'                   => 'Hızlı Düzenleme',
            'page_update_desc'              => 'Bu izne sahip olanlar sayfaların listelendiği sayfada sayfa bilgisini hızlı şekilde düzenleyebilir',
            'page_destroy'                  => 'Silme',
            'page_destroy_desc'             => 'Bu izne sahip olanlar sayfayı silebilir',
        ]
    ],
];
