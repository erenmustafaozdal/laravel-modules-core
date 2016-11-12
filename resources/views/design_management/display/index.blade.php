@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans('ezelnet-frontend-module/admin.display.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('ezelnet-frontend-module/admin.display.index') !!}
        <small>{!! lmcTrans('ezelnet-frontend-module/admin.display.index_description') !!}</small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Jquery Mini Color Picker --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jquery-minicolors/jquery.minicolors.css') !!}
    {{-- /Jquery Mini Color Picker --}}

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
        var formJs = "{!! lmcElixir('assets/pages/scripts/design_management/display/display-form.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/design_management/display/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.display.index') !!}";
        var apiStoreURL = "{!! lmbRoute('api.display.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.display.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            photo: { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            // main
            'first_mini_photo[first_mini_photo]': { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            first_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" },
            'second_mini_photo[second_mini_photo]': { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            second_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" },
            'third_mini_photo[third_mini_photo]': { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            third_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" }
        };
        var validExtension = "{!! config('ezelnet-frontend-module.display.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('ezelnet-frontend-module.display.uploads.photo.max_size') !!}";
        var aspectRatio = "{!! config('ezelnet-frontend-module.display.uploads.photo.aspect_ratio') !!}";
        var mainAspectRatio = "{!! config('ezelnet-frontend-module.display_main.uploads.photo.aspect_ratio.photo') !!}";
        var firstAspectRatio = "{!! config('ezelnet-frontend-module.display_main.uploads.photo.aspect_ratio.first_mini_photo') !!}";
        var secondAspectRatio = "{!! config('ezelnet-frontend-module.display_main.uploads.photo.aspect_ratio.second_mini_photo') !!}";
        var thirdAspectRatio = "{!! config('ezelnet-frontend-module.display_main.uploads.photo.aspect_ratio.third_mini_photo') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/design_management/display/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            <div class="caption">
                <i class="fa fa-picture-o font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('ezelnet-frontend-module/admin.display.index') !!}
                </span>
            </div>

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#table" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.table') !!}
                    </a>
                </li>
                <li>
                    <a href="#configs" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.configs') !!}
                    </a>
                </li>
            </ul>
            {{-- /Nav Tabs --}}
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Tab Contents --}}
            <div class="tab-content">
                <div class="tab-pane active" id="table">
                    <div class="table-container">

                        <div class="pull-right margin-bottom-25">
                            @include('laravel-modules-core::partials.common.indexActions', [
                                'module'    => 'display',
                                'fast_add'  => true,
                                'add'       => true,
                                'tools'     => false
                            ])
                        </div>

                        {{-- Table Actions --}}
                        @include('laravel-modules-core::partials.common.indexTableActions', [
                            'actions'   => ['publish','not_publish','destroy']
                        ])
                        {{-- /Table Actions --}}

                        {{-- DataTable --}}
                        <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                            <thead>
                                <tr role="row" class="heading">
                                    {{-- Datatable Group Action Column --}}
                                    <th class="all" width="5%"> <input type="checkbox" class="group-checkable"> </th>
                                    {{-- /Datatable Group Action Column --}}

                                    <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                                    <th class="all" width="40%"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.photo') !!} </th>
                                    <th class="all" width="15%"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                                    <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                                    <th class="all" width="15%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                                </tr>

                                {{-- Datatable Filter --}}
                                <tr role="row" class="filter">
                                    {{-- Datatable Group Action Column --}}
                                    <td></td>
                                    {{-- /Datatable Group Action Column --}}

                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                                    </td>
                                    <td> </td>
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
                                {{-- /Datatable Filter --}}

                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        {{-- /DataTable --}}
                    </div>
                </div>
                <div class="tab-pane" id="configs">
                    {!! Form::open([
                        'method'    => 'POST',
                        'url'       => lmbRoute('admin.display.mainUpdate'),
                        'class'     => 'form-horizontal form-bordered',
                        'files'     => true
                    ]) !!}
                        @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                        @include('laravel-modules-core::design_management.display.partials.main_form')
                        @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                    {!! Form::close() !!}
                </div>
            </div>
            {{-- /Tab Contents --}}

        </div>
        {{-- /Table Portlet Body --}}
    </div>
    {{-- /Table Portlet --}}
    
    {{-- Create and Edit modal --}}
    @include('laravel-modules-core::partials.common.datatables.modal', [
        'includes' => [
            'design_management.display.partials.form'        => [
                'columns'           => false,
                'helpBlockAfter'    => true
            ]
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
