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
        {{-- /Global styles --}}
        
        {{-- Global Theme Styles --}}
        {!! Html::style('vendor/laravel-modules-core/assets/global/css/met-global.css') !!}
        {{-- /Global Theme Styles --}}

        {{-- Page Styles --}}
        {!! Html::style('vendor/laravel-modules-core/assets/pages/css/login.css') !!}
        {{-- /Page Styles --}}

        {{-- Theme Layout Styles --}}
        <link href="{!! lmcElixir('assets/layouts/layout4/css/admin.css') !!}" rel="stylesheet" type="text/css" />
        {{-- /Theme Layout Styles --}}

        {{-- Custom Css --}}
        @if(config('laravel-modules-core.custom_css'))
            {!! Html::style(config('laravel-modules-core.custom_css')) !!}
        @endif
        {{-- /Custom Css --}}

        <link rel="shortcut icon" href="/vendor/laravel-modules-core/assets/global/img/favicon.ico" />
    </head>

    <body class=" login">

        {{-- Logo --}}
        <div class="logo">
            <a href="javascript:;">
                {!! HTML::image(
                    config('laravel-modules-core.logos.default'),
                    config('laravel-modules-core.app_name')
                ) !!}
            </a>
        </div>
        {{-- /Logo --}}

        {{-- Login --}}
        <div class="content">
            @yield('content')
        </div>
        {{-- /Login --}}

        {{-- copyright --}}
        <div class="copyright">
            ©{!! config('laravel-modules-core.copyright_year') !!}
            {!! trans('laravel-modules-core::global.copyright_message',[ 'app_name' => config('laravel-modules-core.app_name') ]) !!}
        </div>
        {{-- /copyright --}}

    </body>

    <!--[if lt IE 9]>
    <script src="/vendor/laravel-modules-core/assets/global/plugins/ltie9.js"></script>
    <![endif]-->

    <script type="text/javascript">
        var loginJs = "{!! lmcElixir('assets/pages/scripts/login.js') !!}";
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/login.js') !!}"></script>

    @section('script')

    @show
</html>