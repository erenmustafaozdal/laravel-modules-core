<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Menu Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the menus, naming is made with each routes' name
    'menu' => [
        'index'                     => 'Menü Yönetimi',
        'index_description'         => 'Sistem içindeki tüm menüler',
        'create'                    => 'Menü Ekle',
        'create_description'        => 'Yeni menü ekle',
        'edit'                      => 'Menü Düzenle',
        'edit_description'          => 'Menü bilgilerini düzenle',
    ],

    // menu
    'menus' => [
        'menu' => [
            'root'                  => 'Menü Yönetimi',
            'all'                   => 'Tüm Menüler',
            'add'                   => 'Menü Ekle',
        ],
    ],

    // fields
    'fields' => [
        'menu' => [
            'title'                 => 'Başlık',
            'link'                  => 'Bağlantı Adresi',
            'type'                  => 'Tip',
            'normal_menu'           => 'Normal Menü',
            'mega_menu'             => 'Mega Menü',
            'color'                 => 'Renk',
            'tooltip'               => 'İpucu',
            'label'                 => 'Etiket',
            'label_color'           => 'Etiket Rengi',
            'column_number'         => 'Sütun Sayısı',
            'photo'                 => 'Fotoğraf'
        ]
    ],

    // helpers
    'helpers' => [
        'menu' => [
            'not_have_child'    => '<h3>Gösterilecek menü yok. <small>Yeni bir tane ekleyerek başlayabilirsin.</small> </h3> <p>Yeni menü eklemek için sağ üst tarafta bulunan <a class="btn green btn-sm btn-outline" href="javascript:;"> <i class="fa fa-plus-square"></i> Yeni Ekle </a> tuşuna tıkla.</p>',
            'menu_index'        => '<ul>' .
                    '<li>Bu sayfada hızlı bir şekilde eklediğin menüler, sadece isim olarak eklenir. Bağlantı adresi ve diğer özellikleri düzenlemek için <span class="label label-info">Düzenleme</span> sayfasına gitmelisin.</li>' .
                    '<li>Mega menüler başka bir menünün altına taşındığında, <span class="text-danger">içinde bulundurduğu bütün sütunları ve menüleri kaybeder</span>. Normal menü haline gelir.</li>' .
                '</ul>',
            'link'              => 'Bağlantı adresi belirle. Yanda bulunan modüllerden bağlantı adresini kopyala ve buraya yapıştır',
            'type'              => 'Menünün tipini belirle',
            'tooltip'           => 'Menünün üzerinde baloncuk seklinde görünecek ipucu. En fazla <span class="label label-info">6</span> karakter olabilir.',
            'label'             => 'Mega menü yanında tanımlayıcı bir etiket metni.',
        ],
        'page'          => 'Tek başına bir sayfanın gösterildiği bağlantı adresleri',
        'document'      => 'Bütün belgelerin gösterildiği bağlantı adresleri',
        'description'   => 'Bütün verilerin gösterildiği bağlantı adresleri',
        'media'         => 'Bütün medyaların gösterildiği bağlantı adresleri',
        'dealer'        => 'Bütün bayilerin gösterildiği bağlantı adresleri',
        'team'          => 'Bütün personellerin gösterildiği bağlantı adresleri',
        'product'       => 'Bütün ürünlerin veya yalnız bir ürünün gösterildiği bağlantı adresleri',
        'contact'       => 'İletişim sayfası bağlantı adresi',
        'company'       => 'Firma profili sayfası bağlantı adresi',
    ],

    // flash messages
    'flash' => [
        'column_update_error'   => 'Mega menülerin sütunları düzenlenemez!',
    ],

    // permissions
    'permission' => [
        'MenuController' => [
            'icon'                              => 'fa fa-bars',
            'title'                             => 'Menü İşlemleri',
            // routes
            'menu_index'        => 'Menüler Sayfası',
            'menu_index_desc'   => 'Bu izne sahip olanlar menülerin listelendiği sayfaya gidebilir',
            'menu_edit'         => 'Düzenleme Sayfası',
            'menu_edit_desc'    => 'Bu izne sahip olanlar menü düzenleme sayfasına gidebilir',
            'menu_update'       => 'Düzenleme',
            'menu_update_desc'  => 'Bu izne sahip olanlar menüyü düzenleyebilir',
        ]
    ]
];
