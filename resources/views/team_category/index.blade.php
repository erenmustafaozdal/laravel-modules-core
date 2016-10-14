@extends(config('laravel-team-module.views.team_category.layout'))

@section('title')
    {!! lmcTrans('laravel-team-module/admin.team_category.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-team-module/admin.team_category.index') !!}
        <small>{!! lmcTrans('laravel-team-module/admin.team_category.index_description') !!}</small>
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
        var indexJs = "{!! lmcElixir('assets/pages/scripts/team_category/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.team_category.index') !!}";
        var showURL = "{!! lmbRoute('admin.team_category.show', ['id' => '###id###']) !!}";
        var editURL = "{!! lmbRoute('admin.team_category.edit', ['id' => '###id###']) !!}";
        var apiStoreURL = "{!! lmbRoute('api.team_category.store') !!}";
        var apiUpdateURL = "{!! lmbRoute('api.team_category.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! lmbRoute('api.team_category.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! lmbRoute('api.team_category.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        var nestableLevel = "{!! config('laravel-modules-core.options.team_category.nestable_level_root') !!}";
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/team_category/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-team-module.icons.team_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-team-module/admin.team_category.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module'    => 'team_category',
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
                @if( App\TeamCategory::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-team-module/admin.helpers.team_category.not_have_child') !!}
                    </div>
                @else
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
