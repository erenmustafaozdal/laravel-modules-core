@extends(config('laravel-description-module.views.description.layout'))

@section('title')
    @if(isset($description_category))
        {!! lmcTrans('laravel-description-module/admin.description_category.description.show', [
            'description_category' => $description_category->name_uc_first,
            'description'          => $description->title_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-description-module/admin.description.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($description_category))
        <h1>
            {!! lmcTrans('laravel-description-module/admin.description_category.description.show', [
                'description_category' => $description_category->name_uc_first,
                'description'          => $description->title_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-description-module/admin.description_category.description.show_description', [
                    'description_category' => $description_category->name_uc_first,
                    'description'          => $description->title_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-description-module/admin.description.show') !!}
            <small>
                {!! lmcTrans('laravel-description-module/admin.description.show_description', [
                    'description' => $description->title_uc_first
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($description_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$description_category,$description], ['name','title']) !!}
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
        var showJs = "{!! lmcElixir('assets/pages/scripts/description/show.js') !!}";
        {{-- /js file path --}}

        {{-- Description Is Editor --}}
        @if(isset($description_category) && $description_category->description_is_editor)
            var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
            var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        @endif
        {{-- /Description Is Editor --}}

        {{-- routes --}}
        @if(isset($description_category))
            var modelsURL = "{!! lmbRoute('api.description_category.models', ['id' => $description_category]) !!}";
        @else
            var modelsURL = "{!! lmbRoute('api.description_category.models') !!}";
        @endif
        var categoryDetailURL = "{!! lmbRoute('api.description_category.detail', ['id' => '###id###']) !!}";
        var removePhotoURL = "{!! lmbRoute('api.description.removePhoto', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" },
            link: { url: "{!! LMCValidation::getMessage('link','url') !!}" }
        };
        var validExtension = "{!! config('laravel-description-module.description.uploads.file.mimes') !!}";
        var maxSize = "{!! config('laravel-description-module.description.uploads.file.max_size') !!}";
        var maxFile = "{!! config('laravel-description-module.description.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = '{!! isset($description_category) && $description_category->aspect_ratio ? $description_category->aspect_ratio : config('laravel-description-module.description.uploads.photo.aspect_ratio') !!}';
        var hasDescription = {{ ( isset($description) && $description->category->has_description ) || ( isset($description_category) && $description_category->has_description ) || ! isset($description) ? 'true' : 'false' }};
        var hasPhoto = {{ ( isset($description) && $description->category->has_photo ) || ( isset($description_category) && $description_category->has_photo ) || ! isset($description) ? 'true' : 'false' }};
        var hasLink = {{ ( isset($description) && $description->category->has_link ) || ( isset($description_category) && $description_category->has_link ) || ! isset($description) ? 'true' : 'false' }};
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/description/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    {{-- Description Is Editor --}}
    @if(isset($description_category) && $description_category->description_is_editor)
        <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
    @endif
    {{-- /Description Is Editor --}}
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $description->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $description->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-description-module.icons.description') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($description_category))
                        {!! lmcTrans('laravel-description-module/admin.description_category.description.show', [
                            'description_category' => $description_category->name_uc_first,
                            'description'          => $description->title_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans('laravel-description-module/admin.description.show') !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($description_category))
                    {!! getOps($description, 'show', true, $description_category, config('laravel-description-module.url.description')) !!}
                @else
                    {!! getOps($description, 'show', true) !!}
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

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($description_category) ? 'description_category.description' : 'description') .'.update'))
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
                                @include('laravel-modules-core::description.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($description_category) ? 'description_category.description' : 'description') .'.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => isset($description_category) ? lmbRoute('admin.description_category.description.update', [
                                    'id'                                    => $description_category->id,
                                    config('laravel-description-module.url.description')  => $description->id
                                ]) : lmbRoute('admin.description.update', [ 'id' => $description->id ]),
                                'id'        => 'description-edit-info',
                                'files'     => true
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::description.partials.form', [
                                    'isRelation'    => isset($description_category) ? true : false
                                ])
                                @include('laravel-modules-core::partials.form.model_extras_form', [
                                    'category'  => isset($description_category) ? $description_category : false,
                                    'model'     => $description
                                ])
                                <div id="detail">
                                    @include('laravel-modules-core::description.partials.detail_form', [
                                        'currentPhoto'  => false
                                    ])
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
