@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_color") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_color") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_color_description") !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Jquery Mini Color Picker --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jquery-minicolors/jquery.minicolors.css') !!}
    {{-- /Jquery Mini Color Picker --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var modelJs = "{!! lmcElixir('assets/pages/scripts/design_management/site_color.js') !!}";
        {{-- /js file path --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/design_management/siteColor.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-picture-o font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_color") !!}
                </span>
            </div>
            {{-- /Caption --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            {!! Form::open([
                'method'=> 'POST',
                'url'   => lmbRoute('admin.design_management.update',[
                    'form' => 'site_color'
                ]),
                'class' => 'form-horizontal form-bordered'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])


            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::design_management.partials.site_color_form')
            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
