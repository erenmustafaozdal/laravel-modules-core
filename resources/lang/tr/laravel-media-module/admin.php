<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Media Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the medias, naming is made with each routes' name
    'media_category' => [
        'index'                     => 'Medya Galerileri',
        'index_description'         => 'Sistem içindeki bütün medya galerileri',
        'edit'                      => 'Medya Galerisini Düzenle',
        'edit_description'          => ':media_category adlı medya galerisinin bilgilerini düzenle',
        'create'                    => 'Medya Galeri Ekle',
        'create_description'        => 'Yeni bir medya galerisi ekle',
        'show'                      => 'Medya Galerisi Bilgileri',
        'show_description'          => ':media_category hakkında bilgiler',
        'media_category' => [
            'index'                 => ':parent_media_category Galerileri',
            'index_description'     => 'Bütün :parent_media_category galerileri',
            'edit'                  => ':parent_media_category Galerisi Düzenle',
            'edit_description'      => ':parent_media_category galerilerinden :media_category galerisi bilgilerini düzenle',
            'create'                => ':parent_media_category Galerisi Ekle',
            'create_description'    => 'Yeni bir :parent_media_category galerisi ekle',
            'show'                  => ':parent_media_category Galerisi Bilgileri',
            'show_description'      => ':parent_media_category galerilerinden :media_category galerisi hakkında bilgiler'
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
            'root'                  => 'Medya Galerileri',
            'all'                   => 'Tüm Medya Galerileri',
            'add'                   => 'Medya Galerisi Ekle'
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
            'name'                  => 'Galeri',
            'type'                  => 'Galeri Tipi',
            'has_description'       => 'Medyaların Açıklaması Olsun mu?',
            'photos'                => 'Fotoğraflar',
            'photo'                 => 'Fotoğraf Galerisi',
            'videos'                => 'Videolar',
            'video'                 => 'Video Galerisi',
            'mixed'                 => 'Karışık Galeri',
            'mixeds'                => 'Karışık Galeri',
            'medias'                => 'Medyalar',
            'gallery_type'          => 'Galeri Gösterim Tipi',
            'classical'             => 'Klasik Galeri',
            'modern'                => 'Modern Galeri',
            'categorization'        => 'Kategorili Galeri'
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
            'not_have_child'    => '<h3>Gösterilecek galeri yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni galeri eklemek için sağ üst tarafta bulunan <a class="btn green btn-sm btn-outline" href="javascript:;"> <i class="fa fa-plus-square"></i> Yeni Ekle </a> tuşuna tıkla.</p>',
            'type'              => 'Galerinin içeriğinde neler olacak? Eğer <em class="label label-info">Fotoğraf</em>,  <em class="label label-info">Video</em> veya <em class="label label-info">Karışık</em> seçeneklerinden birini seçmelisin!',
            'gallery_type'      => 'Galeri ziyaretçilere nasıl gösterilecek? Eğer <em class="label label-info">Klasik Galeri</em>,  <em class="label label-info">Modern Galeri</em> veya <em class="label label-info">Kategorili Galeri</em> seçeneklerinden birini seçmelisin!',
            'has_description'   => 'Bu kategoride bulunan medyaların açıklamaları olacak mı? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategori ile medya eklerken açıklama alanı olmayacak!',
        ],
        'media' => [
            'category_id_help'  => 'Medyanın gösterileceği bir ya da daha fazla galeri seçebilirsin. Bunun için önce galeri oluşturmalısın.',
            'is_publish_help'   => 'Medyanın yayında olması, ziyaretçilerin medyayı görebilmesini sağlar. Yayında olmayan medyalar ziyaretçilere açık değildir.',
            'description'       => 'Medyayı açıklayan bir yazı yaz.',
            'video'             => 'Youtube video adresinin sonunda yer alan; <em class="label label-danger">v=</em> ile başlayan ve ilk <em class="label label-danger">&</em> karakterine kadar olan kodu yapıştır. <small class="text-muted">(Ör: https://www.youtube.com/watch?v=<em class="label label-info">video_kodu</em>&t=3103s)</small>'
        ]
    ],

    // permissions
    'permission' => [
        'MediaCategoryController' => [
            'icon'                              => 'fa fa-picture-o',
            'title'                             => 'Medya Galerileri İşlemleri',
            // routes
            'media_category_index'           => 'Galeriler Sayfası',
            'media_category_index_desc'      => 'Bu izne sahip olanlar medya galerilerinin listelendiği sayfaya gidebilir',
            'media_category_create'          => 'Ekle Sayfası',
            'media_category_create_desc'     => 'Bu izne sahip olanlar medya galerisi ekleme sayfasına gidebilir',
            'media_category_store'           => 'Ekleme',
            'media_category_store_desc'      => 'Bu izne sahip olanlar medya galerisi ekleyebilir',
            'media_category_show'            => 'Bilgiler Sayfası',
            'media_category_show_desc'       => 'Bu izne sahip olanlar medya galerisi bilgilerini görüntüleyebilir',
            'media_category_edit'            => 'Düzenleme Sayfası',
            'media_category_edit_desc'       => 'Bu izne sahip olanlar medya galerisi bilgilerini düzenleme sayfasına gidebilir',
            'media_category_update'          => 'Düzenleme',
            'media_category_update_desc'     => 'Bu izne sahip olanlar medya galerisi bilgilerini düzenleyebilir',
            'media_category_destroy'         => 'Silme',
            'media_category_destroy_desc'    => 'Bu izne sahip olanlar medya galerisi silebilir',
            'media_category_media_category_index'       => 'Alt Galeriler Sayfası',
            'media_category_media_category_index_desc'  => 'Bu izne sahip olanlar medya alt galerilerinin listelendiği sayfaya gidebilir',
            'media_category_media_category_create'      => 'Ekle Sayfası',
            'media_category_media_category_create_desc' => 'Bu izne sahip olanlar medya alt galerisi ekleme sayfasına gidebilir',
            'media_category_media_category_store'       => 'Ekleme',
            'media_category_media_category_store_desc'  => 'Bu izne sahip olanlar medya alt galerisi ekleyebilir',
            'media_category_media_category_show'        => 'Bilgiler Sayfası',
            'media_category_media_category_show_desc'   => 'Bu izne sahip olanlar medya alt galerisi bilgilerini görüntüleyebilir',
            'media_category_media_category_edit'        => 'Düzenleme Sayfası',
            'media_category_media_category_edit_desc'   => 'Bu izne sahip olanlar medya alt galerisi bilgilerini düzenleme sayfasına gidebilir',
            'media_category_media_category_update'      => 'Düzenleme',
            'media_category_media_category_update_desc' => 'Bu izne sahip olanlar medya alt galerisi bilgilerini düzenleyebilir',
            'media_category_media_category_destroy'     => 'Silme',
            'media_category_media_category_destroy_desc'=> 'Bu izne sahip olanlar medya alt galerisi silebilir',
        ],
        'MediaCategoryApiController' => [
            'icon'                              => 'fa fa-picture-o',
            'title'                             => 'Medya Galerisi Uzak Bağlantı İşlemleri',
            // routes
            'media_category_models'          => 'Galerileri Listeleme',
            'media_category_models_desc'     => 'Bu izne sahip olanlar medya galerilerini bazı seçim kutularında listeleyebilir',
            'media_category_move'            => 'Galerileri Taşıma',
            'media_category_move_desc'       => 'Bu izne sahip olanlar medya galerilerini taşıyarak konumunu değiştirebilir',
            'media_category_group'           => 'Toplu İşlem',
            'media_category_group_desc'      => 'Bu izne sahip olanlar medya galerilerinin listelendiği sayfada toplu işlem yapabilir',
            'media_category_detail'          => 'Detaylar',
            'media_category_detail_desc'     => 'Bu izne sahip olanlar medya galerilerinin listelendiği sayfada galeri detayını görebilir',
            'media_category_fastEdit'        => 'Hızlı Düzenleme Bilgileri',
            'media_category_fastEdit_desc'   => 'Bu izne sahip olanlar medya galerilerinin listelendiği sayfada hızlı düzenlemek amacıyla galeri bilgilerini sayfaya getirebilir',
            'media_category_index'           => 'Listeleme',
            'media_category_index_desc'      => 'Bu izne sahip olanlar medya galerilerini listeleyebilir',
            'media_category_store'           => 'Hızlı Ekleme',
            'media_category_store_desc'      => 'Bu izne sahip olanlar medya galerilerinin listelendiği sayfada hızlı şekilde galeri ekleyebilir',
            'media_category_update'          => 'Hızlı Düzenleme',
            'media_category_update_desc'     => 'Bu izne sahip olanlar medya galerilerinin listelendiği sayfada galeri bilgisini hızlı şekilde düzenleyebilir',
            'media_category_destroy'         => 'Silme',
            'media_category_destroy_desc'    => 'Bu izne sahip olanlar medya galerisi silebilir',
            'media_category_media_category_index'=> 'Alt Galeriler',
            'media_category_media_category_index_desc'=> 'Bu izne sahip olanlar galerilerin altında bulunan galerileri listeleyebilir',
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
            'media_category_media_publish_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medyayı yayınlayabilir',
            'media_category_media_notPublish'=> 'Medya Yayından Kaldırma',
            'media_category_media_notPublish_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medyayı yayından kaldırabilir',
            'media_category_media_index'  => 'Medyalar Sayfası',
            'media_category_media_index_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medyaların listelendiği sayfaya gidebilir',
            'media_category_media_create' => 'Ekle Sayfası',
            'media_category_media_create_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medya ekleme sayfasına gidebilir',
            'media_category_media_store'  => 'Ekleme',
            'media_category_media_store_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medya ekleyebilir',
            'media_category_media_show'   => 'Bilgiler Sayfası',
            'media_category_media_show_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medya bilgilerini görüntüleyebilir',
            'media_category_media_edit'   => 'Düzenleme Sayfası',
            'media_category_media_edit_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medya bilgilerini düzenleme sayfasına gidebilir',
            'media_category_media_update' => 'Düzenleme',
            'media_category_media_update_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medya bilgilerini düzenleyebilir',
            'media_category_media_destroy'=> 'Silme',
            'media_category_media_destroy_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medyayı silebilir',
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
            'media_category_media_index_desc'=> 'Bu izne sahip olanlar belirli bir galeriye ait medyaları listeleyebilir',
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
        'media_incompatible'        => 'Medyalar olması gereken uygunlukta değil! Bu bölümde yeni bir galeri oluşturmak için lütfen sadece :type türünde medyalar seçin.'
    ]
];
