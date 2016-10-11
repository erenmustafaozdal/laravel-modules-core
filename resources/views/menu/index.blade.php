@extends(config('laravel-menu-module.views.menu.layout'))

@section('title')
    {!! lmcTrans('laravel-menu-module/admin.menu.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-menu-module/admin.menu.index') !!}
        <small>{!! lmcTrans('laravel-menu-module/admin.menu.index_description') !!}</small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Bootstrap gTreeTable --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-gtreetable/dist/bootstrap-gtreetable.min.css') !!}
    {{-- /Bootstrap gTreeTable --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var gtreetableJs = "{!! lmcElixir('assets/app/gTreeTable.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/menu/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.menu.index') !!}";
        var editURL = "{!! lmbRoute('admin.menu.edit', ['id' => '###id###']) !!}";
        var apiStoreURL = "{!! lmbRoute('api.menu.store') !!}";
        var apiUpdateURL = "{!! lmbRoute('api.menu.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! lmbRoute('api.menu.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! lmbRoute('api.menu.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        var nestableLevel = "{!! config('laravel-modules-core.options.menu.nestable_level_root') !!}";
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/menu/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-menu-module.icons.menu') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-menu-module/admin.menu.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module'    => 'menu',
                'fast_add'  => false,
                'add'       => true,
                'tools'     => false
            ])
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="table-container">

                {{-- DataTable --}}
                {{-- if is not have child show info, if have child show table --}}
                @if( App\Menu::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-menu-module/admin.helpers.menu.not_have_child') !!}
                    </div>
                @else
                    <div class="well well-sm">
                        {!! lmcTrans('laravel-menu-module/admin.helpers.menu.menu_index') !!}
                    </div>
                    <table class="table table-striped table-bordered table-hover gtreetable"></table>
                @endif
                {{-- /if is not have child show info, if have child show table --}}
                {{-- /DataTable --}}
            </div>
        </div>
        {{-- /Table Portlet Body --}}
    </div>
    {{-- /Table Portlet --}}
@endsection
