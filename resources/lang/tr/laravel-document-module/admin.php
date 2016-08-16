<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Document Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the documents, naming is made with each routes' name
    'document_category' => [
        'index'                     => 'Belge Kategorileri',
        'index_description'         => 'Sistem içindeki bütün belge kategorileri',
        'edit'                      => 'Belge Kategorisi Düzenle',
        'edit_description'          => ':document_category adlı belge kategorisinin bilgilerini düzenle',
        'create'                    => 'Belge Kategorisi Ekle',
        'create_description'        => 'Yeni bir belge kategorisi ekle',
        'show'                      => 'Belge Kategorisi Bilgileri',
        'show_description'          => ':document_category hakkında bilgiler',
        'document_category' => [
            'index'                 => ':parent_document_category Alt Kategoriler',
            'index_description'     => 'Bütün :parent_document_category alt kategorileri',
            'edit'                  => ':parent_document_category Alt Kategori Düzenle',
            'edit_description'      => ':parent_document_category alt kategorilerden :document_category kategorisi bilgilerini düzenle',
            'create'                => ':parent_document_category Alt Kategori Ekle',
            'create_description'    => 'Yeni bir :parent_document_category alt kategorisi ekle',
            'show'                  => ':parent_document_category Alt Kategori Bilgileri',
            'show_description'      => ':parent_document_category alt kategorilerinden :document_category kategorisi hakkında bilgiler'
        ],
        'document' => [
            'index'                 => ':document_category Belgeler',
            'index_description'     => 'Bütün :document_category belgeler',
            'edit'                  => ':document_category Belge Düzenle',
            'edit_description'      => ':document_category belgelerden :document belgesi bilgilerini düzenle',
            'create'                => ':document_category Belge Ekle',
            'create_description'    => 'Yeni bir :document_category belge ekle',
            'show'                  => ':document_category Belge Bilgileri',
            'show_description'      => ':document_category belge :document belgesi hakkında bilgiler'
        ]
    ],
    'document' => [
        'index'                     => 'Belgeler',
        'index_description'         => 'Sistemde bulunan bütün belgeler',
        'edit'                      => 'Belge Düzenle',
        'edit_description'          => ':document belgesi bilgilerini düzenle',
        'create'                    => 'Belge Ekle',
        'create_description'        => 'Yeni bir belge ekle',
        'show'                      => 'Belge Bilgileri',
        'show_description'          => ':document belgesi hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'document_category' => [
            'root'                  => 'Belge Kategorileri',
            'all'                   => 'Tüm Belge Kategorileri',
            'add'                   => 'Belge Kategorisi Ekle'
        ],
        'document' => [
            'root'                  => 'Belgeler',
            'all'                   => 'Tüm Belgeler',
            'add'                   => 'Belge Ekle'
        ],
    ],

    // fields
    'fields' => [
        'document_category' => [
            'name'                  => 'Kategori Adı',
            'has_description'       => 'Belgelerin Açıklaması Olsun mu?',
            'has_photo'             => 'Belgelerin Fotoğrafı Olsun mu?',
            'show_title'            => 'Ziyaretçilere Belgelerin Başlıkları Gösterilsin mi?',
            'show_description'      => 'Ziyaretçilere Belgelerin Açıklamaları Gösterilsin mi?',
            'show_photo'            => 'Ziyaretçilere Belgelerin Fotoğrafları Gösterilsin mi?',
            'documents_setting'     => 'Kategori Belgelerinin Ayarları'
        ],
        'document' => [
            'title'                 => 'Belge Başlığı',
            'file_name'             => 'Dosya Adı',
            'description'           => 'Açıklama',
            'photo'                 => 'Fotoğraf',
        ]
    ],

    // helpers
    'helpers' => [
        'document_category' => [
            'not_have_child'        => '<h3>Gösterilecek kategori yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni kategori eklemek için sağ üst tarafta bulunan <a class="btn green btn-outline" href="javascript:;"> Yeni Ekle <i class="fa fa-plus"></i> </a> tuşa tıkla.</p>',
            'has_description'       => 'Bu kategoride bulunan belgelerin açıklamaları olacak mı? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategori ile belge eklerken açıklama alanı olmayacak!',
            'has_photo'             => 'Bu kategoride bulunan belgelerin fotoğrafları olacak mı? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategori ile belge eklerken fotoğraf alanı olmayacak!',
            'show_title'            => 'Bu kategoride bulunan belgelerin başlıkları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki belgelerin başlıkları ziyaretçilere görünmeyecek!',
            'show_description'      => 'Bu kategoride bulunan belgelerin açıklamaları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki belgelerin açıklamaları ziyaretçilere görünmeyecek!',
            'show_photo'            => 'Bu kategoride bulunan belgelerin fotoğrafları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki belgelerin fotoğrafları ziyaretçilere görünmeyecek!'
        ],
        'document' => [
            'category_id_help'      => 'Belgenin kategorisini seç. Bu alan <em class="label label-warning">zorunludur</em>.',
            'is_publish_help'       => 'Belgenin yayında olması, ziyaretçilerin belge bilgilerini görebilmesini sağlar. Yayında olmayan belgeler ziyaretçilere açık değildir.'
        ]
    ],

    // permissions
    'permission' => [
        'DocumentCategoryController' => [
            'icon'                              => 'fa fa-files-o',
            'title'                             => 'Belge Kategorileri İşlemleri',
            // routes
            'document_category_index'           => 'Kategoriler Sayfası',
            'document_category_index_desc'      => 'Bu izne sahip olanlar belge kategorilerinin listelendiği sayfaya gidebilir',
            'document_category_create'          => 'Ekle Sayfası',
            'document_category_create_desc'     => 'Bu izne sahip olanlar belge kategorisi ekleme sayfasına gidebilir',
            'document_category_store'           => 'Ekleme',
            'document_category_store_desc'      => 'Bu izne sahip olanlar belge kategorisi ekleyebilir',
            'document_category_show'            => 'Bilgiler Sayfası',
            'document_category_show_desc'       => 'Bu izne sahip olanlar belge kategorisi bilgilerini görüntüleyebilir',
            'document_category_edit'            => 'Düzenleme Sayfası',
            'document_category_edit_desc'       => 'Bu izne sahip olanlar belge kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'document_category_update'          => 'Düzenleme',
            'document_category_update_desc'     => 'Bu izne sahip olanlar belge kategorisi bilgilerini düzenleyebilir',
            'document_category_destroy'         => 'Silme',
            'document_category_destroy_desc'    => 'Bu izne sahip olanlar belge kategorisi silebilir',
        ],
        'DocumentCategoryApiController' => [
            'icon'                              => 'fa fa-files-o',
            'title'                             => 'Belge Kategorisi Uzak Bağlantı İşlemleri',
            // routes
            'document_category_models'          => 'Kategorileri Listeleme',
            'document_category_models_desc'     => 'Bu izne sahip olanlar belge kategorilerini bazı seçim kutularında listeleyebilir',
            'document_category_group'           => 'Toplu İşlem',
            'document_category_group_desc'      => 'Bu izne sahip olanlar belge kategorilerinin listelendiği sayfada toplu işlem yapabilir',
            'document_category_detail'          => 'Detaylar',
            'document_category_detail_desc'     => 'Bu izne sahip olanlar belge kategorilerinin listelendiği sayfada kategori detayını görebilir',
            'document_category_fastEdit'        => 'Hızlı Düzenleme Bilgileri',
            'document_category_fastEdit_desc'   => 'Bu izne sahip olanlar belge kategorilerinin listelendiği sayfada hızlı düzenlemek amacıyla kategori bilgilerini sayfaya getirebilir',
            'document_category_index'           => 'Listeleme',
            'document_category_index_desc'      => 'Bu izne sahip olanlar belge kategorilerini listeleyebilir',
            'document_category_store'           => 'Hızlı Ekleme',
            'document_category_store_desc'      => 'Bu izne sahip olanlar belge kategorilerinin listelendiği sayfada hızlı şekilde kategori ekleyebilir',
            'document_category_update'          => 'Hızlı Düzenleme',
            'document_category_update_desc'     => 'Bu izne sahip olanlar belge kategorilerinin listelendiği sayfada kategori bilgisini hızlı şekilde düzenleyebilir',
            'document_category_destroy'         => 'Silme',
            'document_category_destroy_desc'    => 'Bu izne sahip olanlar belge kategorisi silebilir',
        ],
        'DocumentController' => [
            'icon'                              => 'fa fa-file-pdf-o',
            'title'                             => 'Belge İşlemleri',
            // routes
            'document_publish'                  => 'Belge Yayınlama',
            'document_publish_desc'             => 'Bu izne sahip olanlar belge yayınlayabilir',
            'document_notPublish'               => 'Belge Yayından Kaldırma',
            'document_notPublish_desc'          => 'Bu izne sahip olanlar belge yayından kaldırabilir',
            'document_index'                    => 'Belgeler Sayfası',
            'document_index_desc'               => 'Bu izne sahip olanlar belgelerin listelendiği sayfaya gidebilir',
            'document_create'                   => 'Ekle Sayfası',
            'document_create_desc'              => 'Bu izne sahip olanlar belge ekleme sayfasına gidebilir',
            'document_store'                    => 'Ekleme',
            'document_store_desc'               => 'Bu izne sahip olanlar belge ekleyebilir',
            'document_show'                     => 'Bilgiler Sayfası',
            'document_show_desc'                => 'Bu izne sahip olanlar belge bilgilerini görüntüleyebilir',
            'document_edit'                     => 'Düzenleme Sayfası',
            'document_edit_desc'                => 'Bu izne sahip olanlar belge bilgilerini düzenleme sayfasına gidebilir',
            'document_update'                   => 'Düzenleme',
            'document_update_desc'              => 'Bu izne sahip olanlar belge bilgilerini düzenleyebilir',
            'document_destroy'                  => 'Silme',
            'document_destroy_desc'             => 'Bu izne sahip olanlar belgeyi silebilir',
            'document_category_document_publish'=> 'Belge Yayınlama',
            'document_category_document_publish_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge yayınlayabilir',
            'document_category_document_notPublish'=> 'Belge Yayından Kaldırma',
            'document_category_document_notPublish_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge yayından kaldırabilir',
            'document_category_document_index'  => 'Belgeler Sayfası',
            'document_category_document_index_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belgelerin listelendiği sayfaya gidebilir',
            'document_category_document_create' => 'Ekle Sayfası',
            'document_category_document_create_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge ekleme sayfasına gidebilir',
            'document_category_document_store'  => 'Ekleme',
            'document_category_document_store_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge ekleyebilir',
            'document_category_document_show'   => 'Bilgiler Sayfası',
            'document_category_document_show_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge bilgilerini görüntüleyebilir',
            'document_category_document_edit'   => 'Düzenleme Sayfası',
            'document_category_document_edit_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge bilgilerini düzenleme sayfasına gidebilir',
            'document_category_document_update' => 'Düzenleme',
            'document_category_document_update_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belge bilgilerini düzenleyebilir',
            'document_category_document_destroy'=> 'Silme',
            'document_category_document_destroy_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belgeyi silebilir',
        ]
        ,
        'DocumentApiController' => [
            'icon'                              => 'fa fa-file-pdf-o',
            'title'                             => 'Belge Uzak Bağlantı İşlemleri',
            // routes
            'document_group'                    => 'Toplu İşlem',
            'document_group_desc'               => 'Bu izne sahip olanlar belgelerin listelendiği sayfada toplu işlem yapabilir',
            'document_detail'                   => 'Detaylar',
            'document_detail_desc'              => 'Bu izne sahip olanlar belgelerin listelendiği sayfada belge detayını görebilir',
            'document_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'document_fastEdit_desc'            => 'Bu izne sahip olanlar belgelerin listelendiği sayfada hızlı düzenlemek amacıyla belge bilgilerini sayfaya getirebilir',
            'document_publish'                  => 'Hızlı Yayınlama',
            'document_publish_desc'             => 'Bu izne sahip olanlar belgelerin listelendiği sayfada hızlı şekilde belge yayınlayabilir',
            'document_notPublish'               => 'Hızlı Yayından Kaldırma',
            'document_notPublish_desc'          => 'Bu izne sahip olanlar belgelerin listelendiği sayfada hızlı şekilde belge yayından kaldırabilir',
            'document_index'                    => 'Listeleme',
            'document_index_desc'               => 'Bu izne sahip olanlar belgeleri listeleyebilir',
            'document_category_document_index'  => 'Listeleme',
            'document_category_document_index_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait belgeleri listeleyebilir',
            'document_store'                    => 'Hızlı Ekleme',
            'document_store_desc'               => 'Bu izne sahip olanlar belgelerin listelendiği sayfada hızlı şekilde belge ekleyebilir',
            'document_update'                   => 'Hızlı Düzenleme',
            'document_update_desc'              => 'Bu izne sahip olanlar belgelerin listelendiği sayfada belge bilgisini hızlı şekilde düzenleyebilir',
            'document_destroy'                  => 'Silme',
            'document_destroy_desc'             => 'Bu izne sahip olanlar belgeyi silebilir',
        ]
    ],
];
