<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel User Module language lines for admin panel
    |--------------------------------------------------------------------------
    */
    // Titles of the pages, naming is made with each routes' name
    'user' => [
        'index'                     => 'Yöneticiler',
        'index_description'         => 'Sistem içindeki bütün yöneticiler',
        'edit'                      => 'Yönetici Düzenle',
        'create'                    => 'Yönetici Ekle',
        'create_description'        => 'Yeni bir yönetici ekle',
        'show'                      => 'Yönetici Bilgileri',
        'show_description'          => ':user hakkında bilgiler'
    ],
    'role' => [
        'index'                     => 'Yönetici Rolleri',
        'index_description'         => 'Sistemde bulunan bütün yönetici rolleri',
        'edit'                      => 'Rol Düzenle',
        'create'                    => 'Rol Ekle',
        'show'                      => 'Rol Bilgileri'
    ],

    // menu
    'menu' => [
        'user' => [
            'root'                  => 'Yöneticiler',
            'all'                   => 'Tüm Yöneticiler',
            'add'                   => 'Yönetici Ekle'
        ],
        'role' => [
            'root'                  => 'Yönetici Rolleri',
            'all'                   => 'Tüm Roller',
            'add'                   => 'Rol Ekle'
        ],
    ],

    // fields
    'fields' => [
        'user' => [
            'photo'                 => 'Fotoğraf',
            'first_name'            => 'Ad',
            'last_name'             => 'Soyad',
            'email'                 => 'E-posta',
            'password'              => 'Şifre',
            'password_confirmation' => 'Şifre Onayı',
            'status'                => 'Durum',
            'last_login'            => 'Son Giriş',
            'last_login_description'=> ':date giriş yaptı',
            'active'                => 'Aktif',
            'active_user'           => 'Aktif yönetici',
            'not_active'            => 'Aktif Değil',
            'not_active_user'       => 'Aktif olmayan yönetici',

            'overview'              => 'Genel Bilgiler',
            'edit_info'             => 'Bilgileri Düzenle',
            'change_avatar'         => 'Fotoğrafı Değiştir',
            'change_password'       => 'Şifreyi Değiştir',
        ],
        'role' => [
            'name'                  => 'Rol Adı',
            'slug'                  => 'Tanımlama',
        ]
    ],

    // helpers
    'helpers' => [
        'user' => [
            'is_active_help'        => 'Hesabın aktif olması, yöneticinin sistem içine girmesini sağlar. Hesabı aktif olmayan yöneticiler <em class="label label-info">Yönetim Paneli</em>\'ne giriş yapamaz.',
            'email_not_changeable'  => 'E-posta adresi değiştirilemez.'
        ],
        'role' => [
            'slug'                  => 'Benzersiz bir tanımlama yapın. Tanımlama yaparken <em class="label label-warning">Türkçe karakterler</em> kullanmayın. İzin verilen karakterler: <em class="label label-info">büyük küçük harfler (A-Z)</em>, <em class="label label-info">rakamlar (0-9)</em>, <em class="label label-info">tire (-)</em> ve <em class="label label-info">alt tire (_)</em>. Bu alanı boş bırakırsan; sistem otomatik olarak üretecektir.'
        ]
    ],

    // flash messages
    'flash' => [
        'store_success'             => 'Ekleme işlemi başarılı bir şekilde gerçekleşti.',
        'store_error'               => 'Ekleme işlemi gerçekleşmedi. Lütfen daha sonra dene!',
        'update_success'            => 'Düzenleme işlemi başarılı bir şekilde gerçekleşti.',
        'update_error'              => 'Düzenleme işlemi gerçekleşmedi. Lütfen daha sonra dene!',
    ]
];
