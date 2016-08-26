<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Description Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the descriptions, naming is made with each routes' name
    'description_category' => [
        'index'                     => 'Açıklama Kategorileri',
        'index_description'         => 'Sistem içindeki bütün açıklama kategorileri',
        'edit'                      => 'Açıklama Kategorisi Düzenle',
        'edit_description'          => ':description_category adlı açıklama kategorisinin bilgilerini düzenle',
        'create'                    => 'Açıklama Kategorisi Ekle',
        'create_description'        => 'Yeni bir açıklama kategorisi ekle',
        'show'                      => 'Açıklama Kategorisi Bilgileri',
        'show_description'          => ':description_category hakkında bilgiler',
        'description_category' => [
            'index'                 => ':parent_description_category Alt Kategoriler',
            'index_description'     => 'Bütün :parent_description_category alt kategorileri',
            'edit'                  => ':parent_description_category Alt Kategorisi Düzenle',
            'edit_description'      => ':parent_description_category alt kategorilerden :description_category kategorisi bilgilerini düzenle',
            'create'                => ':parent_description_category Alt Kategorisi Ekle',
            'create_description'    => 'Yeni bir :parent_description_category alt kategorisi ekle',
            'show'                  => ':parent_description_category Alt Kategorisi Bilgileri',
            'show_description'      => ':parent_description_category alt kategorilerinden :description_category kategorisi hakkında bilgiler'
        ],
        'description' => [
            'index'                 => ':description_category Verileri',
            'index_description'     => 'Bütün :description_category verileri',
            'edit'                  => ':description_category verisi Düzenle',
            'edit_description'      => ':description_category verilerinden :description bilgilerini düzenle',
            'create'                => ':description_category Verisi Ekle',
            'create_description'    => 'Yeni bir :description_category verisi ekle',
            'show'                  => ':description_category Bilgileri',
            'show_description'      => ':description_category verilerinden :description hakkında bilgiler'
        ]
    ],
    'description' => [
        'index'                     => 'Açıklamalar',
        'index_description'         => 'Sistemde bulunan bütün açıklamaler',
        'edit'                      => 'Açıklama Düzenle',
        'edit_description'          => ':description açıklaması bilgilerini düzenle',
        'create'                    => 'Açıklama Ekle',
        'create_description'        => 'Yeni bir açıklama ekle',
        'show'                      => 'Açıklama Bilgileri',
        'show_description'          => ':description açıklaması hakkında bilgiler'
    ],

    // menu
    'menu' => [
        'description_category' => [
            'root'                  => 'Açıklama Kategorileri',
            'all'                   => 'Tüm Açıklama Kategorileri',
            'add'                   => 'Açıklama Kategorisi Ekle'
        ],
        'description' => [
            'root'                  => 'Açıklamalar',
            'all'                   => 'Tüm Açıklamalar',
            'add'                   => 'Açıklama Ekle'
        ],
    ],

    // fields
    'fields' => [
        'description_category' => [
            'name'                  => 'Kategori Adı',
            'has_description'       => 'Verilerin Açıklaması Olsun mu?',
            'has_photo'             => 'Verilerin Fotoğrafı Olsun mu?',
            'has_link'              => 'Verilerin İnternet Adresi Olsun mu?',
            'show_title'            => 'Ziyaretçilere Verilerin Başlıkları Gösterilsin mi?',
            'show_description'      => 'Ziyaretçilere Verilerin Açıklamaları Gösterilsin mi?',
            'show_photo'            => 'Ziyaretçilere Verilerin Fotoğrafları Gösterilsin mi?',
            'show_link'             => 'Ziyaretçilere Verilerin İnternet Adresleri Gösterilsin mi?',
            'is_multiple_photo'     => 'Verilere Ait Birden Fazla Fotoğraf Olacak mı?',
            'descriptions_setting'  => 'Kategori Verilerinin Ayarları'
        ],
        'description' => [
            'title'                 => 'Başlık',
            'description'           => 'Açıklama',
            'photo'                 => 'Fotoğraf',
            'link'                  => 'İnternet Adresi',
        ]
    ],

    // helpers
    'helpers' => [
        'description_category' => [
            'not_have_child'        => '<h3>Gösterilecek kategori yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni kategori eklemek için sağ üst tarafta bulunan <a class="btn green btn-outline" href="javascript:;"> Yeni Ekle <i class="fa fa-plus"></i> </a> tuşa tıkla.</p>',
            'has_description'       => 'Bu kategoride bulunan verilerin açıklamaları olacak mı? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategori ile veri eklerken açıklama alanı olmayacak!',
            'has_photo'             => 'Bu kategoride bulunan verilerin fotoğrafları olacak mı? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategori ile veri eklerken fotoğraf alanı olmayacak!',
            'has_link'              => 'Bu kategoride bulunan verilerin internet adresleri olacak mı? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategori ile veri eklerken internet adresi alanı olmayacak!',
            'show_title'            => 'Bu kategoride bulunan verilerin başlıkları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki verilerin başlıkları ziyaretçilere görünmeyecek!',
            'show_description'      => 'Bu kategoride bulunan verilerin açıklamaları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki verilerin açıklamaları ziyaretçilere görünmeyecek!',
            'show_photo'            => 'Bu kategoride bulunan verilerin fotoğrafları ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki verilerin fotoğrafları ziyaretçilere görünmeyecek!',
            'show_link'             => 'Bu kategoride bulunan verilerin internet adresleri ziyaretçilere gösterilsin mi? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; bu kategorideki verilerin internet adresleri ziyaretçilere görünmeyecek!',
            'is_multiple_photo'     => 'Bu kategoride bulunan verilerin birden fazla fotoğrafı mı olacak? Eğer <em class="label label-info">Hayır</em> cevabı verirsen; her veri için sadece bir adet fotoğraf ekleyebilirsin. Ya da her veri için sınırsız fotoğraf ekleyebilirsin. Bu ikinci şık daha çok galeri tarzından olan veriler için uygun olur!',
        ],
        'description' => [
            'category_id_help'      => 'Kategori seç. Bu alan <em class="label label-warning">zorunludur</em>.',
            'is_publish_help'       => 'Yayında olması, ziyaretçilerin bilgileri görebilmesini sağlar. Yayında olmayan veriler ziyaretçilere açık değildir.',
            'description'           => 'Açıklayıcı bir yazı yaz.',
            'photo'                 => '{0} İlişkili fotoğraf ekle. İstersen bu fotoğrafı ekledikten sonra kırpabilirsin. |[1,Inf] Fotoğraflar Ekle',
            'link'                  => 'Bilgiler ile alakalı bir internet adresi ekle. Bu alan zorunlu <em class="label label-warning">değildir</em>. Lütfen yazdığın internet adresinin başına <em class="label label-info">http://</em> veya <em class="label label-info">https://</em> eklemeyi unutma. <small class="text-muted">( Ör: http://siteadresi.com )</small> ',
        ]
    ],

    // permissions
    'permission' => [
        'DescriptionCategoryController' => [
            'icon'                              => 'fa fa-sticky-note',
            'title'                             => 'Veri Kategorileri İşlemleri',
            // routes
            'description_category_index'           => 'Kategoriler Sayfası',
            'description_category_index_desc'      => 'Bu izne sahip olanlar veri kategorilerinin listelendiği sayfaya gidebilir',
            'description_category_create'          => 'Ekle Sayfası',
            'description_category_create_desc'     => 'Bu izne sahip olanlar veri kategorisi ekleme sayfasına gidebilir',
            'description_category_store'           => 'Ekleme',
            'description_category_store_desc'      => 'Bu izne sahip olanlar veri kategorisi ekleyebilir',
            'description_category_show'            => 'Bilgiler Sayfası',
            'description_category_show_desc'       => 'Bu izne sahip olanlar veri kategorisi bilgilerini görüntüleyebilir',
            'description_category_edit'            => 'Düzenleme Sayfası',
            'description_category_edit_desc'       => 'Bu izne sahip olanlar veri kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'description_category_update'          => 'Düzenleme',
            'description_category_update_desc'     => 'Bu izne sahip olanlar veri kategorisi bilgilerini düzenleyebilir',
            'description_category_destroy'         => 'Silme',
            'description_category_destroy_desc'    => 'Bu izne sahip olanlar veri kategorisi silebilir',
            'description_category_description_category_index'       => 'Kategori Alt Kategoiler Sayfası',
            'description_category_description_category_index_desc'  => 'Bu izne sahip olanlar veri alt kategorilerinin listelendiği sayfaya gidebilir',
            'description_category_description_category_create'      => 'Ekle Sayfası',
            'description_category_description_category_create_desc' => 'Bu izne sahip olanlar veri alt kategorisi ekleme sayfasına gidebilir',
            'description_category_description_category_store'       => 'Ekleme',
            'description_category_description_category_store_desc'  => 'Bu izne sahip olanlar veri alt kategorisi ekleyebilir',
            'description_category_description_category_show'        => 'Bilgiler Sayfası',
            'description_category_description_category_show_desc'   => 'Bu izne sahip olanlar veri alt kategorisi bilgilerini görüntüleyebilir',
            'description_category_description_category_edit'        => 'Düzenleme Sayfası',
            'description_category_description_category_edit_desc'   => 'Bu izne sahip olanlar veri alt kategorisi bilgilerini düzenleme sayfasına gidebilir',
            'description_category_description_category_update'      => 'Düzenleme',
            'description_category_description_category_update_desc' => 'Bu izne sahip olanlar veri alt kategorisi bilgilerini düzenleyebilir',
            'description_category_description_category_destroy'     => 'Silme',
            'description_category_description_category_destroy_desc'=> 'Bu izne sahip olanlar veri alt kategorisi silebilir',
        ],
        'DescriptionCategoryApiController' => [
            'icon'                              => 'fa fa-sticky-note',
            'title'                             => 'Veri Kategorisi Uzak Bağlantı İşlemleri',
            // routes
            'description_category_models'          => 'Kategorileri Listeleme',
            'description_category_models_desc'     => 'Bu izne sahip olanlar veri kategorilerini bazı seçim kutularında listeleyebilir',
            'description_category_move'            => 'Kategorileri Taşıma',
            'description_category_move_desc'       => 'Bu izne sahip olanlar veri kategorilerini taşıyarak konumunu değiştirebilir',
            'description_category_group'           => 'Toplu İşlem',
            'description_category_group_desc'      => 'Bu izne sahip olanlar veri kategorilerinin listelendiği sayfada toplu işlem yapabilir',
            'description_category_detail'          => 'Detaylar',
            'description_category_detail_desc'     => 'Bu izne sahip olanlar veri kategorilerinin listelendiği sayfada kategori detayını görebilir',
            'description_category_fastEdit'        => 'Hızlı Düzenleme Bilgileri',
            'description_category_fastEdit_desc'   => 'Bu izne sahip olanlar veri kategorilerinin listelendiği sayfada hızlı düzenlemek amacıyla kategori bilgilerini sayfaya getirebilir',
            'description_category_index'           => 'Listeleme',
            'description_category_index_desc'      => 'Bu izne sahip olanlar veri kategorilerini listeleyebilir',
            'description_category_store'           => 'Hızlı Ekleme',
            'description_category_store_desc'      => 'Bu izne sahip olanlar veri kategorilerinin listelendiği sayfada hızlı şekilde kategori ekleyebilir',
            'description_category_update'          => 'Hızlı Düzenleme',
            'description_category_update_desc'     => 'Bu izne sahip olanlar veri kategorilerinin listelendiği sayfada kategori bilgisini hızlı şekilde düzenleyebilir',
            'description_category_destroy'         => 'Silme',
            'description_category_destroy_desc'    => 'Bu izne sahip olanlar veri kategorisi silebilir',
            'description_category_description_category_index'=> 'Kategori Alt Kategorileri',
            'description_category_description_category_index_desc'=> 'Bu izne sahip olanlar kategorilerin altında bulunan kategorileri listeleyebilir',
        ],
        'DescriptionController' => [
            'icon'                              => 'fa fa-sticky-note-o',
            'title'                             => 'Veri İşlemleri',
            // routes
            'description_publish'                  => 'Veri Yayınlama',
            'description_publish_desc'             => 'Bu izne sahip olanlar veriyi yayınlayabilir',
            'description_notPublish'               => 'Veri Yayından Kaldırma',
            'description_notPublish_desc'          => 'Bu izne sahip olanlar veriyi yayından kaldırabilir',
            'description_index'                    => 'Verilar Sayfası',
            'description_index_desc'               => 'Bu izne sahip olanlar verilerin listelendiği sayfaya gidebilir',
            'description_create'                   => 'Ekle Sayfası',
            'description_create_desc'              => 'Bu izne sahip olanlar veri ekleme sayfasına gidebilir',
            'description_store'                    => 'Ekleme',
            'description_store_desc'               => 'Bu izne sahip olanlar veri ekleyebilir',
            'description_show'                     => 'Bilgiler Sayfası',
            'description_show_desc'                => 'Bu izne sahip olanlar veri bilgilerini görüntüleyebilir',
            'description_edit'                     => 'Düzenleme Sayfası',
            'description_edit_desc'                => 'Bu izne sahip olanlar veri bilgilerini düzenleme sayfasına gidebilir',
            'description_update'                   => 'Düzenleme',
            'description_update_desc'              => 'Bu izne sahip olanlar veri bilgilerini düzenleyebilir',
            'description_destroy'                  => 'Silme',
            'description_destroy_desc'             => 'Bu izne sahip olanlar veriyi silebilir',
            'description_category_description_publish'=> 'Veri Yayınlama',
            'description_category_description_publish_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veriyi yayınlayabilir',
            'description_category_description_notPublish'=> 'Veri Yayından Kaldırma',
            'description_category_description_notPublish_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veriyi yayından kaldırabilir',
            'description_category_description_index'  => 'Verilar Sayfası',
            'description_category_description_index_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait verilerin listelendiği sayfaya gidebilir',
            'description_category_description_create' => 'Ekle Sayfası',
            'description_category_description_create_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veri ekleme sayfasına gidebilir',
            'description_category_description_store'  => 'Ekleme',
            'description_category_description_store_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veri ekleyebilir',
            'description_category_description_show'   => 'Bilgiler Sayfası',
            'description_category_description_show_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veri bilgilerini görüntüleyebilir',
            'description_category_description_edit'   => 'Düzenleme Sayfası',
            'description_category_description_edit_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veri bilgilerini düzenleme sayfasına gidebilir',
            'description_category_description_update' => 'Düzenleme',
            'description_category_description_update_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veri bilgilerini düzenleyebilir',
            'description_category_description_destroy'=> 'Silme',
            'description_category_description_destroy_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait veriyi silebilir',
        ]
        ,
        'DescriptionApiController' => [
            'icon'                              => 'fa fa-sticky-note-o',
            'title'                             => 'Veri Uzak Bağlantı İşlemleri',
            // routes
            'description_group'                    => 'Toplu İşlem',
            'description_group_desc'               => 'Bu izne sahip olanlar verilerin listelendiği sayfada toplu işlem yapabilir',
            'description_detail'                   => 'Detaylar',
            'description_detail_desc'              => 'Bu izne sahip olanlar verilerin listelendiği sayfada veri detayını görebilir',
            'description_fastEdit'                 => 'Hızlı Düzenleme Bilgileri',
            'description_fastEdit_desc'            => 'Bu izne sahip olanlar verilerin listelendiği sayfada hızlı düzenlemek amacıyla veri bilgilerini sayfaya getirebilir',
            'description_publish'                  => 'Hızlı Yayınlama',
            'description_publish_desc'             => 'Bu izne sahip olanlar verilerin listelendiği sayfada hızlı şekilde veri yayınlayabilir',
            'description_notPublish'               => 'Hızlı Yayından Kaldırma',
            'description_notPublish_desc'          => 'Bu izne sahip olanlar verilerin listelendiği sayfada hızlı şekilde veri yayından kaldırabilir',
            'description_removePhoto'              => 'Fotoğraf Silme',
            'description_removePhoto_desc'         => 'Bu izne sahip olanlar verilere ait fotoğrafları silebilir',
            'description_index'                    => 'Listeleme',
            'description_index_desc'               => 'Bu izne sahip olanlar verileri listeleyebilir',
            'description_category_description_index'  => 'Listeleme',
            'description_category_description_index_desc'=> 'Bu izne sahip olanlar belirli bir kategoriye ait verileri listeleyebilir',
            'description_store'                    => 'Hızlı Ekleme',
            'description_store_desc'               => 'Bu izne sahip olanlar verilerin listelendiği sayfada hızlı şekilde veri ekleyebilir',
            'description_update'                   => 'Hızlı Düzenleme',
            'description_update_desc'              => 'Bu izne sahip olanlar verilerin listelendiği sayfada veri bilgisini hızlı şekilde düzenleyebilir',
            'description_destroy'                  => 'Silme',
            'description_destroy_desc'             => 'Bu izne sahip olanlar veriyi silebilir',
        ]
    ],
];
