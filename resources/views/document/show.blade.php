@extends(config('laravel-document-module.views.document.layout'))

@section('title')
    @if(isset($document_category))
        {!! lmcTrans('laravel-document-module/admin.document_category.document.show', [
            'document_category' => $document_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-document-module/admin.document.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>
            {!! lmcTrans('laravel-document-module/admin.document_category.document.show', [
                'document_category' => $document_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-document-module/admin.document_category.document.show_description', [
                    'document_category' => $document_category->name_uc_first,
                    'document'          => $document->title_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-document-module/admin.document.show') !!}
            <small>
                {!! lmcTrans('laravel-document-module/admin.document.show_description', [
                    'document' => $document->title_uc_first
                ]) !!}
            </small>
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
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

    {{-- Date Picker --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {{-- /Date Picker --}}

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
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/document/show.js') !!}";
        {{-- /js file path --}}

        {{-- Description Is Editor --}}
        @if(isset($document_category) && $document_category->description_is_editor)
            var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
            var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        @endif
        {{-- /Description Is Editor --}}

        {{-- routes --}}
        @if(isset($document_category))
            var modelsURL = "{!! lmbRoute('api.document_category.models', ['id' => $document_category]) !!}";
        @else
            var modelsURL = "{!! lmbRoute('api.document_category.models') !!}";
        @endif
        var categoryDetailURL = "{!! lmbRoute('api.document_category.detail', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" }
        };
        var validExtension = "{!! config('laravel-document-module.document.uploads.file.mimes') !!}";
        var maxSize = "{!! config('laravel-document-module.document.uploads.file.max_size') !!}";
        var aspectRatio = '{!! isset($document_category) && $document_category->aspect_ratio ? $document_category->aspect_ratio : config('laravel-document-module.document.uploads.photo.aspect_ratio') !!}';
        var hasDescription = {{ ( isset($document) && $document->category->has_description ) || ( isset($document_category) && $document_category->has_description ) || ! isset($document) ? 'true' : 'false' }};
        var hasPhoto = {{ ( isset($document) && $document->category->has_photo ) || ( isset($document_category) && $document_category->has_photo ) || ! isset($document) ? 'true' : 'false' }};
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/document/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    {{-- Description Is Editor --}}
    @if(isset($document_category) && $document_category->description_is_editor)
        <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
    @endif
    {{-- /Description Is Editor --}}
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $document->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $document->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-document-module.icons.document') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($document_category))
                        {!! lmcTrans('laravel-document-module/admin.document_category.document.show', [
                            'document_category' => $document_category->name_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans('laravel-document-module/admin.document.show') !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($document_category))
                    {!! getOps($document, 'show', true, $document_category, config('laravel-document-module.url.document')) !!}
                @else
                    {!! getOps($document, 'show', true) !!}
                @endif
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title --}}

        {{-- Portlet Body --}}
        <div class="portlet-body profile">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="row profile-account">

                {{-- Profile Navigation --}}
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-40">
                        <li class="active">
                            <a data-toggle="tab" href="#overview">
                                <i class="fa fa-info"></i>
                                {!! trans('laravel-modules-core::admin.fields.overview') !!}
                            </a>
                            <span class="after"> </span>
                        </li>

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($document_category) ? 'document_category.document' : 'document') .'.update'))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            {{-- /Profile Navigation --}}

                {{-- Profile Content --}}
                <div class="col-md-9">
                    <div class="tab-content">

                        {{-- Overview --}}
                        <div id="overview" class="tab-pane active">
                            <div class="profile-info">
                                @include('laravel-modules-core::document.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($document_category) ? 'document_category.document' : 'document') .'.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => isset($document_category) ? lmbRoute('admin.document_category.document.update', [
                                    'id'                                    => $document_category->id,
                                    config('laravel-document-module.url.document')  => $document->id
                                ]) : lmbRoute('admin.document.update', [ 'id' => $document->id ]),
                                'id'        => 'document-edit-info',
                                'files'     => true
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::document.partials.form', [
                                    'isRelation'    => isset($page_category) ? true : false
                                ])
                                @include('laravel-modules-core::partials.form.model_extras_form', [
                                    'category'  => isset($document_category) ? $document_category : false,
                                    'model'     => $document
                                ])
                                <div id="detail">
                                    @include('laravel-modules-core::document.partials.detail_form')
                                </div>
                            </div>
                            {{-- /Form Body --}}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                            {!! Form::close() !!}
                        </div>
                        @endif
                        {{-- /Edit Info --}}

                    </div>
                </div>
                {{-- /Profile Content --}}

            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
