<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Team Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the teams, naming is made with each routes' name
    'team_category' => [
        'index'                     => 'Departmanlar',
        'index_description'         => 'Sistem içindeki bütün departmanlar',
        'edit'                      => 'Departmanı Düzenle',
        'edit_description'          => ':team_category adlı departmanın bilgilerini düzenle',
        'create'                    => 'Departman Ekle',
        'create_description'        => 'Yeni bir departman ekle',
        'show'                      => 'Departman Bilgileri',
        'show_description'          => ':team_category hakkında bilgiler',
        'teams'                     => ':team_category Personelleri'
    ],
    'team' => [
        'index'                     => 'Personeller',
        'index_description'         => 'Sistemde bulunan bütün personeller',
        'edit'                      => 'Personel Düzenle',
        'edit_description'          => ':team personeli bilgilerini düzenle',
        'create'                    => 'Personel Ekle',
        'create_description'        => 'Yeni bir personel ekle',
        'show'                      => 'Personel Bilgileri',
        'show_description'          => ':team personeli hakkında bilgiler',
    ],

    // menu
    'menu' => [
        'team_category' => [
            'root'                  => 'Departmanlar',
            'all'                   => 'Tüm Departmanlar',
            'add'                   => 'Departman Ekle'
        ],
        'team' => [
            'root'                  => 'Personeller',
            'all'                   => 'Tüm Personeller',
            'add'                   => 'Personel Ekle'
        ],
    ],

    // fields
    'fields' => [
        'team_category' => [
            'name'                  => 'Departman',
        ],
        'team' => [
            'first_name'            => 'Ad',
            'last_name'             => 'Soyad',
            'email'                 => 'E-posta',
            'photo'                 => 'Fotoğraf',
            'description'           => 'Açıklama',
            'phone'                 => 'Telefon',
            'url'                   => 'Adresi',
        ]
    ],

    // helpers
    'helpers' => [
        'team_category' => [
            'not_have_child'    => '<h3>Gösterilecek departman yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni departman eklemek için sağ üst tarafta bulunan <a class="btn green btn-sm btn-outline" href="javascript:;"> <i class="fa fa-plus-square"></i> Yeni Ekle </a> tuşuna tıkla.</p>',
        ],
        'team' => [
            'category_id_help'  => 'Departman seç',
            'is_publish_help'   => 'Personelin yayında olması, ziyaretçilerin personeli görebilmesini sağlar. Yayında olmayan personeller ziyaretçilere açık değildir.',
            'social_account'    => 'Personelin :social_account adresi. Lütfen yazdığın adresin başına <em class="label label-info">http://</em> veya <em class="label label-info">https://</em> eklemeyi unutma. <small class="text-muted">( Ör: http://sosyalhesap.com/personel )</small> ',
        ]
    ],

    // permissions
    'permission' => [
        'TeamCategoryController' => [
            'icon'                          => 'fa fa-users',
            'title'                         => 'Departman İşlemleri',
            // routes
            'team_category_index'           => 'Departmanlar Sayfası',
            'team_category_index_desc'      => 'Bu izne sahip olanlar personel departmanlarının listelendiği sayfaya gidebilir',
            'team_category_create'          => 'Ekle Sayfası',
            'team_category_create_desc'     => 'Bu izne sahip olanlar personel departmanı ekleme sayfasına gidebilir',
            'team_category_store'           => 'Ekleme',
            'team_category_store_desc'      => 'Bu izne sahip olanlar personel departmanı ekleyebilir',
            'team_category_show'            => 'Bilgiler Sayfası',
            'team_category_show_desc'       => 'Bu izne sahip olanlar personel departmanı bilgilerini görüntüleyebilir',
            'team_category_edit'            => 'Düzenleme Sayfası',
            'team_category_edit_desc'       => 'Bu izne sahip olanlar personel departmanı bilgilerini düzenleme sayfasına gidebilir',
            'team_category_update'          => 'Düzenleme',
            'team_category_update_desc'     => 'Bu izne sahip olanlar personel departmanı bilgilerini düzenleyebilir',
            'team_category_destroy'         => 'Silme',
            'team_category_destroy_desc'    => 'Bu izne sahip olanlar personel departmanı silebilir',
        ],
        'TeamCategoryApiController' => [
            'icon'                          => 'fa fa-users',
            'title'                         => 'Departman Uzak Bağlantı İşlemleri',
            // routes
            'team_category_models'          => 'Departmanları Listeleme',
            'team_category_models_desc'     => 'Bu izne sahip olanlar personel departmanlarını bazı seçim kutularında listeleyebilir',
            'team_category_move'            => 'Departmanları Taşıma',
            'team_category_move_desc'       => 'Bu izne sahip olanlar personel departmanlarını taşıyarak konumunu değiştirebilir',
            'team_category_group'           => 'Toplu İşlem',
            'team_category_group_desc'      => 'Bu izne sahip olanlar personel departmanlarının listelendiği sayfada toplu işlem yapabilir',
            'team_category_detail'          => 'Detaylar',
            'team_category_detail_desc'     => 'Bu izne sahip olanlar personel departmanlarının listelendiği sayfada kategori detayını görebilir',
            'team_category_index'           => 'Listeleme',
            'team_category_index_desc'      => 'Bu izne sahip olanlar personel departmanlarını listeleyebilir',
            'team_category_store'           => 'Hızlı Ekleme',
            'team_category_store_desc'      => 'Bu izne sahip olanlar personel departmanlarının listelendiği sayfada hızlı şekilde kategori ekleyebilir',
            'team_category_update'          => 'Hızlı Düzenleme',
            'team_category_update_desc'     => 'Bu izne sahip olanlar personel departmanlarının listelendiği sayfada kategori bilgisini hızlı şekilde düzenleyebilir',
            'team_category_destroy'         => 'Silme',
            'team_category_destroy_desc'    => 'Bu izne sahip olanlar personel departmanı silebilir',
        ],
        'TeamController' => [
            'icon'                          => 'fa fa-user',
            'title'                         => 'Personel İşlemleri',
            // routes
            'team_publish'                  => 'Personel Yayınlama',
            'team_publish_desc'             => 'Bu izne sahip olanlar personel yayınlayabilir',
            'team_notPublish'               => 'Personel Yayından Kaldırma',
            'team_notPublish_desc'          => 'Bu izne sahip olanlar personeli yayından kaldırabilir',
            'team_index'                    => 'Personeller Sayfası',
            'team_index_desc'               => 'Bu izne sahip olanlar personellerin listelendiği sayfaya gidebilir',
            'team_create'                   => 'Ekle Sayfası',
            'team_create_desc'              => 'Bu izne sahip olanlar personel ekleme sayfasına gidebilir',
            'team_store'                    => 'Ekleme',
            'team_store_desc'               => 'Bu izne sahip olanlar personel ekleyebilir',
            'team_show'                     => 'Bilgiler Sayfası',
            'team_show_desc'                => 'Bu izne sahip olanlar personel bilgilerini görüntüleyebilir',
            'team_edit'                     => 'Düzenleme Sayfası',
            'team_edit_desc'                => 'Bu izne sahip olanlar personel bilgilerini düzenleme sayfasına gidebilir',
            'team_update'                   => 'Düzenleme',
            'team_update_desc'              => 'Bu izne sahip olanlar personel bilgilerini düzenleyebilir',
            'team_destroy'                  => 'Silme',
            'team_destroy_desc'             => 'Bu izne sahip olanlar personeli silebilir',
        ]
        ,
        'TeamApiController' => [
            'icon'                           => 'fa fa-user',
            'title'                          => 'Personel Uzak Bağlantı İşlemleri',
            // routes
            'team_group'                    => 'Toplu İşlem',
            'team_group_desc'               => 'Bu izne sahip olanlar personellerin listelendiği sayfada toplu işlem yapabilir',
            'team_detail'                   => 'Detaylar',
            'team_detail_desc'              => 'Bu izne sahip olanlar personellerin listelendiği sayfada personel detayını görebilir',
            'team_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'team_fastEdit_desc'            => 'Bu izne sahip olanlar personellerin listelendiği sayfada hızlı düzenlemek amacıyla personel bilgilerini sayfaya getirebilir',
            'team_publish'                  => 'Hızlı Yayınlama',
            'team_publish_desc'             => 'Bu izne sahip olanlar personellerin listelendiği sayfada hızlı şekilde personel yayınlayabilir',
            'team_notPublish'               => 'Hızlı Yayından Kaldırma',
            'team_notPublish_desc'          => 'Bu izne sahip olanlar personellerin listelendiği sayfada hızlı şekilde personel yayından kaldırabilir',
            'team_index'                    => 'Listeleme',
            'team_index_desc'               => 'Bu izne sahip olanlar personelleri listeleyebilir',
            'team_store'                    => 'Hızlı Ekleme',
            'team_store_desc'               => 'Bu izne sahip olanlar personellerin listelendiği sayfada hızlı şekilde personel ekleyebilir',
            'team_update'                   => 'Hızlı Düzenleme',
            'team_update_desc'              => 'Bu izne sahip olanlar personellerin listelendiği sayfada personel bilgisini hızlı şekilde düzenleyebilir',
            'team_destroy'                  => 'Silme',
            'team_destroy_desc'             => 'Bu izne sahip olanlar personeli silebilir',
        ]
    ]
];
