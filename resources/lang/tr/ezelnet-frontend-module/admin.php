<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Ezelnet Frontend mmodule language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the frontends, naming is made with each routes' name
    'design_management' => [
        'logo'                      => 'Logo-Favicon Yönetimi',
        'logo_description'          => 'Logo ve favicon düzenle',
        'site_color'                => 'Site Renk Düzenlemesi',
        'site_color_description'    => 'Sitede kullanılan renkleri düzenle',
        'menu_styles'               => 'Menü Stilleri',
        'menu_styles_description'   => 'Menü stili belirle ve renkli bantı düzenle',
        'top_box_order'             => 'Renkli Bant Düzeni',
        'footer_color'              => 'Footer Renk Ayarları',
        'footer_color_description'  => 'Footerda kullanılan renkleri düzenle',
        'default_design'            => 'Default Tasarım Ayarları',
        'default_design_description'=> 'Default renklerine geri dön veya kullandığın renkleri default olarak kaydet',
    ],
    'general_configs' => [
        'social_accounts'           => 'Sosyal Medya Hesapları',
        'social_accounts_description'=> 'Sosyal medya hesaplarını düzenle',
        'footer_edits'              => 'Footer Düzenlemeleri',
        'footer_edits_description'  => 'Footer bölümünü düzenle',
        'fast_management'           => 'Hızlı Yönetim',
        'fast_management_description'=> 'Hızlı yönetim için istediğin menüleri sık kullanılanlar olarak ekle',
        'contact_info'              => 'İletişim Bilgisi',
        'contact_info_description'  => 'İletişim bilgilerini düzenle',
    ],
    'page_management' => [
        'home'                      => 'Ana Sayfa Yönetimi',
        'home_description'          => 'Ana Sayfa\'yı yönet',
        'company'                   => 'Firma Profili Yönetimi',
        'company_description'       => 'Firma Profili\'ni yönet',
    ],
    'frontend' => [
        'home'                      => 'Ana Sayfa',
        'company'                   => 'Firma Profili'
    ],

    // menu
    'menu' => [
        'design_management' => [
            'root'                  => 'Tasarım Yönetimi',
            'logo'                  => 'Logo-Favicon Ayarları',
            'site_color'            => 'Site Renk Düzenlemesi',
            'menu_styles'           => 'Menü Stilleri',
            'footer_color'          => 'Footer Renk Ayarları',
            'default_design'        => 'Default Tasarım Ayarları',
        ],
        'general_configs' => [
            'root'                  => 'Genel Ayarlar',
            'social_accounts'       => 'Sosyal Medya Hesapları',
            'footer_edits'          => 'Footer Düzenlemeleri',
            'fast_management'       => 'Hızlı Yönetim',
            'contact_info'          => 'İletişim Bilgisi',
        ],
        'page_management' => [
            'root'                  => 'Sayfa Yönetimleri',
            'home'                  => 'Ana Sayfa Yönetimi',
            'enterprise' => [
                'root'              => 'Kurumsal',
                'company'           => 'Firma Profili',
            ]
        ],
    ],

    // fields
    'fields' => [
        'design_management' => [
            // logo
            'current_logo'          => 'Geçerli Logo',
            'logo'                  => 'Logo',
            'current_favicon'       => 'Geçerli Favicon',
            'favicon'               => 'Favicon',

            // site color and footer color
            'site_first_color'      => 'Site Birincil Rengi',
            'site_second_color'     => 'Site İkincil Rengi',
            'site_complement_color' => 'Site Tamamlayıcı Rengi',
            'hover_color'           => 'Hover Rengi',
            'first_footer_color'    => 'Birinci (Üst) Footer Rengi',
            'second_footer_color'   => 'İkinci (Alt) Footer Rengi',
            'footer_title_color'    => 'Footer Başlık Rengi',
            'footer_text_color'     => 'Footer Metin Rengi',
            'ezelnet_link_color'    => 'Ezelnet Link Rengi',
            'go_up_color'           => '<em>"Yukarı Çık"</em> Buton Rengi',

            // menu styles
            'hidden_fixed'          => 'Hidden Fixed Menü',
            'soft_fixed'            => 'Soft Fixed Menü',
            'double_fixed_hidden'   => 'Double Fixed Hidden Menü',
            'double_fixed'          => 'Double Fixed Menü',
            'double'                => 'Double Menü',

            // top box
            'components'            => 'Bileşenler',
            'top_box_left'          => 'Renkli Bant Sol',
            'top_box_right'         => 'Renkli Bant Sağ',
            'phone'                 => 'Telefon',
            'phone_icon'            => 'fa fa-phone',
            'email'                 => 'E-posta',
            'email_icon'            => 'fa fa-envelope',
            'social_accounts'       => 'Sosyal Hesaplar',
            'social_accounts_icon'  => 'fa fa-facebook',

            // default design
            'default_colors'        => 'Default Renkler',
            'current_colors'        => 'Geçerli Renkler',
            'save_as_default'       => 'Default Olarak Kaydet',
            'back_to_default'       => 'Default Renklere Geri Dön',
        ],
        'general_configs' => [
            // footer edits
            'footer_title'          => 'Footer Bölüm Başlığı',
            'is_active'             => 'Aktif mi?',
            'has_social_media'      => 'Sosyal Medya bulunsun mu?',
            'footer_content'        => 'Footer İçeriği',
            'links'                 => 'Bağlantılar',
            'description'           => 'Açıklama',
            'link_title'            => 'Bağlantı Metni',
            'link'                  => 'Bağlantı',

            // contact info
            'phone'                 => 'Telefon',
            'email'                 => 'E-posta'
        ],
        'page_management' => [
            'enable_sortable'       => 'Sıralamayı Aç',
            'disable_sortable'      => 'Sıralamayı Kapat',
            'save_sortable'         => 'Sıralamayı Kaydet',
            'auto_play'             => 'Slider otomatik oynatılsın mı?',
            'is_revert'             => 'Ürün imajı dönme efekti aktif olsun mu?',
            'order_type'            => 'Veriler nasıl sıralansın?',
            'item_type'             => 'Veriler nereden alınsın?',
            'items_type'            => 'Hangi veriler alınsın?',
            'link'                  => 'Bağlantı Adresi',
            'title'                 => 'Bölüm Başlığı',
            'is_active'             => 'Bölüm aktifleştirilsin mi?',
            'background_photo'      => 'Arka Plan Fotoğrafı',
            'ad_big_image'          => 'Reklam Banner Büyük Fotoğraf',
            'ad_small_image'        => 'Reklam Banner Küçük Fotoğraf',
            'item_visible'          => 'Neler görünsün?'
        ],
        'frontend' => [
            'language'              => 'Dil',
            'menu'                  => 'Menü',
            'phone'                 => 'Telefon',
            'see_all'               => 'Tümünü Gör',
            'review'                => 'İncele'
        ]
    ],

    // helpers
    'helpers' => [
        'page_management' => [
            'root'          => '<button type="button" class="btn green btn-outline">' .
                '<i class="fa fa-floppy-o"></i>' .
                '<span class="hidden-xs"> Sıralamayı Kaydet </span>' .
                '</button> tuşu ile kayıt işlemi sırasında bölümlerin <span class="label label-info">başlıkları</span>, <span class="label label-info">aktif olup olmadıkları</span> da kaydedilir.',
            'image_banner'  => 'En az <span class="label label-info">2</span>, en fazla <span class="label label-info">12</span> imaj ekleyebilirsin. İmajlara link eklemek zorunlu değildir.',
            'advertisement_banner'=> 'Reklam Banner\'ın aktif olması için iki imajın da yüklenmesi gerekiyor.',
            'not_options'  => 'Bu bölümün ayarları bulunmamaktadır.',
            'link'          => 'Veri ile alakalı bir internet adresi ekle. Bu alan zorunlu <em class="label label-warning">değildir</em>. Lütfen yazdığın internet adresinin başına <em class="label label-info">http://</em> veya <em class="label label-info">https://</em> eklemeyi unutma. <small class="text-muted">( Ör: http://siteadresi.com )</small> ',
            'item_visible'  => 'Görünenler <em class="label label-info">2</em> adet olmalı.'
        ],
        'design_management' => [
            // site color and footer color
            'site_complement_color' => 'Site <em class="label label-info">birincil</em> ve <em class="label label-info">ikincil</em> renklerin içinde, genelde <em class="text-info">metin rengi</em> olarak kullanılacak tamamlayıcı renk.',
            'hover_color'   => '<em class="label label-info">Linklerde</em> ve <em class="label label-info">butonlarda</em> <em class="text-info">fare üzerine geldiğinde</em> kullanılacak renk.',

            // menu styles
            'hidden_fixed'  => 'Bu menü stilinde "Renkli Bant" ince bir şerit şeklinde durur. Fare ile üzerine gelindiğinde açılır. Sayfada aşağı inildikçe <em class="text-info">Ana Menü</em> aşağı doğru kayar.',
            'soft_fixed'    => 'Bu menü stilinde "Renkli Bant" bulunmaz. Sayfada aşağı inildikçe <em class="text-info">Ana Menü</em> aşağı doğru kayar.',
            'double_fixed_hidden'=> 'Bu menü stilinde "Renkli Bant", "Ana Menü"nün <em class="label label-info">altında</em> ve açıktır. Sayfada aşağı inildikçe <em class="text-info">Ana Menü</em> aşağı doğru kayar.',
            'double_fixed'  => 'Bu menü stilinde "Renkli Bant", "Ana Menü"nün <em class="label label-info">üstünde</em> ve açıktır. Sayfada aşağı inildikçe <em class="text-info">Ana Menü</em> ve <em class="text-info">Renkli Bant</em> aşağı doğru kayar.',
            'double'        => 'Bu menü stilinde "Renkli Bant", "Ana Menü"nün <em class="label label-info">üstünde</em> ve açıktır. Sayfada aşağı inildikçe "Ana Menü" ve "Renkli Bant" <em class="text-danger">kaymaz</em>.',
            'top_box_components' => 'Bileşenleri sürükleyerek <em class="text-info">Renkli Bant</em>\'ın sol veya sağ bölümüne taşı. Daha sonra <button class="btn green btn-outline" type="button"><i class="fa fa-floppy-o"></i><span class="hidden-xs"> Kaydet </span></button> butonuna basarak düzeni kaydet.',
        ]
    ],

    // permissions
    'permission' => [
        'PageManagementController' => [
            'icon'                          => 'fa fa-files-o',
            'title'                         => 'Sayfa Yönetimi İşlemleri',
            // routes
            'page_management_home'          => 'Ana Sayfa Yönetimi',
            'page_management_home_desc'     => 'Bu izne sahip olanlar ana sayfayı yönetme sayfasına gidebilir',
        ]
    ]
];
