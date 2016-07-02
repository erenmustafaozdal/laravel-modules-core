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
        'edit_description'          => ':user adlı yöneticinin bilgierini düzenle',
        'create'                    => 'Yönetici Ekle',
        'create_description'        => 'Yeni bir yönetici ekle',
        'show'                      => 'Yönetici Bilgileri',
        'show_description'          => ':user hakkında bilgiler'
    ],
    'role' => [
        'index'                     => 'Yönetici Rolleri',
        'index_description'         => 'Sistemde bulunan bütün yönetici rolleri',
        'edit'                      => 'Rol Düzenle',
        'edit_description'          => ':role rolü bilgierini düzenle',
        'create'                    => 'Rol Ekle',
        'create_description'        => 'Yeni bir yönetici rolü ekle',
        'show'                      => 'Rol Bilgileri',
        'show_description'          => ':role rolü hakkında bilgiler'
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
            'roles'                 => 'Roller',
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
        ],
        'role' => [
            'name'                  => 'Rol Adı',
            'slug'                  => 'Tanımlama',
            'role_info'             => 'Rol Bilgileri',
            'permissions'           => 'İşlem İzinleri',
            'edit_permission'       => 'İzinleri Düzenle',
            'total_permission'      => 'Toplam işlem sayısı: :count',
            'permission_rate'       => 'İşlem izin oranı: %:rate',
            'permission_on'         => 'Açık',
            'permission_off'        => 'Kapalı',
            'permission_group_on'   => 'Grubu Aç',
            'permission_group_off'  => 'Grubu Kapat',
            'permission_all_on_off' => 'Hepsini Aç/Kapat',
        ]
    ],

    // helpers
    'helpers' => [
        'user' => [
            'is_active_help'        => 'Hesabın aktif olması, yöneticinin sistem içine girmesini sağlar. Hesabı aktif olmayan yöneticiler <em class="label label-info">Yönetim Paneli</em>\'ne giriş yapamaz.',
            'roles_help'            => 'Roller yöneticinin role ait izinleri üzerine alması anlamına gelir. Birden fazla rol seçebilirsin. Bunun için; kutucuğa tıkla ve yazmaya başla...',
            'email_not_changeable'  => 'E-posta adresi değiştirilemez.'
        ],
        'role' => [
            'slug'                  => 'Benzersiz bir tanımlama yapın. Tanımlama yaparken <em class="label label-warning">Türkçe karakterler</em> kullanmayın. İzin verilen karakterler: <em class="label label-info">büyük küçük harfler (A-Z)</em>, <em class="label label-info">rakamlar (0-9)</em>, <em class="label label-info">tire (-)</em> ve <em class="label label-info">alt tire (_)</em>. Bu alanı boş bırakırsan; sistem otomatik olarak üretecektir.'
        ]
    ],

    // permissions
    'permission' => [
        'RoleController' => [
            'icon'                  => 'fa fa-users',
            'title'                 => 'Yönetici Rolü İşlemleri',
            // routes
            'role_index'            => 'Roller Sayfası',
            'role_index_desc'       => 'Bu izne sahip olanlar yönetici rollerinin listelendiği sayfaya gidebilir',
            'role_create'           => 'Ekle Sayfası',
            'role_create_desc'      => 'Bu izne sahip olanlar yönetici rolü ekleme sayfasına gidebilir',
            'role_store'            => 'Ekleme',
            'role_store_desc'       => 'Bu izne sahip olanlar yönetici rolü ekleyebilir',
            'role_show'             => 'Bilgiler Sayfası',
            'role_show_desc'        => 'Bu izne sahip olanlar yönetici rolünün bilgilerini görüntüleyebilir',
            'role_edit'             => 'Düzenleme Sayfası',
            'role_edit_desc'        => 'Bu izne sahip olanlar yönetici rolü bilgilerini düzenleme sayfasına gidebilir',
            'role_update'           => 'Düzenleme',
            'role_update_desc'      => 'Bu izne sahip olanlar yönetici rolü bilgilerini düzenleyebilir',
            'role_destroy'          => 'Silme',
            'role_destroy_desc'     => 'Bu izne sahip olanlar yönetici rolü silebilir',
        ],
        'RoleApiController' => [
            'icon'                  => 'fa fa-users',
            'title'                 => 'Yönetici Rolü Uzak Bağlantı İşlemleri',
            // routes
            'role_models'           => 'Rolleri Listeleme',
            'role_models_desc'      => 'Bu izne sahip olanlar yönetici rollerini bazı seçim kutularında listeleyebilir',
            'role_group'            => 'Toplu İşlem',
            'role_group_desc'       => 'Bu izne sahip olanlar yönetici rollerinin listelendiği sayfada toplu işlem yapabilir',
            'role_detail'           => 'Detaylar',
            'role_detail_desc'      => 'Bu izne sahip olanlar yönetici rollerinin listelendiği sayfada rol detayını görebilir',
            'role_fastEdit'         => 'Hızlı Düzenleme Bilgileri',
            'role_fastEdit_desc'    => 'Bu izne sahip olanlar yönetici rollerinin listelendiği sayfada hızlı düzenlemek amacıyla rol bilgilerini sayfaya getirebilir',
            'role_index'            => 'Listeleme',
            'role_index_desc'       => 'Bu izne sahip olanlar yönetici rollerini listeleyebilir',
            'role_store'            => 'Hızlı Ekleme',
            'role_store_desc'       => 'Bu izne sahip olanlar yönetici rollerinin listelendiği sayfada hızlı şekilde rol ekleyebilir',
            'role_update'           => 'Hızlı Düzenleme',
            'role_update_desc'      => 'Bu izne sahip olanlar yönetici rollerinin listelendiği sayfada rol bilgisini hızlı şekilde düzenleyebilir',
            'role_destroy'          => 'Silme',
            'role_destroy_desc'     => 'Bu izne sahip olanlar yönetici rolü silebilir',
        ],
        'UserController' => [
            'icon'                  => 'fa fa-user',
            'title'                 => 'Yönetici İşlemleri',
            // routes
            'user_changePassword'   => 'Şifre Güncelleme',
            'user_changePassword_desc'=> 'Bu izne sahip olanlar yöneticinin şifresini güncelleyebilir',
            'user_permission'       => 'İşlem İzinleri Güncelleme',
            'user_permission_desc'  => 'Bu izne sahip olanlar yöneticinin işlemlere ait izinlerini güncelleyebilir',
            'user_index'            => 'Yöneticiler Sayfası',
            'user_index_desc'       => 'Bu izne sahip olanlar yöneticilerin listelendiği sayfaya gidebilir',
            'user_create'           => 'Ekle Sayfası',
            'user_create_desc'      => 'Bu izne sahip olanlar yönetici ekleme sayfasına gidebilir',
            'user_store'            => 'Ekleme',
            'user_store_desc'       => 'Bu izne sahip olanlar yönetici ekleyebilir',
            'user_show'             => 'Bilgiler Sayfası',
            'user_show_desc'        => 'Bu izne sahip olanlar yönetici bilgilerini görüntüleyebilir',
            'user_edit'             => 'Düzenleme Sayfası',
            'user_edit_desc'        => 'Bu izne sahip olanlar yönetici bilgilerini düzenleme sayfasına gidebilir',
            'user_update'           => 'Düzenleme',
            'user_update_desc'      => 'Bu izne sahip olanlar yönetici bilgilerini düzenleyebilir',
            'user_destroy'          => 'Silme',
            'user_destroy_desc'     => 'Bu izne sahip olanlar yöneticiyi silebilir',
        ]
        ,
        'UserApiController' => [
            'icon'                  => 'fa fa-user',
            'title'                 => 'Yönetici Uzak Bağlantı İşlemleri',
            // routes
            'user_group'            => 'Toplu İşlem',
            'user_group_desc'       => 'Bu izne sahip olanlar yöneticilerin listelendiği sayfada toplu işlem yapabilir',
            'user_detail'           => 'Detaylar',
            'user_detail_desc'      => 'Bu izne sahip olanlar yöneticilerin listelendiği sayfada yönetici detayını görebilir',
            'user_fastEdit'         => 'Hızlı Düzenleme Bilgileri',
            'user_fastEdit_desc'    => 'Bu izne sahip olanlar yöneticilerin listelendiği sayfada hızlı düzenlemek amacıyla yönetci bilgilerini sayfaya getirebilir',
            'user_activate'         => 'Aktifleştirme',
            'user_activate_desc'    => 'Bu izne sahip olanlar yöneticinin hesabını aktifleştirebilir',
            'user_notActivate'      => 'Aktifliği Kaldırma',
            'user_notActivate_desc' => 'Bu izne sahip olanlar yöneticinin hesabını aktifliğini kaldırabilir',
            'user_avatarPhoto'      => 'Fotoğraf Yükleme',
            'user_avatarPhoto_desc' => 'Bu izne sahip olanlar yöneticinin profil fotoğrafını değiştirebilir',
            'user_destroyAvatar'    => 'Fotoğraf Silme',
            'user_destroyAvatar_desc'=> 'Bu izne sahip olanlar yöneticinin profil fotoğrafını silip, varsayılan profil fotoğrafını aktif hale getirebilir',
            'user_index'            => 'Listeleme',
            'user_index_desc'       => 'Bu izne sahip olanlar yöneticileri listeleyebilir',
            'user_store'            => 'Hızlı Ekleme',
            'user_store_desc'       => 'Bu izne sahip olanlar yöneticilerin listelendiği sayfada hızlı şekilde yönetici ekleyebilir',
            'user_update'           => 'Hızlı Düzenleme',
            'user_update_desc'      => 'Bu izne sahip olanlar yöneticilerin listelendiği sayfada yönetici bilgisini hızlı şekilde düzenleyebilir',
            'user_destroy'          => 'Silme',
            'user_destroy_desc'     => 'Bu izne sahip olanlar yöneticiyi silebilir',
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
