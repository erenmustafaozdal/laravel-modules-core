<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Media Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the medias, naming is made with each routes' name
    'media_category' => [
        'index'                     => 'Medya Albümleri',
        'index_description'         => 'Sistem içindeki bütün medya albümleri',
        'edit'                      => 'Medya Albümü Düzenle',
        'edit_description'          => ':media_category adlı medya albümünün bilgilerini düzenle',
        'create'                    => 'Medya Albümü Ekle',
        'create_description'        => 'Yeni bir medya albümü ekle',
        'show'                      => 'Medya Albümü Bilgileri',
        'show_description'          => ':media_category hakkında bilgiler',
        'media_category' => [
            'index'                 => ':parent_media_category Albümleri',
            'index_description'     => 'Bütün :parent_media_category albümleri',
            'edit'                  => ':parent_media_category Albümü Düzenle',
            'edit_description'      => ':parent_media_category albümlerden :media_category albümü bilgilerini düzenle',
            'create'                => ':parent_media_category Albümü Ekle',
            'create_description'    => 'Yeni bir :parent_media_category albümü ekle',
            'show'                  => ':parent_media_category Albümü Bilgileri',
            'show_description'      => ':parent_media_category albümlerden :media_category albümü hakkında bilgiler'
        ],
        'media' => [
            'index'                 => ':media_category Medyaları',
            'index_description'     => 'Bütün :media_category medyaları',
            'edit'                  => ':media_category/:media Medyasını Düzenle',
            'edit_description'      => ':media_category medyalardan :media medyası bilgilerini düzenle',
            'create'                => ':media_category Medyası Ekle',
            'create_description'    => 'Yeni bir :media_category medyası ekle',
            'show'                  => ':media_category/:media Medya Bilgileri',
            'show_description'      => ':media_category medyalarından :media medyası hakkında bilgiler'
        ]
    ],
    'media' => [
        'index'                     => 'Medyalar',
        'index_description'         => 'Sistemde bulunan bütün medyalar',
        'edit'                      => 'Medya Düzenle',
        'edit_description'          => ':media medyası bilgilerini düzenle',
        'create'                    => 'Medya Ekle',
        'create_description'        => 'Yeni bir medya ekle',
        'show'                      => 'Medya Bilgileri',
        'show_description'          => ':media medyası hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'media_category' => [
            'root'                  => 'Medya Albümleri',
            'all'                   => 'Tüm Medya Albümleri',
            'add'                   => 'Medya Albümü Ekle'
        ],
        'media' => [
            'root'                  => 'Medyalar',
            'all'                   => 'Tüm Medyalar',
            'add'                   => 'Medya Ekle'
        ],
    ],

    // fields
    'fields' => [
        'media_category' => [
            'name'                  => 'Albümler',
            'type'                  => 'Albüm Tipi',
            'photos'                => 'Fotoğraflar',
            'photo'                 => 'Fotoğraf Albümü',
            'videos'                => 'Videolar',
            'video'                 => 'Video Albümü',
            'mixed'                 => 'Karışık',
            'mixeds'                => 'Karışık Albüm',
            'medias'                => 'Medyalar'
        ],
        'media' => [
            'title'                 => 'Başlık',
            'description'           => 'Açıklama',
            'media'                 => 'Medya',
            'photo'                 => 'Fotoğraf',
            'video'                 => 'Video',
            'add_photo'             => 'Fotoğraf Ekle',
            'add_video'             => 'Video Ekle',
        ]
    ],

    // helpers
    'helpers' => [
        'media_category' => [
            'not_have_child'    => '<h3>Gösterilecek albüm yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni albüm eklemek için sağ üst tarafta bulunan <a class="btn green btn-outline" href="javascript:;"> Yeni Ekle <i class="fa fa-plus"></i> </a> tuşa tıkla.</p>',
            'type'              => 'Albümün içeriğinde neler olacak? Eğer <em class="label label-info">Fotoğraf</em>,  <em class="label label-info">Video</em> veya <em class="label label-info">Karışık</em> seçeneklerinden birini seçmelisin!',
        ],
        'media' => [
            'category_id_help'  => 'Medyanın gösterileceği bir ya da daha fazla albüm seçebilirsin. Bunun için önce albüm oluşturmalısın.',
            'is_publish_help'   => 'Medyanın yayında olması, ziyaretçilerin medyayı görebilmesini sağlar. Yayında olmayan medyalar ziyaretçilere açık değildir.',
            'description'       => 'Medyayı açıklayan bir yazı yaz.',
            'video'             => 'Youtube video adresinin sonunda yer alan kodu yapıştır. <small class="text-muted">(Ör: https://www.youtube.com/watch?v=<em class="label label-info">video_kodu</em>)</small>'
        ]
    ],

    // permissions
    'permission' => [
        'MediaCategoryController' => [
            'icon'                              => 'fa fa-picture-o',
            'title'                             => 'Medya Albümleri İşlemleri',
            // routes
            'media_category_index'           => 'Albümler Sayfası',
            'media_category_index_desc'      => 'Bu izne sahip olanlar medya albümlerinin listelendiği sayfaya gidebilir',
            'media_category_create'          => 'Ekle Sayfası',
            'media_category_create_desc'     => 'Bu izne sahip olanlar medya albümü ekleme sayfasına gidebilir',
            'media_category_store'           => 'Ekleme',
            'media_category_store_desc'      => 'Bu izne sahip olanlar medya albümü ekleyebilir',
            'media_category_show'            => 'Bilgiler Sayfası',
            'media_category_show_desc'       => 'Bu izne sahip olanlar medya albümü bilgilerini görüntüleyebilir',
            'media_category_edit'            => 'Düzenleme Sayfası',
            'media_category_edit_desc'       => 'Bu izne sahip olanlar medya albümü bilgilerini düzenleme sayfasına gidebilir',
            'media_category_update'          => 'Düzenleme',
            'media_category_update_desc'     => 'Bu izne sahip olanlar medya albümü bilgilerini düzenleyebilir',
            'media_category_destroy'         => 'Silme',
            'media_category_destroy_desc'    => 'Bu izne sahip olanlar medya albümü silebilir',
            'media_category_media_category_index'       => 'Alt Albümler Sayfası',
            'media_category_media_category_index_desc'  => 'Bu izne sahip olanlar medya alt albümlerinin listelendiği sayfaya gidebilir',
            'media_category_media_category_create'      => 'Ekle Sayfası',
            'media_category_media_category_create_desc' => 'Bu izne sahip olanlar medya alt albümü ekleme sayfasına gidebilir',
            'media_category_media_category_store'       => 'Ekleme',
            'media_category_media_category_store_desc'  => 'Bu izne sahip olanlar medya alt albümü ekleyebilir',
            'media_category_media_category_show'        => 'Bilgiler Sayfası',
            'media_category_media_category_show_desc'   => 'Bu izne sahip olanlar medya alt albümü bilgilerini görüntüleyebilir',
            'media_category_media_category_edit'        => 'Düzenleme Sayfası',
            'media_category_media_category_edit_desc'   => 'Bu izne sahip olanlar medya alt albümü bilgilerini düzenleme sayfasına gidebilir',
            'media_category_media_category_update'      => 'Düzenleme',
            'media_category_media_category_update_desc' => 'Bu izne sahip olanlar medya alt albümü bilgilerini düzenleyebilir',
            'media_category_media_category_destroy'     => 'Silme',
            'media_category_media_category_destroy_desc'=> 'Bu izne sahip olanlar medya alt albümü silebilir',
        ],
        'MediaCategoryApiController' => [
            'icon'                              => 'fa fa-picture-o',
            'title'                             => 'Medya Albümü Uzak Bağlantı İşlemleri',
            // routes
            'media_category_models'          => 'Albümleri Listeleme',
            'media_category_models_desc'     => 'Bu izne sahip olanlar medya albümlerini bazı seçim kutularında listeleyebilir',
            'media_category_move'            => 'Albümleri Taşıma',
            'media_category_move_desc'       => 'Bu izne sahip olanlar medya albümlerini taşıyarak konumunu değiştirebilir',
            'media_category_group'           => 'Toplu İşlem',
            'media_category_group_desc'      => 'Bu izne sahip olanlar medya albümlerinin listelendiği sayfada toplu işlem yapabilir',
            'media_category_detail'          => 'Detaylar',
            'media_category_detail_desc'     => 'Bu izne sahip olanlar medya albümlerinin listelendiği sayfada albüm detayını görebilir',
            'media_category_fastEdit'        => 'Hızlı Düzenleme Bilgileri',
            'media_category_fastEdit_desc'   => 'Bu izne sahip olanlar medya albümlerinin listelendiği sayfada hızlı düzenlemek amacıyla albüm bilgilerini sayfaya getirebilir',
            'media_category_index'           => 'Listeleme',
            'media_category_index_desc'      => 'Bu izne sahip olanlar medya albümlerini listeleyebilir',
            'media_category_store'           => 'Hızlı Ekleme',
            'media_category_store_desc'      => 'Bu izne sahip olanlar medya albümlerinin listelendiği sayfada hızlı şekilde albüm ekleyebilir',
            'media_category_update'          => 'Hızlı Düzenleme',
            'media_category_update_desc'     => 'Bu izne sahip olanlar medya albümlerinin listelendiği sayfada albüm bilgisini hızlı şekilde düzenleyebilir',
            'media_category_destroy'         => 'Silme',
            'media_category_destroy_desc'    => 'Bu izne sahip olanlar medya albümü silebilir',
            'media_category_media_category_index'=> 'Alt Albümler',
            'media_category_media_category_index_desc'=> 'Bu izne sahip olanlar albümlerin altında bulunan albümleri listeleyebilir',
        ],
        'MediaController' => [
            'icon'                              => 'fa fa-camera',
            'title'                             => 'Medya İşlemleri',
            // routes
            'media_publish'                  => 'Medya Yayınlama',
            'media_publish_desc'             => 'Bu izne sahip olanlar medya yayınlayabilir',
            'media_notPublish'               => 'Medya Yayından Kaldırma',
            'media_notPublish_desc'          => 'Bu izne sahip olanlar medyayı yayından kaldırabilir',
            'media_index'                    => 'Medyalar Sayfası',
            'media_index_desc'               => 'Bu izne sahip olanlar medyaların listelendiği sayfaya gidebilir',
            'media_create'                   => 'Ekle Sayfası',
            'media_create_desc'              => 'Bu izne sahip olanlar medya ekleme sayfasına gidebilir',
            'media_store'                    => 'Ekleme',
            'media_store_desc'               => 'Bu izne sahip olanlar medya ekleyebilir',
            'media_show'                     => 'Bilgiler Sayfası',
            'media_show_desc'                => 'Bu izne sahip olanlar medya bilgilerini görüntüleyebilir',
            'media_edit'                     => 'Düzenleme Sayfası',
            'media_edit_desc'                => 'Bu izne sahip olanlar medya bilgilerini düzenleme sayfasına gidebilir',
            'media_update'                   => 'Düzenleme',
            'media_update_desc'              => 'Bu izne sahip olanlar medya bilgilerini düzenleyebilir',
            'media_destroy'                  => 'Silme',
            'media_destroy_desc'             => 'Bu izne sahip olanlar medyayı silebilir',
            'media_category_media_publish'=> 'Medya Yayınlama',
            'media_category_media_publish_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medyayı yayınlayabilir',
            'media_category_media_notPublish'=> 'Medya Yayından Kaldırma',
            'media_category_media_notPublish_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medyayı yayından kaldırabilir',
            'media_category_media_index'  => 'Medyalar Sayfası',
            'media_category_media_index_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medyaların listelendiği sayfaya gidebilir',
            'media_category_media_create' => 'Ekle Sayfası',
            'media_category_media_create_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medya ekleme sayfasına gidebilir',
            'media_category_media_store'  => 'Ekleme',
            'media_category_media_store_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medya ekleyebilir',
            'media_category_media_show'   => 'Bilgiler Sayfası',
            'media_category_media_show_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medya bilgilerini görüntüleyebilir',
            'media_category_media_edit'   => 'Düzenleme Sayfası',
            'media_category_media_edit_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medya bilgilerini düzenleme sayfasına gidebilir',
            'media_category_media_update' => 'Düzenleme',
            'media_category_media_update_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medya bilgilerini düzenleyebilir',
            'media_category_media_destroy'=> 'Silme',
            'media_category_media_destroy_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medyayı silebilir',
        ]
        ,
        'MediaApiController' => [
            'icon'                              => 'fa fa-camera',
            'title'                             => 'Medya Uzak Bağlantı İşlemleri',
            // routes
            'media_group'                    => 'Toplu İşlem',
            'media_group_desc'               => 'Bu izne sahip olanlar medyaların listelendiği sayfada toplu işlem yapabilir',
            'media_detail'                   => 'Detaylar',
            'media_detail_desc'              => 'Bu izne sahip olanlar medyaların listelendiği sayfada medya detayını görebilir',
            'media_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'media_fastEdit_desc'            => 'Bu izne sahip olanlar medyaların listelendiği sayfada hızlı düzenlemek amacıyla medya bilgilerini sayfaya getirebilir',
            'media_publish'                  => 'Hızlı Yayınlama',
            'media_publish_desc'             => 'Bu izne sahip olanlar medyaların listelendiği sayfada hızlı şekilde medya yayınlayabilir',
            'media_notPublish'               => 'Hızlı Yayından Kaldırma',
            'media_notPublish_desc'          => 'Bu izne sahip olanlar medyaların listelendiği sayfada hızlı şekilde medya yayından kaldırabilir',
            'media_index'                    => 'Listeleme',
            'media_index_desc'               => 'Bu izne sahip olanlar medyaları listeleyebilir',
            'media_category_media_index'  => 'Listeleme',
            'media_category_media_index_desc'=> 'Bu izne sahip olanlar belirli bir albüme ait medyaları listeleyebilir',
            'media_store'                    => 'Hızlı Ekleme',
            'media_store_desc'               => 'Bu izne sahip olanlar medyaların listelendiği sayfada hızlı şekilde medya ekleyebilir',
            'media_update'                   => 'Hızlı Düzenleme',
            'media_update_desc'              => 'Bu izne sahip olanlar medyaların listelendiği sayfada medya bilgisini hızlı şekilde düzenleyebilir',
            'media_destroy'                  => 'Silme',
            'media_destroy_desc'             => 'Bu izne sahip olanlar medyayı silebilir',
        ]
    ],

    // flash messages
    'flash' => [
        'media_incompatible'        => 'Medyalar olması gereken uygunlukta değil! Bu bölümde yeni bir albüm oluşturmak için lütfen sadece :type türünde medyalar seçin.'
    ]
];
