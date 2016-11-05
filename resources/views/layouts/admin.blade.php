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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
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
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/icheck/skins/all.css') !!}
        {{-- /Global styles --}}

        @section('css')

        @show

        {{-- Global Theme Styles --}}
        {!! Html::style('vendor/laravel-modules-core/assets/global/css/met-global.css') !!}
        {{-- /Global Theme Styles --}}

        {{-- Theme Layout Styles --}}
        <link href="{!! lmcElixir('assets/layouts/layout4/css/admin.css') !!}" rel="stylesheet" type="text/css" />
        {!! Html::style('vendor/laravel-modules-core/assets/layouts/layout4/css/themes/'. (Cache::get('theme_color')['color'] == '' ? 'light' : Cache::get('theme_color')['color']) .'-theme.css', [
            'id'    => 'style_color'
        ]) !!}
        {{-- /Theme Layout Styles --}}
        
        {{-- File Manager --}}
        {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/colorbox/example5/colorbox.css') !!}
        {{-- /File Manager --}}

        {{-- Custom Css --}}
        @if(config('laravel-modules-core.custom_css'))
            {!! Html::style(config('laravel-modules-core.custom_css')) !!}
        @endif
        {{-- /Custom Css --}}

        <link rel="shortcut icon" href="/vendor/laravel-modules-core/assets/global/img/favicon.ico" />

    </head>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        {{-- Header --}}
        <div class="page-header navbar navbar-fixed-top">
            {{-- Header Inner --}}
            <div class="page-header-inner ">
                {{-- Logo --}}
                <div class="page-logo">
                    <a href="javascript:;">
                        {!! HTML::image(
                            config('laravel-modules-core.logos.' . (Cache::get('theme_color')['color'] == '' ? 'light' : Cache::get('theme_color')['color'])),
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
                    @include('laravel-modules-core::partials.admin.topbarActions')
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
                            
                            {{-- Quick Sidebar Toggler --}}
                            <li class="dropdown dropdown-extended quick-sidebar-toggler tooltips"
                                data-container="body"
                                data-placement="bottom"
                                data-original-title="{!! lmcTrans('admin.fields.fast_management') !!}"
                            >
                                <span class="sr-only">{!! lmcTrans('admin.fields.fast_management') !!}</span>
                                <i class="icon-logout"></i>
                            </li>
                            {{-- /Quick Sidebar Toggler --}}
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
            </div>
            {{-- /Sidebar Wrapper --}}

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
                            @if ( Sentinel::getUser()->is_super_admin || Sentinel::hasAnyAccess(['api.themeLayout.change', 'api.themeColor.change']) )
                                @include('laravel-modules-core::partials.admin.themePanel')
                            @endif
                            {{-- /Theme Panel --}}
                        </div>
                        {{-- /Page Toolbar --}}
                    </div>
                    {{-- /Page Head --}}

                    {{-- Page Breadcrumb --}}
                    @section('breadcrumb')
                        {!! LMCBreadcrumb::getBreadcrumb() !!}
                    @show
                    {{-- /Page Breadcrumb --}}

                    {{-- Page Base Content --}}
                    @yield('content')
                    {{-- /Page Base Content --}}
                </div>
                {{-- /Page Content Body --}}
            </div>
            {{-- /Page Content Wrapper --}}
            
            {{-- Quick Sidebar --}}
            @include('laravel-modules-core::partials.admin.quick_sidebar')
            {{-- /Quick Sidebar --}}
            
        </div>
        {{-- /Container --}}

        {{-- Footer --}}
        <div class="page-footer">
            <div class="page-footer-inner">
                ©{!! config('laravel-modules-core.copyright_year') !!}
                {!! trans('laravel-modules-core::global.copyright_message',['app_name' => config('laravel-modules-core.app_name') ]) !!}
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        {{-- /Footer --}}
    
        {{-- Modals --}}
        @include('laravel-modules-core::partials.admin.notPermissionModal')
        {{-- /Modals --}}

    </body>

    <!--[if lt IE 9]>
    <script src="/vendor/laravel-modules-core/assets/global/plugins/ltie9.js"></script>
    <![endif]-->

    <script type="text/javascript">
        var themeJs = "{!! lmcElixir('assets/layouts/layout4/scripts/theme.js') !!}";
        var configJs = "{!! lmcElixir('assets/global/scripts/config.js') !!}";
        var elfinderJs = "{!! lmcElixir('assets/app/elfinder.js') !!}";
        var themeLayoutChangeApiUrl = "{!! lmbRoute('api.themeLayout.change') !!}";
        var themeColorChangeApiUrl = "{!! lmbRoute('api.themeColor.change') !!}";
        var logos = {!! json_encode(config('laravel-modules-core.logos')) !!};

        // select2 address routes
        var provinceURL = "{!! lmbRoute('address.provinces') !!}";
        var countyURL = "{!! lmbRoute('address.counties', ['id' => '###id###']) !!}";
        var districtURL = "{!! lmbRoute('address.districts', ['id' => '###id###']) !!}";
        var neighborhoodURL = "{!! lmbRoute('address.neighborhoods', ['id' => '###id###']) !!}";
        var postalCodeURL = "{!! lmbRoute('address.postalCode', ['id' => '###id###']) !!}";
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin.js') !!}"></script>
    <script type="text/javascript">
        $script.ready('theme', function() {
            Theme.init();
            Theme.initLayoutChange("{!! Cache::get('theme_layout')['layout'] !!}");
            Theme.initHeaderChange("{!! Cache::get('theme_layout')['layout'] !!}");
            Theme.initDropdownChange("{!! Cache::get('theme_layout')['headerTopDropdown'] !!}");
            Theme.initDropdownChange("{!! Cache::get('theme_layout')['headerTopDropdown'] !!}");
            Theme.initSidebarChange("{!! Cache::get('theme_layout')['sidebar'] !!}");
            Theme.initSidebarMenuChange("{!! Cache::get('theme_layout')['sidebarMenu'] !!}");
            Theme.initSidebarPositionChange("{!! Cache::get('theme_layout')['sidebarPos'] !!}");
            Theme.initFooterChange("{!! Cache::get('theme_layout')['footer'] !!}");
        });
    </script>

    @section('script')

    @show
</html>
