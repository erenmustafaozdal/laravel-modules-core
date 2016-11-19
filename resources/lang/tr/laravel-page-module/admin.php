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
        'edit_description'                  => ':page_category adlı sayfa kategorisinin bilgilerini düzenle',
        'create'                            => 'Sayfa Kategorisi Ekle',
        'create_description'                => 'Yeni bir sayfa kategorisi ekle',
        'show'                              => 'Sayfa Kategorisi Bilgileri',
        'show_description'                  => ':page_category hakkında bilgiler',
        'page' => [
            'index'                             => ':page_category Sayfalar',
            'index_description'                 => 'Bütün :page_category sayfalar',
            'edit'                              => ':page_category Sayfa Düzenle',
            'edit_description'                  => ':page_category sayfalarından :page sayfası bilgilerini düzenle',
            'create'                            => ':page_category Sayfa Ekle',
            'create_description'                => 'Yeni bir :page_category sayfa ekle',
            'show'                              => ':page_category/:page Sayfa Bilgileri',
            'show_description'                  => ':page_category sayfalarından :page sayfası hakkında bilgiler'
        ]
    ],
    'page' => [
        'index'                             => 'Sayfalar',
        'index_description'                 => 'Sistemde bulunan bütün sayfalar',
        'edit'                              => 'Sayfa Düzenle',
        'edit_description'                  => ':page sayfası bilgilerini düzenle',
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
            'name'                          => 'Kategori Adı',
        ],
        'page' => [
            'title'                         => 'Sayfa Başlığı',
            'slug'                          => 'Adres Tanımlama',
            'description'                   => 'Açıklama',
            'content'                       => 'İçerik',
            'meta_title'                    => 'SEO Başlık',
            'meta_description'              => 'SEO Açıklama',
            'meta_keywords'                 => 'SEO Anahtar Kelimeler',
        ]
    ],

    // helpers
    'helpers' => [
        'page_category' => [

        ],
        'page' => [
            'category_id_help'              => 'Sayfanın kategorisini seç. Bu alan <em class="label label-warning">zorunludur</em>.',
            'slug'                          => 'Benzersiz bir tanımlama yap. Tanımlama yaparken <em class="label label-warning">Türkçe karakterler</em> kullanmayın. İzin verilen karakterler: <em class="label label-info">büyük küçük harfler (A-Z)</em>, <em class="label label-info">rakamlar (0-9)</em>, <em class="label label-info">tire (-)</em> ve <em class="label label-info">alt tire (_)</em>. Bu alanı boş bırakırsan; sistem otomatik olarak üretecektir.',
            'meta_title_help'               => 'Arama motorlarını bilgilendirmek amacıyla içerik başlığı yazın.',
            'meta_description_help'         => 'Arama motorlarını bilgilendirmek amacıyla içerik açıklaması yazın.',
            'meta_keywords_help'            => 'Arama motorlarını bilgilendirmek amacıyla içerik ile ilgili anahtar kelimeler yazın. Anahtar kelimeler arasına <em class="label label-info">virgül (,)</em> koyun.',
            'is_publish_help'               => 'Sayfanın yayında olması, ziyaretçilerin sayfayı görebilmesini sağlar. Yayında olmayan sayfalar ziyaretçilere açık değildir.',
            'inline_edit_help'              => '<h4>Satır İçi Düzenleme</h4><p>Düzenlemeni satır içi yap. Düzenlemeni kaydetmek istediğinde, editörün araç çubuğundaki kaydet tuşuna bas.</p><p><small class="text-muted">Bu sayfada daha basit özelliklerle düzenleme yapabilirsin. Detaylı düzenleme için <em class="label label-sm label-info">Düzenle</em> sayfasına gitmelisin.</small></p>',
        ]
    ],
];
