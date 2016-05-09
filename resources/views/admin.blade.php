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
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-toastr/toastr.min.css') !!}
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
                        @include('laravel-modules-core::partials.admin.topbarActions')
                    </div>
                </div>
                {{-- /Page Actions --}}

                {{-- Page Top --}}
                <div class="page-top">
                    {{-- Navigation Menu --}}
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"></li>
                            {{-- User Login Dropdown --}}
                            <li class="dropdown dropdown-user dropdown-dark">
                                @include('laravel-modules-core::partials.admin.topbarUserLogin')
                            </li>
                            {{-- /User Login Dropdown --}}
                        </ul>
                    </div>
                    {{-- /Navigation Menu --}}
                </div>
                {{-- /Page Top --}}
            </div>
            {{-- /Header Inner --}}
        </div>
        {{-- /Header --}}
        <div class="clearfix"> </div>
        
        {{-- Container --}}
        <div class="page-container">
            
            {{-- Sidebar Wrapper --}}
            <div class="page-sidebar-wrapper">
                {{-- Sidebar --}}
                <div class="page-sidebar navbar-collapse collapse">
                    @include('laravel-modules-core::partials.admin.sidebar')
                </div>
                {{-- /Sidebar --}}

                {{-- Page Content Wrapper --}}
                <div class="page-content-wrapper">
                    {{-- Page Content Body --}}
                    <div class="page-content">
                        {{-- Page Head --}}
                        <div class="page-head">
                            {{-- Page Title --}}
                            <div class="page-title">
                                @yield('page-title')
                            </div>
                            {{-- /Page Title --}}

                            {{-- Page Toolbar --}}
                            <div class="page-toolbar">
                                {{-- Theme Panel --}}
                                @include('laravel-modules-core::partials.admin.themePanel')
                                {{-- /Theme Panel --}}
                            </div>
                            {{-- /Page Toolbar --}}
                        </div>
                        {{-- /Page Head --}}
                    </div>
                    {{-- /Page Content Body --}}
                </div>
                {{-- /Page Content Wrapper --}}
            </div>
            {{-- /Sidebar Wrapper --}}
            
        </div>
        {{-- /Container --}}
        @yield('content')

        {{-- Footer --}}
        <div class="page-footer">
            <div class="page-footer-inner">
                ©{!! config('laravel-modules-core.copyright_year') !!}
                {!! str_replace(':app_name',config('laravel-modules-core.app_name'),trans('laravel-modules-core::global.copyright_message')) !!}
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        {{-- /Footer --}}

    </body>

    <!--[if lt IE 9]>
    <script src="/vendor/laravel-modules-core/assets/global/plugins/ltie9.js"></script>
    <![endif]-->

    <script type="text/javascript">
        var themeJs = "{!! lmcElixir('assets/layouts/layout4/scripts/theme.js') !!}";
        var configJs = "{!! lmcElixir('assets/global/scripts/config.js') !!}";
        var themeApiUrl = "{!! route('api.theme.change') !!}";
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin.js') !!}"></script>
    <script type="text/javascript">
        $script.ready('theme', function() {
            Theme.init();
            Theme.initLayoutChange("{!! Cache::get('theme_tool')['layout'] !!}");
        });
    </script>

    @section('script')

    @show
</html>