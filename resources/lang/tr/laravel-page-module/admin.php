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

        ],
        'page' => [

        ]
    ],

    // helpers
    'helpers' => [
        'page_category' => [

        ],
        'page' => [

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
