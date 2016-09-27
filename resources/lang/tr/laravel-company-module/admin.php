<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Company Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the companys, naming is made with each routes' name
    'company' => [
        'edit'                      => 'Firma Profili',
        'edit_description'          => 'Firma Profili bilgilerini düzenle',
    ],

    // menu
    'menu' => [
        'company' => [
            'root'                  => 'Firma Profili'
        ],
    ],

    // fields
    'fields' => [
        'company' => [
            'title'                 => 'Sayfa Başlığı',
            'slug'                  => 'Adres Tanımlama',
            'company_profile'       => 'Firma Profili',
            'mission'               => 'Misyon',
            'vision'                => 'Vizyon',
            'meta_title'            => 'SEO Başlık',
            'meta_description'      => 'SEO Açıklama',
            'meta_keywords'         => 'SEO Anahtar Kelimeler',
            'photo'                 => 'Fotoğraf',
            'value_title'           => 'Değer/Kalite Yönetimi Başlığı',
            'value'                 => 'Değer/Kalite Yönetimi',

            'company_profile_info'  => 'Firma Profili',
            'mission_vision_info'   => 'Misyon & Vizyon',

            'add_value'             => 'Yeni Değer/Kalite Yönetimi Ekle',
            'remove_value'          => 'Değeri/Kalite Yönetimini Sil'
        ]
    ],

    // helpers
    'helpers' => [
        'company' => [
            'slug'                  => 'Benzersiz bir internet adresi tanımlaması yap. Tanımlama yaparken <em class="label label-warning">Türkçe karakterler</em> kullanmayın. İzin verilen karakterler: <em class="label label-info">büyük küçük harfler (A-Z)</em>, <em class="label label-info">rakamlar (0-9)</em>, <em class="label label-info">tire (-)</em> ve <em class="label label-info">alt tire (_)</em>. Bu alanı boş bırakırsan; sistem otomatik olarak üretecektir.',
            'company_profile'       => 'Firma profilini yaz.',
            'mission'               => 'Firma misyonunu yaz.',
            'vision'                => 'Firma vizyonunu yaz.',
            'photo'                 => '{0} İlişkili fotoğraf ekle. İstersen bu fotoğrafı ekledikten sonra kırpabilirsin. |[1,Inf] Fotoğraflar Ekle',
            'value_title'           => 'Firmanının her hangi bir değerinin/kalite yönetiminin başlığını yaz.',
            'value'                 => 'Firmanının her hangi bir değerini/kalite yönetimini yaz.',
            'meta_title'            => 'Arama motorlarını bilgilendirmek amacıyla içerik başlığı yazın.',
            'meta_description'      => 'Arama motorlarını bilgilendirmek amacıyla içerik açıklaması yazın.',
            'meta_keywords'         => 'Arama motorlarını bilgilendirmek amacıyla içerik ile ilgili anahtar kelimeler yazın. Anahtar kelimeler arasına <em class="label label-info">virgül (,)</em> koyun.',
        ]
    ],

    // permissions
    'permission' => [
        'CompanyController' => [
            'icon'                              => 'fa fa-building',
            'title'                             => 'Firma Profili İşlemleri',
            // routes
            'company_edit'                     => 'Düzenleme Sayfası',
            'company_edit_desc'                => 'Bu izne sahip olanlar firma profili düzenleme sayfasına gidebilir',
            'company_update'                   => 'Düzenleme',
            'company_update_desc'              => 'Bu izne sahip olanlar firma profilini düzenleyebilir',
        ]
    ]
];
