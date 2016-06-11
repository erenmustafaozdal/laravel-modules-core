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
        'show'                      => 'Yönetici Bilgileri'
    ],
    'role' => [
        'index'                     => 'Yönetici Rolleri',
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

    // operations
    'ops' => [
        'action'                    => 'Eylem',
        'select'                    => 'Seç...',
        'activate'                  => 'Aktifleştir',
        'not_activate'              => 'Aktifliği kaldır',
        'destroy'                   => 'Sil',
        'submit'                    => 'Gönder',
        'search'                    => 'Ara',
        'reset'                     => 'Temizle',
        'date_from'                 => 'Tarihinden',
        'date_to'                   => 'Tarihine',
    ],

    // fields
    'fields' => [
        'user' => [
            'id'                    => 'ID',
            'photo'                 => 'Fotoğraf',
            'first_name'            => 'Ad',
            'last_name'             => 'Soyad',
            'email'                 => 'E-posta',
            'password'              => 'Şifre',
            'password_comfirmation' => 'Şifre Onayı',
            'status'                => 'Durum',
            'last_login'            => 'Son Giriş',
            'created_at'            => 'Kayıt',
            'active'                => 'Aktif',
            'not_active'            => 'Aktif Değil',
            'is_active_help'        => 'Hesabını aktifleştir ve giriş yapmasına izin ver. Ya da şimdilik sadece bilgileri ekle.',
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
