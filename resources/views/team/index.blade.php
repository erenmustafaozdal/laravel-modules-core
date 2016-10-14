@extends(config('laravel-team-module.views.team.layout'))

@section('title')
    {!! lmcTrans('laravel-team-module/admin.team.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-team-module/admin.team.index') !!}
        <small>{!! lmcTrans('laravel-team-module/admin.team.index_description') !!}</small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Datatable Css --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/datatables.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {{-- /Datatable Css --}}

    {{-- Bootstrap Datepicker Css --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {{-- /Bootstrap Datepicker Css --}}

    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var datatableJs = "{!! lmcElixir('assets/app/datatable.js') !!}";
        var editorJs = "{!! lmcElixir('assets/app/editor.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var formJs = "{!! lmcElixir('assets/pages/scripts/team/team-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/team/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.team.index') !!}";
        var categoryURL = "{!! lmbRoute('admin.team_category.show', ['id' => '###id###']) !!}";
        var categoriesURL = "{!! lmbRoute('api.team_category.models') !!}";
        var apiStoreURL = "{!! lmbRoute('api.team.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.team.group') !!}";
        var modelsURL = "{!! lmbRoute('api.team_category.models') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            first_name: { required: "{!! LMCValidation::getMessage('first_name','required') !!}" },
            last_name: { required: "{!! LMCValidation::getMessage('last_name','required') !!}" }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! config('laravel-modules-core.options.team.datatable_group_action') ? 'true' : 'false' !!};
        var rowDetailSupport = {!! config('laravel-modules-core.options.team.datatable_detail') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.team.datatable_filter') ? 'true' : 'false' !!};
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/team/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-team-module.icons.team') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-team-module/admin.team.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module' => 'team',
                'fast_add'  => config('laravel-modules-core.options.team.datatable_fast_add'),
                'add'       => true,
                'tools'     => config('laravel-modules-core.options.team.datatable_tools')
            ])
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="table-container">
                {{-- Table Actions --}}
                @if(config('laravel-modules-core.options.team.datatable_group_action'))
                    @include('laravel-modules-core::partials.common.indexTableActions', [
                        'actions'   => ['publish','not_publish','destroy']
                    ])
                @endif
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                        <tr role="row" class="heading">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.team.datatable_group_action'))
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.team.datatable_detail'))
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="5%"> {!! lmcTrans('laravel-team-module/admin.fields.team.photo') !!} </th>
                            <th class="all" width="100"> {!! lmcTrans('laravel-team-module/admin.fields.team.first_name') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-team-module/admin.fields.team_category.name') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="13%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(config('laravel-modules-core.options.team.datatable_filter'))
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.team.datatable_group_action'))
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.team.datatable_detail'))
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="{!! lmcTrans('laravel-team-module/admin.fields.team.first_name') !!} - {!! lmcTrans('laravel-team-module/admin.fields.team.last_name') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="category" placeholder="{!! lmcTrans('laravel-team-module/admin.fields.team_category.name') !!}">
                            </td>
                            <td>
                                <select name="status" class="form-control form-filter input-sm">
                                    <option value="">{!! trans('laravel-modules-core::admin.ops.select') !!}</option>
                                    <option value="1">{!! trans('laravel-modules-core::admin.ops.published') !!}</option>
                                    <option value="0">{!! trans('laravel-modules-core::admin.ops.not_published') !!}</option>
                                </select>
                            </td>
                            <td>
                                @include('laravel-modules-core::partials.common.datatables.filterDate')
                            </td>
                            <td>
                                @include('laravel-modules-core::partials.common.datatables.filterActions')
                            </td>
                        </tr>
                        @endif
                        {{-- /Datatable Filter --}}

                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {{-- /DataTable --}}
            </div>
        </div>
        {{-- /Table Portlet Body --}}
    </div>
    {{-- /Table Portlet --}}
    
    {{-- Create and Edit modal --}}
    @include('laravel-modules-core::partials.common.datatables.modal', [
        'includes' => [
            'team.partials.form'        => [
                'helpBlockAfter'    => true
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
