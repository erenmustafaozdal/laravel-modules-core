<!DOCTYPE html>
<html lang="{!! config('laravel-modules-core.views.html_lang') !!}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="{!! config('laravel-modules-core.views.html_head.content_type') !!}">
    <meta charset="{!! config('laravel-modules-core.views.html_head.charset') !!}">
    <meta name="description" content="{!! config('laravel-modules-core.views.html_head.meta_description') !!}"/>
    <meta name="author" content="{!! config('laravel-modules-core.views.html_head.meta_author') !!}"/>
    <meta name="keywords" content="{!! config('laravel-modules-core.views.html_head.meta_keywords') !!}"/>
    <meta name="robots" content="{!! config('laravel-modules-core.views.html_head.meta_robots') !!}"/>
    <meta name="googlebot" content="{!! config('laravel-modules-core.views.html_head.meta_googlebot') !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {!! config('laravel-modules-core.views.html_head.default_title') !!}</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-hQpvDQiCJaD2H465dQfA717v7lu5qHWtDbWNPvaTJ0ID5xnPUlVXnKzq7b8YUkbN" crossorigin="anonymous">
    {!! Html::style('vendor/laravel-modules-core/css/global.css') !!}

</head>

<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title">{!! config('laravel-modules-core.app_name') !!}</a>
                    </div>
                    <div class="clearfix"></div>

                    @include('laravel-modules-core::partials.admin.menu_profile')

                    @include('laravel-modules-core::partials.admin.sidebar', ['items' => $menu_sidebar->roots()])

                    @include('laravel-modules-core::partials.admin.sidebar_footer')

                </div>
            </div>

            {{-- top navigation --}}
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        @include('laravel-modules-core::partials.admin.topbar', ['usermenu_items' => $menu_topbarUser->roots()])
                    </nav>
                </div>

            </div>
            {{-- /top navigation --}}

            {{-- page content --}}
            <div class="right_col" role="main"></div>
            {{-- /page content --}}

            {{-- footer content --}}
            <footer>
                <div class="pull-right">
                    ©{!! config('laravel-modules-core.copyright_year') !!}
                    {!! str_replace(':app_name',config('laravel-modules-core.app_name'),trans('laravel-modules-core::global.copyright_message')) !!}
                </div>
                <div class="clearfix"></div>
            </footer>
            {{-- /footer content --}}

        </div>

    </div>

</body>

{!! Html::script('vendor/laravel-modules-core/js/adminDatatable7.js') !!}
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</html>