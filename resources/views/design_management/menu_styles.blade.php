@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.menu_styles") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.design_management.menu_styles") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.design_management.menu_styles_description") !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var modelJs = "{!! lmcElixir('assets/pages/scripts/design_management/menu_styles.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var saveTopBoxOrderURL = "{!! lmbRoute('admin.design_management.saveTopBoxOrder') !!}";
        {{-- /routes --}}
        $(".tooltips").tooltip();
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/design_management/menuStyles.js') !!}"></script>
@endsection

@section('content')
    {{-- Menu Styles --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-bars font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.menu_styles") !!}
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
                    'form' => 'menu_styles'
                ]),
                'class' => 'form-horizontal form-bordered'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])


            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::design_management.partials.menu_styles_form')
            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Menu Styles --}}

    {{-- Top Box Components --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-object-ungroup font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.top_box_order") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions">
                <button id="save-order" class="btn green btn-outline" type="button">
                    <i class="fa fa-floppy-o"></i>
                    <span class="hidden-xs"> {!! lmcTrans('admin.ops.save') !!} </span>
                </button>
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body">

            {{-- Helper --}}
            <div class="note note-info">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.top_box_components') !!}
            </div>
            {{-- /Helper --}}

            @include('laravel-modules-core::design_management.partials.top_box_components_order')
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Top Box Components --}}
@endsection
