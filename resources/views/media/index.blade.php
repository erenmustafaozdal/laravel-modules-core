@extends(config('laravel-media-module.views.media.layout'))

@section('title')
    @if(isset($media_category))
        {!! lmcTrans('laravel-media-module/admin.media_category.media.index', ['media_category' => $media_category->name_uc_first]) !!}
    @else
        {!! lmcTrans('laravel-media-module/admin.media.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($media_category))
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media_category.media.index', [
                'media_category' => $media_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media_category.media.index_description', [
                    'media_category' => $media_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media.index') !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media.index_description') !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($media_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$media_category], ['name']) !!}
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

    {{-- File Input Css --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
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
        var formJs = "{!! lmcElixir('assets/pages/scripts/media/media-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/media/index.js') !!}";
        var videoPhotoJs = "{!! lmcElixir('assets/pages/scripts/media/video_photo.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($media_category))
        var ajaxURL = "{!! lmbRoute('api.media_category.media.index', ['id' => $media_category->id]) !!}";
        var categoryURL = "{!! lmbRoute('admin.media_category.media_category.show', [
            'id' => $media_category->id,
            config('laravel-media-module.url.media_category') => '###id###'
        ]) !!}";
        var modelsURL = "{!! lmbRoute('api.media_category.models', ['id' => $media_category->id]) !!}";
        var categoryCreateUrl = "{!! lmbRoute('admin.media_category.media_category.create', [
            'id'        => $media_category->id,
            '_token'    => csrf_token()
        ]) !!}";
        @else
        var ajaxURL = "{!! lmbRoute('api.media.index') !!}";
        var categoryURL = "{!! lmbRoute('admin.media_category.show', ['id' => '###id###']) !!}";
        var categoryCreateUrl = "{!! lmbRoute('admin.media_category.create', ['_token' => csrf_token()]) !!}";
        var modelsURL = "{!! lmbRoute('api.media_category.models') !!}";
        @endif
        var apiStoreURL = "{!! lmbRoute('api.media.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.media.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            photo: { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            video: { required: "{!! LMCValidation::getMessage('video','required') !!}" }
        };
        var validExtension = "{!! config('laravel-media-module.media.uploads.photo.mimes') !!}";
        {{-- /languages --}}

        {{-- scripts --}}
        var aspectRatio = '{!! isset($media_category) && $media_category->aspect_ratio ? $media_category->aspect_ratio : config('laravel-media-module.media.uploads.photo.aspect_ratio') !!}';
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! isset($media_category) ? $media_category->datatable_group_action_string : (config('laravel-modules-core.options.media.datatable_group_action') ? 'true' : 'false') !!};
        var rowDetailSupport = {!! isset($media_category) ? $media_category->datatable_detail_string : (config('laravel-modules-core.options.media.datatable_detail') ? 'true' : 'false') !!};
        var datatableFilterSupport = {!! isset($media_category) ? $media_category->datatable_filter_string : (config('laravel-modules-core.options.media.datatable_filter') ? 'true' : 'false') !!};
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/media/index.js') !!}"></script>
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
                <i class="{!! config('laravel-media-module.icons.media') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($media_category))
                        {!! lmcTrans('laravel-media-module/admin.media_category.media.index', ['media_category' => $media_category->name_uc_first]) !!}
                    @else
                        {!! lmcTrans('laravel-media-module/admin.media.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($media_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => [ 'id' =>  $media_category->id, 'route' => 'media_category.media'],
                    'fast_add'  => isset($media_category) ? $media_category->datatable_fast_add : (config('laravel-modules-core.options.media.datatable_fast_add')),
                    'add'       => true,
                    'tools'     => isset($media_category) ? $media_category->datatable_tools : (config('laravel-modules-core.options.media.datatable_tools'))
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module' => 'media',
                    'fast_add'  => isset($media_category) ? $media_category->datatable_fast_add : (config('laravel-modules-core.options.media.datatable_fast_add')),
                    'add'       => true,
                    'tools'     => isset($media_category) ? $media_category->datatable_tools : (config('laravel-modules-core.options.media.datatable_tools'))
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
                    (isset($media_category) && $media_category->datatable_group_action)
                    || (! isset($media_category) && config('laravel-modules-core.options.media.datatable_group_action'))
                )
                    @include('laravel-modules-core::partials.common.indexTableActions', [
                        'actions'   => ['publish','not_publish','destroy','create_album']
                    ])
                @endif
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                        <tr role="row" class="heading">
                            {{-- Datatable Group Action Column --}}
                            @if(
                                (isset($media_category) && $media_category->datatable_group_action)
                                || (! isset($media_category) && config('laravel-modules-core.options.media.datatable_group_action'))
                            )
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(
                                (isset($media_category) && $media_category->datatable_detail)
                                || (! isset($media_category) && config('laravel-modules-core.options.media.datatable_detail'))
                            )
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="20%"> {!! lmcTrans('laravel-media-module/admin.fields.media.media') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-media-module/admin.fields.media.title') !!} </th>
                            <th class="all" width="%30"> {!! lmcTrans('laravel-media-module/admin.fields.media_category.name') !!} </th>
                            <th class="all" width="%30"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(
                            (isset($media_category) && $media_category->datatable_filter)
                            || (! isset($media_category) && config('laravel-modules-core.options.media.datatable_filter'))
                        )
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(
                                (isset($media_category) && $media_category->datatable_group_action)
                                || (! isset($media_category) && config('laravel-modules-core.options.media.datatable_group_action'))
                            )
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(
                                (isset($media_category) && $media_category->datatable_detail)
                                || (! isset($media_category) && config('laravel-modules-core.options.media.datatable_detail'))
                            )
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="title" placeholder="{!! lmcTrans('laravel-media-module/admin.fields.media.title') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="category" placeholder="{!! lmcTrans('laravel-media-module/admin.fields.media_category.name') !!}">
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
            'media.partials.form'        => [
                'helpBlockAfter'    => true
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
