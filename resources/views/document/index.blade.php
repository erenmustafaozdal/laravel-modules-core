@extends(config('laravel-document-module.views.document.layout'))

@section('title')
    @if(isset($document_category))
        {!! lmcTrans('laravel-document-module/admin.document_category.document.index', ['document_category' => $document_category->name_uc_first]) !!}
    @else
        {!! lmcTrans('laravel-document-module/admin.document.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($document_category))
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.document.index', ['document_category' => $document_category->name_uc_first]) !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.document.index_description', ['document_category' => $document_category->name_uc_first]) !!}</small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-document-module/admin.document.index') !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document.index_description') !!}</small>
        </h1>
    @endif
@endsection

@if(isset($document_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$document_category], ['name']) !!}
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

    {{-- Bootstrap Touch Spin Css --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css') !!}
    {{-- /Bootstrap Touch Spin Css --}}

    {{-- File Input Css --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /File Input Css --}}

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
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var datatableJs = "{!! lmcElixir('assets/app/datatable.js') !!}";
        var editorJs = "{!! lmcElixir('assets/app/editor.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var formJs = "{!! lmcElixir('assets/pages/scripts/document/document-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/document/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($document_category))
        var ajaxURL = "{!! lmbRoute('api.document_category.document.index', ['id' => $document_category->id]) !!}";
        var modelsURL = "{!! lmbRoute('api.document_category.models', ['id' => $document_category->id]) !!}";
        @else
        var ajaxURL = "{!! lmbRoute('api.document.index') !!}";
        var categoryURL = "{!! lmbRoute('admin.document_category.show', ['id' => '###id###']) !!}";
        var modelsURL = "{!! lmbRoute('api.document_category.models') !!}";
        @endif
        var apiStoreURL = "{!! lmbRoute('api.document.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.document.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" }
        };
        var validExtension = "{!! config('laravel-document-module.document.uploads.file.mimes') !!}";
        var maxSize = "{!! config('laravel-document-module.document.uploads.file.max_size') !!}";
        var aspectRatio = "{!! isset($document_category) && $document_category->aspect_ratio ? $document_category->aspect_ratio : config('laravel-document-module.document.uploads.photo.aspect_ratio') !!}";
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! isset($document_category) ? $document_category->datatable_group_action_string : (config('laravel-modules-core.options.document.datatable_group_action') ? 'true' : 'false') !!};
        var rowDetailSupport = {!! isset($document_category) ? $document_category->datatable_detail_string : (config('laravel-modules-core.options.document.datatable_detail') ? 'true' : 'false') !!};
        var datatableFilterSupport = {!! isset($document_category) ? $document_category->datatable_filter_string : (config('laravel-modules-core.options.document.datatable_filter') ? 'true' : 'false') !!};
        var isRelationTable = {!! isset($document_category) ? 'true' : 'false' !!}
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/document/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-document-module.icons.document') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($document_category))
                        {!! lmcTrans('laravel-document-module/admin.document_category.document.index', ['document_category' => $document_category->name_uc_first]) !!}
                    @else
                        {!! lmcTrans('laravel-document-module/admin.document.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($document_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => [ 'id' =>  $document_category->id, 'route' => 'document_category.document'],
                    'fast_add'  => isset($document_category) ? $document_category->datatable_fast_add : (config('laravel-modules-core.options.document.datatable_fast_add')),
                    'add'       => true,
                    'tools'     => isset($document_category) ? $document_category->datatable_tools : (config('laravel-modules-core.options.document.datatable_tools'))
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => 'document',
                    'fast_add'  => isset($document_category) ? $document_category->datatable_fast_add : (config('laravel-modules-core.options.document.datatable_fast_add')),
                    'add'       => true,
                    'tools'     => isset($document_category) ? $document_category->datatable_tools : (config('laravel-modules-core.options.document.datatable_tools'))
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
                @if(
                    (isset($document_category) && $document_category->datatable_group_action)
                    || (! isset($document_category) && config('laravel-modules-core.options.document.datatable_group_action'))
                )
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
                            @if(
                                (isset($document_category) && $document_category->datatable_group_action)
                                || (! isset($document_category) && config('laravel-modules-core.options.document.datatable_group_action'))
                            )
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(
                                (isset($document_category) && $document_category->datatable_detail)
                                || (! isset($document_category) && config('laravel-modules-core.options.document.datatable_detail'))
                            )
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-document-module/admin.fields.document.title') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-document-module/admin.fields.document.document') !!} </th>
                            <th class="all" width="%5"> {!! trans('laravel-modules-core::admin.fields.size') !!} </th>
                            @if( ! isset($document_category))
                            <th class="all" width="%30"> {!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!} </th>
                            @endif
                            <th class="all" width="%30"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(
                            (isset($document_category) && $document_category->datatable_filter)
                            || (! isset($document_category) && config('laravel-modules-core.options.document.datatable_filter'))
                        )
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(
                                (isset($document_category) && $document_category->datatable_group_action)
                                || (! isset($document_category) && config('laravel-modules-core.options.document.datatable_group_action'))
                            )
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(
                                (isset($document_category) && $document_category->datatable_detail)
                                || (! isset($document_category) && config('laravel-modules-core.options.document.datatable_detail'))
                            )
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="title" placeholder="{!! lmcTrans('laravel-document-module/admin.fields.document.title') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="document" placeholder="{!! lmcTrans('laravel-document-module/admin.fields.document.document') !!}">
                            </td>
                            <td>
                                @include('laravel-modules-core::partials.common.datatables.filterTouchSpin', ['id' => 'size'])
                            </td>
                            @if( ! isset($document_category))
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="category" placeholder="{!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!}">
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
            'document.partials.form'        => [
                'helpBlockAfter'    => true,
                'isRelation'        => isset($document_category) ? true : false
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
