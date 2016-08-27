@extends(config('laravel-page-module.views.page.layout'))

@section('title')
    @if(isset($page_category))
        {!! lmcTrans('laravel-page-module/admin.page_category.page.index', ['page_category' => $page_category->name]) !!}
    @else
        {!! lmcTrans('laravel-page-module/admin.page.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>{!! lmcTrans('laravel-page-module/admin.page_category.page.index', ['page_category' => $page_category->name]) !!}
            <small>{!! lmcTrans('laravel-page-module/admin.page_category.page.index_description', ['page_category' => $page_category->name]) !!}</small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-page-module/admin.page.index') !!}
            <small>{!! lmcTrans('laravel-page-module/admin.page.index_description') !!}</small>
        </h1>
    @endif
@endsection

@if(isset($page_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$page_category], ['name']) !!}
@endsection
@endif

@section('css')
    @parent
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/datatables.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}

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
        var formJs = "{!! lmcElixir('assets/pages/scripts/page/page-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/page/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($page_category))
        var ajaxURL = "{!! route('api.page_category.page.index', ['id' => $page_category->id]) !!}";
        var modelsURL = "{!! route('api.document_category.models', ['id' => $page_category->id]) !!}";
        @else
        var ajaxURL = "{!! route('api.page.index') !!}";
        var categoryURL = "{!! route('admin.page_category.show', ['id' => '###id###']) !!}";
        var modelsURL = "{!! route('api.page_category.models') !!}";
        @endif
        var apiStoreURL = "{!! route('api.page.store') !!}";
        var apiGroupAction = "{!! route('api.page.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" },
            slug: { alpha_dash: "{!! LMCValidation::getMessage('slug','alpha_dash') !!}" }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! config('laravel-modules-core.options.page.datatable_group_action') ? 'true' : 'false' !!};
        var rowDetailSupport = {!! config('laravel-modules-core.options.page.datatable_detail') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.page.datatable_filter') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.page.datatable_filter') ? 'true' : 'false' !!};
        var isRelationTable = {!! isset($page_category) ? 'true' : 'false' !!}
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/page/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-page-module.icons.page') !!} font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    @if(isset($page_category))
                        {!! lmcTrans('laravel-page-module/admin.page_category.page.index', ['page_category' => $page_category->name]) !!}
                    @else
                        {!! lmcTrans('laravel-page-module/admin.page.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($page_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => [ 'id' =>  $page_category->id, 'route' => 'page_category.page'],
                    'fast_add'  => config('laravel-modules-core.options.page.datatable_fast_add'),
                    'add'       => true,
                    'tools'     => config('laravel-modules-core.options.page.datatable_tools')
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => 'page',
                    'fast_add'  => config('laravel-modules-core.options.page.datatable_fast_add'),
                    'add'       => true,
                    'tools'     => config('laravel-modules-core.options.page.datatable_tools')
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
                @if(config('laravel-modules-core.options.page.datatable_group_action'))
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
                            @if(config('laravel-modules-core.options.page.datatable_group_action'))
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.page.datatable_detail'))
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-page-module/admin.fields.page.title') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-page-module/admin.fields.page.slug') !!} </th>
                            @if( ! isset($page_category))
                            <th class="all" width="%30"> {!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!} </th>
                            @endif
                            <th class="all" width="%30"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(config('laravel-modules-core.options.page.datatable_filter'))
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.page.datatable_group_action'))
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.page.datatable_detail'))
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="title" placeholder="{!! lmcTrans('laravel-page-module/admin.fields.page.title') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="slug" placeholder="{!! lmcTrans('laravel-page-module/admin.fields.page.slug') !!}">
                            </td>
                            @if( ! isset($page_category))
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="category" placeholder="{!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!}">
                            </td>
                            @endif
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
            'page.partials.form'        => [
                'helpBlockAfter'    => true,
                'isRelation'        => isset($page_category) ? true : false
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
