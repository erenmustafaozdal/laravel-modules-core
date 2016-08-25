<?php

return [
    'menu' => [
        // add role
        [
            'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.add',
            'route'             => 'admin.role.create',
            'icon'              => 'icon-users',
            'access'            => 'admin.role.create',
            'active'            => 'admin.role.create'
        ],
        // add user
        [
            'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.add',
            'route'             => 'admin.user.create',
            'icon'              => 'icon-user-follow',
            'access'            => 'admin.user.create',
            'active'            => 'admin.user.create'
        ],
        // add page category
        [
            'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.add',
            'route'             => 'admin.page_category.create',
            'icon'              => 'icon-note',
            'access'            => 'admin.page_category.create',
            'active'            => 'admin.page_category.create'
        ],
        // add page
        [
            'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.add',
            'route'             => 'admin.page.create',
            'icon'              => 'icon-note',
            'access'            => 'admin.page.create',
            'active'            => 'admin.page.create'
        ],
        // add document category
        [
            'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.add',
            'route'             => 'admin.document_category.create',
            'icon'              => 'icon-doc',
            'access'            => 'admin.document_category.create',
            'active'            => 'admin.document_category.create'
        ],
        // add document
        [
            'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.add',
            'route'             => 'admin.document.create',
            'icon'              => 'icon-doc',
            'access'            => 'admin.document.create',
            'active'            => 'admin.document.create'
        ]
    ]
];