<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{!! config('laravel-modules-core.views.html_lang') !!}">
<!--<![endif]-->

    <head>
        <title>@yield('title') | {!! config('laravel-modules-core.views.html_head.default_title') !!}</title>

        {{-- Meta tags --}}
        <meta charset="{!! config('laravel-modules-core.views.html_head.charset') !!}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="{!! config('laravel-modules-core.views.html_head.meta_description') !!}"/>
        <meta name="author" content="{!! config('laravel-modules-core.views.html_head.meta_author') !!}"/>
        <meta http-equiv="Content-Type" content="{!! config('laravel-modules-core.views.html_head.content_type') !!}">
        <meta name="keywords" content="{!! config('laravel-modules-core.views.html_head.meta_keywords') !!}"/>
        <meta name="robots" content="{!! config('laravel-modules-core.views.html_head.meta_robots') !!}"/>
        <meta name="googlebot" content="{!! config('laravel-modules-core.views.html_head.meta_googlebot') !!}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- /Meta tags --}}

        {{-- Global styles --}}
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/uniform/css/uniform.default.css') !!}
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
        {{-- /Global styles --}}

        {{-- Global Theme Styles --}}
        {!! Html::style('vendor/laravel-modules-core/assets/global/css/met-global.css') !!}
        {{-- /Global Theme Styles --}}

        {{-- Theme Layout Styles --}}
        <link href="{!! lmcElixir('assets/layouts/layout4/css/admin.css') !!}" rel="stylesheet" type="text/css" />
        {!! Html::style('vendor/laravel-modules-core/assets/layouts/layout4/css/themes/light-theme.css') !!}
        {{-- /Theme Layout Styles --}}

        @section('css')

        @show

        <link rel="shortcut icon" href="/favicon.ico" />

    </head>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">

        {{-- Header --}}
        <div class="page-header navbar navbar-fixed-top">
            {{-- Header Inner --}}
            <div class="page-header-inner ">
                {{-- Logo --}}
                <div class="page-logo">
                    <a href="index.html">
                        {!! HTML::image(
                            'vendor/laravel-modules-core/assets/global/img/logo-dark.png',
                            config('laravel-modules-core.app_name'),
                            ['class' => 'logo-default']
                        ) !!}
                    </a>
                    <div class="menu-toggler sidebar-toggler"></div>
                </div>
                {{-- /Logo --}}
                
                {{-- Responsive Menu Toggler --}}
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                {{-- /Responsive Menu Toggler --}}
                
                {{-- Page Actions --}}
                <div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
                            <span class="hidden-sm hidden-xs">{!! trans('laravel-modules-core::admin.actions') !!}</span>
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-docs"></i> New Post </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-tag"></i> New Comment </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-share"></i> Share </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-flag"></i> Comments
                                    <span class="badge badge-success">4</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-users"></i> Feedbacks
                                    <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- /Page Actions --}}
            </div>
            {{-- /Header Inner --}}
        </div>
        {{-- /Header --}}
        @yield('content')

    </body>

    <!--[if lt IE 9]>
    <script src="/vendor/laravel-modules-core/assets/global/plugins/ltie9.js"></script>
    <![endif]-->

    <script src="{!! lmcElixir('assets/pages/js/loaders/admin.js') !!}"></script>

    @section('script')

    @show
</html>