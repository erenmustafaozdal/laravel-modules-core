@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.default_design") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.design_management.default_design") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.design_management.default_design_description") !!}
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
        var modelJs = "{!! lmcElixir('assets/pages/scripts/design_management/default_design.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var defaultDesignChangeURL = "{!! lmbRoute('admin.design_management.defaultDesignChange') !!}";
        {{-- /routes --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/design_management/footerColor.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-paint-brush font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.default_design") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions">
                <button id="save-as-default" class="btn green btn-outline" type="button">
                    <i class="fa fa-floppy-o"></i>
                    <span class="hidden-xs">
                        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.save_as_default') !!}
                    </span>
                </button>
                <button id="back-to-default" class="btn blue btn-outline" type="button">
                    <i class="fa fa-undo"></i>
                    <span class="hidden-xs">
                        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.back_to_default') !!}
                    </span>
                </button>
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body">

            @include('laravel-modules-core::design_management.partials.default_design_table')

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
