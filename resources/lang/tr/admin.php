<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Modules Core language lines for admin panel
    |--------------------------------------------------------------------------
    */

    // globals
    'welcome'                           => 'Hoş geldin',
    'title'                             => 'Yönetim',
    'profile'                           => 'Profil',
    'logout'                            => 'Çıkış yap',
    'actions'                           => 'Eylemler',
    // theme toolbar
    'toolbar' => [
        'title'                         => 'Tema ayarları',
        'theme' => [
            'title'                     => 'Tema',
            'dark_header'               => 'Koyu renk başlık',
            'light_header'              => 'Açık renk başlık',
            'green_header'              => 'Yeşil renk başlık',
        ],
        'layout' => [
            'title'                     => 'Düzen',
            'layout_label'              => 'Yerleşim',
            'layout_fluid'              => 'Tam genişlik',
            'layout_boxed'              => 'Kutu modeli',
            'header_label'              => 'Başlık',
            'header_fixed'              => 'Kayan',
            'header_default'            => 'Varsayılan',
            'dropdown_label'            => 'Açılan menüler',
            'dropdown_light'            => 'Açık renk',
            'dropdown_dark'             => 'Koyu renk',
            'sidebar_mode_label'        => 'Yan menü modu',
            'sidebar_mode_fixed'        => 'Kayan',
            'sidebar_mode_default'      => 'Varsayılan',
            'sidebar_menu_label'        => 'Yan menü',
            'sidebar_menu_accordion'    => 'Akordiyon',
            'sidebar_menu_hover'        => 'Üzerine gelme',
            'sidebar_position_label'    => 'Yan menü pozisyonu',
            'sidebar_position_left'     => 'Sol',
            'sidebar_position_right'    => 'Sağ',
            'footer_label'              => 'Alt bilgi',
            'footer_fixed'              => 'Kayan',
            'footer_default'            => 'Varsayılan',
        ],
    ],

    // operations
    'ops' => [
        // actions
        'ok'                            => 'Tamam',
        'action'                        => 'Eylem',
        'select'                        => 'Seç...',
        'browse'                        => 'Bilgisayardan Yükle',
        'status'                        => 'Durum',
        'yes'                           => 'Evet',
        'no'                            => 'Hayır',
        'activate'                      => 'Aktifleştir',
        'not_activate'                  => 'Aktifliği kaldır',
        'active'                        => 'Aktif',
        'not_active'                    => 'Pasif',
        'publish'                       => 'Yayınla',
        'not_publish'                   => 'Yayından kaldır',
        'published'                     => 'Yayında',
        'not_published'                 => 'Yayında Değil',
        'destroy'                       => 'Sil',
        'edit'                          => 'Düzenle',
        'show'                          => 'Göster',
        'destroy_confirmation'          => 'Kayıt silinecek! Emin misin?',
        'submit'                        => 'Gönder',
        'search'                        => 'Ara',
        'reset'                         => 'Temizle',
        'add'                           => 'Yeni Ekle',
        'fast_add'                      => 'Hızlı Ekle',
        'cancel'                        => 'İptal',
        'select_file'                   => 'Dosya Seç',
        'upload'                        => 'Yükle',
        'crop_image'                    => 'Fotoğrafı Kırp',
        'destroy_image'                 => 'Fotoğrafı Sil',
        'all'                           => 'Hepsi',
        'view_large'                    => 'Büyük Göster',
        'create_album'                  => 'Albüm Oluştur',
        'set_main_photo'                => 'Ana Fotoğraf Yap',
        // description
        'date_from'                     => 'Tarihinden',
        'date_to'                       => 'Tarihine',
        'size_from'                     => 'Boyutundan',
        'size_to'                       => 'Boyutuna',
        'amount_from'                   => 'Fiyatından',
        'amount_to'                     => 'Fiyatına',
        // tools
        'tools'                         => 'Araçlar',
        'print'                         => 'Yazdır',
        'copy'                          => 'Kopyala',
        'pdf'                           => 'PDF',
        'excel'                         => 'Excel',
        'csv'                           => 'CSV',
        'reload'                        => 'Tekrar Yükle',
        // shortcuts
        'shortcut' => [
            'print'                     => 'Kısayol: (alt + shift + p)',
            'copy'                      => 'Kısayol: (alt + shift + c)',
            'pdf'                       => 'Kısayol: (alt + shift + d)',
            'excel'                     => 'Kısayol: (alt + shift + e)',
            'csv'                       => 'Kısayol: (alt + shift + v)',
            'reload'                    => 'Kısayol: (alt + shift + r)',
        ]
    ],

    // fields
    'fields' => [
        'modules'                       => 'Modüller',
        'not_permission'                => 'Yetkin Yok',

        'id'                            => 'ID',
        'created_at'                    => 'Kayıt Tarihi',
        'created_at_description'        => ':date kaydedildi',
        'updated_at'                    => 'Güncelleme Tarihi',
        'updated_at_description'        => ':date güncellendi',
        'add_value'                     => 'Yeni Ekle',
        'remove_value'                  => 'Sil',
        'date'                          => 'Tarih',

        'change_avatar'                 => 'Fotoğrafı Güncelle',
        'change_password'               => 'Şifreyi Güncelle',
        'edit_info'                     => 'Bilgileri Güncelle',
        'change_seo'                    => 'SEO Güncelle',
        'change_showcase'               => 'Vitrinleri Güncelle',
        'change_map'                    => 'Harita Güncelle',
        'change_descriptions'           => 'Ek Açıklamaları Güncelle',

        'configs'                       => 'Ayarları',
        'category_configs'              => 'Kategori Ayarları',
        'datatable_configs'             => 'Veri Tablosu Ayarları',
        'other_configs'                 => 'Diğer Ayarlar',
        'photo_configs'                 => 'Fotoğraf Ayarları',
        'extra_columns'                 => 'Ekstra Veriler',

        'overview'                      => 'Genel Bilgiler',
        'content_info'                  => 'İçerik Bilgisi',
        'seo'                           => 'SEO Bilgileri',
        'showcase'                      => 'Vitrin Bilgileri',
        'detail'                        => 'Detaylar',
        'location'                      => 'Konum Bilgileri',
        'descriptions'                  => 'Ek Açıklamalar',

        'file_manager'                  => 'Dosya Yöneticisi',
        'from_file_manager'             => 'Dosya Yöneticisinden Ekle',
        'size'                          => 'Boyut',
        'byte'                          => 'Bayt',

        'current_photo'                 => '[0,1] Geçerli Fotoğraf |[2,Inf] Geçerli Fotoğraflar',
        'main_photo'                    => 'Ana Fotoğraf',

        'province_id'                   => 'İl',
        'county_id'                     => 'İlçe',
        'district_id'                   => 'Semt',
        'neighborhood_id'               => 'Mahalle',
        'postal_code_id'                => 'Posta Kodu',

        'latitude'                      => 'Enlem',
        'longitude'                     => 'Boylam',
        'zoom'                          => 'Harita Yakınlığı',
        'zoom_info'                     => '<small class="text-muted">(1 ile 20 arası)</small>',

        'datatable_filter'              => 'Verilere Filtreleme işlemi yapılsın mı?',
        'datatable_tools'               => 'Verilerin listeleri üzerinde çeşitli araçlar çalıştırılsın mı?',
        'datatable_fast_add'            => 'Verilerin listelendiği sayfada hızlı ekleme işlemi yapılsın mı?',
        'datatable_group_action'        => 'Verilerin listelendiği sayfada çoklu grup işlemi yapılsın mı?',
        'datatable_detail'              => 'Verilerin detay bilgileri veri tablosu üzerinde gösterilsin mi?',

        'description_is_editor'         => 'Açıklama Editör Olsu mu?',
        'config_propagation'            => 'Ayarlar Alt Kategorilerde de Geçerli Olsun mu?',

        'aspect_ration_width'           => 'Kategoride Bulunacak Fotoğrafların Genişliği',
        'aspect_ration_height'          => 'Kategoride Bulunacak Fotoğrafların Yüksekliği',
        'thumbnails'                    => 'Küçük Fotoğraflar',
        'thumbnail_slug'                => 'Küçük Fotoğraf Tanımlaması',
        'thumbnail_width'               => 'Küçük Fotoğraf Genişliği',
        'thumbnail_height'              => 'Küçük Fotoğraf Yüksekliği',
        'pixel'                         => 'px <small>(piksel)</small>',
        'square_crop'                   => 'Kare Kırp',
        'vertical_crop'                 => 'Dikey Dikdörtgen Kırp',
        'horizontal_crop'               => 'Yatay Dikdörtgen Kırp',

        'extra_name'                    => 'Ekstra Veri Adı',
        'extra_type'                    => 'Ekstra Veri Tipi',

        'text_input'                    => 'Metin Alanı',
        'date_input'                    => 'Tarih Alanı',

        'description'                   => 'Açıklama',
        'title'                         => 'Başlık',

        'default'                       => 'Varsayılan',
        'dark_blue'                     => 'Koyu Mavi',
        'blue'                          => 'Mavi',
        'green'                         => 'Yeşil',
        'yellow'                        => 'Sarı',
        'red'                           => 'Kırmızı',

        'column'                        => 'Sütun',

        'facebook'                      => 'Facebook',
        'google'                        => 'Google',
        'twitter'                       => 'Twitter',
        'linkedin'                      => 'Linkedin',
    ],

    // helpers
    'helpers' => [
        'is_publish'        => 'Açıklamanın yayında olması, ziyaretçilerin açıklamayı görebilmesini sağlar. Yayında olmayan açıklamalar ziyaretçilere açık değildir.',
        'fileinput'         => 'Dosyayı bilgisayarından yükle. İstersen fotoğrafların kırpılmasını istediğin kısmını seç. <span class="text-danger">Diğer seçeneği seçtiğinde burada yaptığın değişiklikler sıfırlanacak.</span>',
        'elfinder'          => 'Dosyayı <em class="label label-info">Dosya Yöneticisi</em>\'ni kullanarak ekle. Bu seçenek ile eklenecek dosyaların üzerinde her hangi bir değişiklik (kırpma vb) yapılamaz. <span class="text-danger">Diğer seçeneği seçtiğinde burada yaptığın değişiklikler sıfırlanacak.</span>',
        'not_permission'    => 'Bu bağlantıyı kullanmaya yetkin yok!',
        'datatable_filter'  => 'Bu kategoride bulunan verilerin listelendiği sayfada, çeşitli alanlar kullanılarak arama ve filtreleme işlemi yapılsın mı?',
        'datatable_tools'   => 'Bu kategoride bulunan verilerin listelendiği sayfada, çeşitli araçlar <small>(yazdırma ve pdf,excel çıktı alma vb)</small> çalıştırılsın mı?',
        'datatable_fast_add'=> 'Bu kategoride bulunan verilerin listelendiği sayfada, açılan pencere üzerinden hızlı ekleme işlemi yapılsın mı?',
        'datatable_group_action'=> 'Bu kategoride bulunan verilerin listelendiği sayfada, çoklu grup işlemi <small>(toplu silme, yayınlama vb)</small> yapılsın mı?',
        'datatable_detail'  => 'Bu kategoride bulunan verilerin listelendiği sayfadaki tablo üzerinde verinin detay bilgileri hızlı bir şekilde gösterilsin mi?',
        'description_is_editor'=> 'Bu kategoride bulunan verilerin açıklamaları editör ile yazılsın mı?',
        'config_propagation'=> 'Bu kategorinin alt kategorilerinde de bu ayarlar geçerli olsun mu?',
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
