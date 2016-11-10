@extends(config('laravel-dealer-module.views.dealer.layout'))

@section('title')
    @if(isset($dealer_category))
        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.index', [
            'dealer_category' => $dealer_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-dealer-module/admin.dealer.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($dealer_category))
        <h1>
            {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.index', [
                'dealer_category' => $dealer_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.index_description', [
                    'dealer_category' => $dealer_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-dealer-module/admin.dealer.index') !!}
            <small>{!! lmcTrans('laravel-dealer-module/admin.dealer.index_description') !!}</small>
        </h1>
    @endif
@endsection

@if(isset($dealer_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$dealer_category], ['name']) !!}
@endsection
@endif

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
        var formJs = "{!! lmcElixir('assets/pages/scripts/dealer/dealer-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/dealer/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($dealer_category))
        var ajaxURL = "{!! lmbRoute('api.dealer_category.dealer.index', ['id' => $dealer_category->id]) !!}";
        var modelsURL = "{!! lmbRoute('api.dealer_category.models', ['id' => $dealer_category->id]) !!}";
        var categoryURL = "{!! lmbRoute('admin.dealer_category.dealer_category.show', [
            'id' => $dealer_category->id,
            config('laravel-dealer-module.url.dealer_category') => '###id###'
        ]) !!}";
        @else
        var ajaxURL = "{!! lmbRoute('api.dealer.index') !!}";
        var categoryURL = "{!! lmbRoute('admin.dealer_category.show', ['id' => '###id###']) !!}";
        var modelsURL = "{!! lmbRoute('api.dealer_category.models') !!}";
        @endif
        var apiStoreURL = "{!! lmbRoute('api.dealer.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.dealer.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            province_id: { required: "{!! LMCValidation::getMessage('province_id','required') !!}" },
            county_id: { required: "{!! LMCValidation::getMessage('county_id','required') !!}" }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! config('laravel-modules-core.options.dealer.datatable_group_action') ? 'true' : 'false' !!};
        var rowDetailSupport = {!! config('laravel-modules-core.options.dealer.datatable_detail') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.dealer.datatable_filter') ? 'true' : 'false' !!};
        var isRelationTable = {!! isset($dealer_category) ? 'true' : 'false' !!}
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/dealer/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-dealer-module.icons.dealer') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($dealer_category))
                        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.index', [
                            'dealer_category' => $dealer_category->name_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans('laravel-dealer-module/admin.dealer.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($dealer_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => [ 'id' =>  $dealer_category->id, 'route' => 'dealer_category.dealer'],
                    'fast_add'  => config('laravel-modules-core.options.dealer.datatable_fast_add'),
                    'add'       => true,
                    'tools'     => config('laravel-modules-core.options.dealer.datatable_tools')
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => 'dealer',
                    'fast_add'  => config('laravel-modules-core.options.dealer.datatable_fast_add'),
                    'add'       => true,
                    'tools'     => config('laravel-modules-core.options.dealer.datatable_tools')
                ])
            @endif
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="table-container">
                {{-- Table Actions --}}
                @if(config('laravel-modules-core.options.dealer.datatable_group_action'))
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
                            @if(config('laravel-modules-core.options.dealer.datatable_group_action'))
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.dealer.datatable_detail'))
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-dealer-module/admin.fields.dealer.name') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!} </th>
                            <th class="all" width="%30"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(config('laravel-modules-core.options.dealer.datatable_filter'))
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.dealer.datatable_group_action'))
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.dealer.datatable_detail'))
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="name" placeholder="{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.name') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="category" placeholder="{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!}">
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
            'dealer.partials.form'        => [
                'helpBlockAfter'    => true
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
