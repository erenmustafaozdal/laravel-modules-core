<?php

return [
    'menu' => [
        // laravel user module
        [
            'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.root',
            'route'             => 'javascript:;',
            'icon'              => 'icon-users',
            'access'            => ['admin.role.index', 'admin.role.create'],
            'active'            => 'admin.role',
            'child' => [
                [
                    'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.all',
                    'route'             => 'admin.role.index',
                    'icon'              => 'icon-list',
                    'access'            => 'admin.role.index',
                    'active'            => 'admin.role.index'
                ],
                [
                    'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.role.add',
                    'route'             => 'admin.role.create',
                    'icon'              => 'icon-plus',
                    'access'            => 'admin.role.create',
                    'active'            => 'admin.role.create'
                ]
            ] // end of child
        ], // end of part
        [
            'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.root',
            'route'             => 'javascript:;',
            'icon'              => 'icon-user',
            'access'            => ['admin.user.index', 'admin.user.create'],
            'active'            => 'admin.user',
            'child' => [
                [
                    'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.all',
                    'route'             => 'admin.user.index',
                    'icon'              => 'icon-list',
                    'access'            => 'admin.user.index',
                    'active'            => 'admin.user.index'
                ],
                [
                    'trans'             => 'laravel-modules-core::laravel-user-module/admin.menu.user.add',
                    'route'             => 'admin.user.create',
                    'icon'              => 'icon-plus',
                    'access'            => 'admin.user.create',
                    'active'            => 'admin.user.create'
                ]
            ] // end of child
        ], // end of part
        // laravel page module
        [
            'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.root',
            'route'             => 'javascript:;',
            'icon'              => 'icon-note',
            'access'            => ['admin.page_category.index', 'admin.page_category.create'],
            'active'            => 'admin.page_category',
            'child' => [
                [
                    'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.all',
                    'route'             => 'admin.page_category.index',
                    'icon'              => 'icon-list',
                    'access'            => 'admin.page_category.index',
                    'active'            => 'admin.page_category.index'
                ],
                [
                    'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page_category.add',
                    'route'             => 'admin.page_category.create',
                    'icon'              => 'icon-plus',
                    'access'            => 'admin.page_category.create',
                    'active'            => 'admin.page_category.create'
                ]
            ] // end of child
        ], // end of part
        [
            'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.root',
            'route'             => 'javascript:;',
            'icon'              => 'icon-note',
            'access'            => ['admin.page.index', 'admin.page.create'],
            'active'            => 'admin.page.',
            'child' => [
                [
                    'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.all',
                    'route'             => 'admin.page.index',
                    'icon'              => 'icon-list',
                    'access'            => 'admin.page.index',
                    'active'            => 'admin.page.index'
                ],
                [
                    'trans'             => 'laravel-modules-core::laravel-page-module/admin.menu.page.add',
                    'route'             => 'admin.page.create',
                    'icon'              => 'icon-plus',
                    'access'            => 'admin.page.create',
                    'active'            => 'admin.page.create'
                ]
            ] // end of child
        ], // end of part
        // laravel document module
        [
            'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.root',
            'route'             => 'javascript:;',
            'icon'              => 'icon-doc',
            'access'            => ['admin.document_category.index', 'admin.document_category.create'],
            'active'            => 'admin.document_category',
            'child' => [
                [
                    'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.all',
                    'route'             => 'admin.document_category.index',
                    'icon'              => 'icon-list',
                    'access'            => 'admin.document_category.index',
                    'active'            => 'admin.document_category.index'
                ],
                [
                    'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document_category.add',
                    'route'             => 'admin.document_category.create',
                    'icon'              => 'icon-plus',
                    'access'            => 'admin.document_category.create',
                    'active'            => 'admin.document_category.create'
                ]
            ] // end of child
        ], // end of part
        [
            'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.root',
            'route'             => 'javascript:;',
            'icon'              => 'icon-doc',
            'access'            => ['admin.document.index', 'admin.document.create'],
            'active'            => 'admin.document.',
            'child' => [
                [
                    'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.all',
                    'route'             => 'admin.document.index',
                    'icon'              => 'icon-list',
                    'access'            => 'admin.document.index',
                    'active'            => 'admin.document.index'
                ],
                [
                    'trans'             => 'laravel-modules-core::laravel-document-module/admin.menu.document.add',
                    'route'             => 'admin.document.create',
                    'icon'              => 'icon-plus',
                    'access'            => 'admin.document.create',
                    'active'            => 'admin.document.create'
                ]
            ] // end of child
        ], // end of part
    ]
];