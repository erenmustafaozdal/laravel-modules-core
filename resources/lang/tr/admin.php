<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Modules Core language lines for admin panel
    |--------------------------------------------------------------------------
    */

    // globals
    'welcome'                               => 'Hoş geldin',
    'title'                                 => 'Yönetim',
    'profile'                               => 'Profil',
    'logout'                                => 'Çıkış yap',
    'actions'                               => 'Eylemler',
    // theme toolbar
    'toolbar' => [
        'title'                             => 'Tema ayarları',
        'theme' => [
            'title'                         => 'Tema',
            'dark_header'                   => 'Koyu renk başlık',
            'light_header'                  => 'Açık renk başlık',
            'green_header'                  => 'Yeşil renk başlık',
        ],
        'layout' => [
            'title'                         => 'Düzen',
            'layout_label'                  => 'Yerleşim',
            'layout_fluid'                  => 'Tam genişlik',
            'layout_boxed'                  => 'Kutu modeli',
            'header_label'                  => 'Başlık',
            'header_fixed'                  => 'Kayan',
            'header_default'                => 'Varsayılan',
            'dropdown_label'                => 'Açılan menüler',
            'dropdown_light'                => 'Açık renk',
            'dropdown_dark'                 => 'Koyu renk',
            'sidebar_mode_label'            => 'Yan menü modu',
            'sidebar_mode_fixed'            => 'Kayan',
            'sidebar_mode_default'          => 'Varsayılan',
            'sidebar_menu_label'            => 'Yan menü',
            'sidebar_menu_accordion'        => 'Akordiyon',
            'sidebar_menu_hover'            => 'Üzerine gelme',
            'sidebar_position_label'        => 'Yan menü pozisyonu',
            'sidebar_position_left'         => 'Sol',
            'sidebar_position_right'        => 'Sağ',
            'footer_label'                  => 'Alt bilgi',
            'footer_fixed'                  => 'Kayan',
            'footer_default'                => 'Varsayılan',
        ],
    ],

    // operations
    'ops' => [
        // actions
        'action'                            => 'Eylem',
        'select'                            => 'Seç...',
        'browse'                            => 'Bilgisayardan Yükle',
        'status'                            => 'Durum',
        'yes'                               => 'Evet',
        'no'                                => 'Hayır',
        'activate'                          => 'Aktifleştir',
        'not_activate'                      => 'Aktifliği kaldır',
        'active'                            => 'Aktif',
        'not_active'                        => 'Pasif',
        'publish'                           => 'Yayınla',
        'not_publish'                       => 'Yayından kaldır',
        'published'                         => 'Yayında',
        'not_published'                     => 'Yayında Değil',
        'destroy'                           => 'Sil',
        'edit'                              => 'Düzenle',
        'show'                              => 'Göster',
        'destroy_confirmation'              => 'Kayıt silinecek! Emin misin?',
        'submit'                            => 'Gönder',
        'search'                            => 'Ara',
        'reset'                             => 'Temizle',
        'add'                               => 'Yeni Ekle',
        'fast_add'                          => 'Hızlı Ekle',
        'cancel'                            => 'İptal',
        'select_file'                       => 'Dosya Seç',
        'upload'                            => 'Yükle',
        'crop_image'                        => 'Fotoğrafı Kırp',
        'destroy_image'                     => 'Fotoğrafı Sil',
        'all'                               => 'Hepsi',
        'view_large'                        => 'Büyük Göster',
        'create_album'                      => 'Albüm Oluştur',
        'set_main_photo'                    => 'Ana Fotoğraf Yap',
        // description
        'date_from'                         => 'Tarihinden',
        'date_to'                           => 'Tarihine',
        'size_from'                         => 'Boyutundan',
        'size_to'                           => 'Boyutuna',
        'amount_from'                       => 'Fiyatından',
        'amount_to'                         => 'Fiyatına',
        // tools
        'tools'                             => 'Araçlar',
        'print'                             => 'Yazdır',
        'copy'                              => 'Kopyala',
        'pdf'                               => 'PDF',
        'excel'                             => 'Excel',
        'csv'                               => 'CSV',
        'reload'                            => 'Tekrar Yükle',
        // shortcuts
        'shortcut' => [
            'print'                         => 'Kısayol: (alt + shift + p)',
            'copy'                          => 'Kısayol: (alt + shift + c)',
            'pdf'                           => 'Kısayol: (alt + shift + d)',
            'excel'                         => 'Kısayol: (alt + shift + e)',
            'csv'                           => 'Kısayol: (alt + shift + v)',
            'reload'                        => 'Kısayol: (alt + shift + r)',
        ]
    ],

    // fields
    'fields' => [
        'id'                                => 'ID',
        'created_at'                        => 'Kayıt Tarihi',
        'created_at_description'            => ':date kaydedildi',
        'updated_at'                        => 'Güncelleme Tarihi',
        'updated_at_description'            => ':date güncellendi',

        'change_avatar'                     => 'Fotoğrafı Değiştir',
        'change_password'                   => 'Şifreyi Değiştir',

        'overview'                          => 'Genel Bilgiler',
        'edit_info'                         => 'Bilgileri Düzenle',
        'content_info'                      => 'İçerik Bilgisi',
        'seo'                               => 'SEO Bilgileri',
        'showcase'                          => 'Vitrin Bilgileri',
        'detail'                            => 'Detaylar',

        'file_manager'                      => 'Dosya Yöneticisi',
        'from_file_manager'                 => 'Dosya Yöneticisinden Ekle',
        'size'                              => 'Boyut',
        'byte'                              => 'Bayt',

        'current_photo'                     => '[0,1] Geçerli Fotoğraf |[2,Inf] Geçerli Fotoğraflar',
        'main_photo'                        => 'Ana Fotoğraf',
    ],

    // helpers
    'helpers' => [
        'fileinput'     => 'Dosyayı bilgisayarından yükle. İstersen fotoğrafların kırpılmasını istediğin kısmını seç. <span class="text-danger">Diğer seçeneği seçtiğinde burada yaptığın değişiklikler sıfırlanacak.</span>',
        'elfinder'      => 'Dosyayı <em class="label label-info">Dosya Yöneticisi</em>\'ni kullanarak ekle. Bu seçenek ile eklenecek dosyaların üzerinde her hangi bir değişiklik (kırpma vb) yapılamaz. <span class="text-danger">Diğer seçeneği seçtiğinde burada yaptığın değişiklikler sıfırlanacak.</span>'
    ],

    // permissions
    'permission' => [
        'ThemeController' => [
            'icon'                          => 'fa fa-pencil',
            'title'                         => 'Yönetim Paneli Tema İşlemleri',
            // routes
            'themeLayout_change'            => 'Yönetim Paneli Yerleşimi',
            'themeLayout_change_desc'       => 'Bu izne sahip olanlar yönetim panelinin yerleşim düzenini değiştirebilir',
            'themeColor_change'             => 'Yönetim Paneli Rengi',
            'themeColor_change_desc'        => 'Bu izne sahip olanlar yönetim panelinin rengini değiştirebilir'
        ]
    ],
];
