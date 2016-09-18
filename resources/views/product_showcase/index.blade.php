@extends(config('laravel-product-module.views.product_showcase.layout'))

@section('title')
    {!! lmcTrans('laravel-product-module/admin.product_showcase.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-product-module/admin.product_showcase.index') !!}
        <small>{!! lmcTrans('laravel-product-module/admin.product_showcase.index_description') !!}</small>
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
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var datatableJs = "{!! lmcElixir('assets/app/datatable.js') !!}";
        var editorJs = "{!! lmcElixir('assets/app/editor.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var formJs = "{!! lmcElixir('assets/pages/scripts/product_showcase/product_showcase-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/product_showcase/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.product_showcase.index') !!}";
        var apiStoreURL = "{!! lmbRoute('api.product_showcase.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.product_showcase.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! config('laravel-modules-core.options.product_showcase.datatable_group_action') ? 'true' : 'false' !!};
        var rowDetailSupport = {!! config('laravel-modules-core.options.product_showcase.datatable_detail') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.product_showcase.datatable_filter') ? 'true' : 'false' !!};
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product_showcase/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-product-module.icons.product_showcase') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-product-module/admin.product_showcase.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module' => 'product_showcase',
                'fast_add'  => config('laravel-modules-core.options.product_showcase.datatable_fast_add'),
                'add'       => true,
                'tools'     => config('laravel-modules-core.options.product_showcase.datatable_tools')
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
                @if(config('laravel-modules-core.options.product.datatable_group_action'))
                    @include('laravel-modules-core::partials.common.indexTableActions', [
                        'actions'   => ['destroy']
                    ])
                @endif
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                    <tr role="row" class="heading">
                        {{-- Datatable Group Action Column --}}
                        @if(config('laravel-modules-core.options.product_showcase.datatable_group_action'))
                            <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                        @endif
                        {{-- /Datatable Group Action Column --}}

                        {{-- Datatable Row Detail Column --}}
                        @if(config('laravel-modules-core.options.product_showcase.datatable_detail'))
                            <th class="all" width="2%"></th>
                        @endif
                        {{-- /Datatable Row Detail Column --}}

                        <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                        <th class="all" width="%30"> {!! lmcTrans('laravel-product-module/admin.fields.product_showcase.name') !!} </th>
                        <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                        <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                    </tr>

                    {{-- Datatable Filter --}}
                    @if(config('laravel-modules-core.options.product_showcase.datatable_filter'))
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.product_showcase.datatable_group_action'))
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.product_showcase.datatable_detail'))
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="name" placeholder="{!! lmcTrans('laravel-product-module/admin.fields.product_showcase.name') !!}">
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
            'product_showcase.partials.form' => []
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
