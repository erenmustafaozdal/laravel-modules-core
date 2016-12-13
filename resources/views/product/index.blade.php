@extends(config('laravel-product-module.views.product.layout'))

@section('title')
    {!! lmcTrans('laravel-product-module/admin.product.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-product-module/admin.product.index') !!}
        <small>{!! lmcTrans('laravel-product-module/admin.product.index_description') !!}</small>
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

    {{-- jCrop Image Crop Extension --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /jCrop Image Crop Extension --}}
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
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var formJs = "{!! lmcElixir('assets/pages/scripts/product/product-form.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/product/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.product.index') !!}";
        var categoryURL = "{!! lmbRoute('admin.product_category.show', ['id' => '###id###']) !!}";
        var brandURL = "{!! lmbRoute('admin.product_brand.show', ['id' => '###id###']) !!}";
        var categoriesURL = "{!! lmbRoute('api.product_category.models') !!}";
        var brandsURL = "{!! lmbRoute('api.product_brand.models') !!}";
        var apiStoreURL = "{!! lmbRoute('api.product.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.product.group') !!}";
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        var removePhotoURL = "{!! lmbRoute('api.product.removePhoto', ['id' => '###id###']) !!}";
        var setMainPhotoURL = "{!! lmbRoute('api.product.setMainPhoto', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            'photo[]': { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        var validExtension = "{!! config('laravel-product-module.product.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-product-module.product.uploads.photo.max_size') !!}";
        var aspectRatio = 1;
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! config('laravel-modules-core.options.product.datatable_group_action') ? 'true' : 'false' !!};
        var rowDetailSupport = {!! config('laravel-modules-core.options.product.datatable_detail') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.product.datatable_filter') ? 'true' : 'false' !!};
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product/index.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-product-module.icons.product') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-product-module/admin.product.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module' => 'product',
                'fast_add'  => config('laravel-modules-core.options.product.datatable_fast_add'),
                'add'       => true,
                'tools'     => config('laravel-modules-core.options.product.datatable_tools')
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
                        'actions'   => ['publish','not_publish','destroy']
                    ])
                @endif
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                        <tr role="row" class="heading">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.product.datatable_group_action'))
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.product.datatable_detail'))
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="2%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="10%"> {!! lmcTrans('laravel-product-module/admin.fields.product.main_photo') !!} </th>
                            <th class="all" width="10%"> {!! lmcTrans('laravel-product-module/admin.fields.product.name') !!} </th>
                            <th class="all" width="5%"> {!! lmcTrans('laravel-product-module/admin.fields.product.code') !!} </th>
                            <th class="all" width="15%"> {!! lmcTrans('laravel-product-module/admin.fields.product_category.name') !!} </th>
                            <th class="all" width="10%"> {!! lmcTrans('laravel-product-module/admin.fields.product_brand.name') !!} </th>
                            <th class="all" width="15%"> {!! lmcTrans('laravel-product-module/admin.fields.product.amount') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="13%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(config('laravel-modules-core.options.product.datatable_filter'))
                        <tr role="row" class="filter">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.product.datatable_group_action'))
                                <td></td>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.product.datatable_detail'))
                                <td></td>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="name" placeholder="{!! lmcTrans('laravel-product-module/admin.fields.product.name') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="code" placeholder="{!! lmcTrans('laravel-product-module/admin.fields.product.code') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="category" placeholder="{!! lmcTrans('laravel-product-module/admin.fields.product_category.name') !!}">
                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="brand" placeholder="{!! lmcTrans('laravel-product-module/admin.fields.product_brand.name') !!}">
                            </td>
                            <td>
                                @include('laravel-modules-core::partials.common.datatables.filterTouchSpin', ['id' => 'amount'])
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
            'product.partials.form' => [
                'helpBlockAfter'    => true
            ],
            'product.partials.short_description_form' => [
                'helpBlockAfter'    => true
            ],
            'partials.form.fileinput_form' => [
                'label'         => lmcTrans('laravel-product-module/admin.fields.product.photo'),
                'input_name'    => 'photo',
                'input_id'      => 'photo',
                'elfinder'      => true,
                'elfinder_id'   => 'elfinder-photo',
                'multiple'      => false
            ],
            'product.partials.seo_form' => [
                'helpBlockAfter'    => true
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
