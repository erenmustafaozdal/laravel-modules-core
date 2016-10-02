@extends(config('laravel-media-module.views.media.layout'))

@section('title')
    @if(isset($media_category))
        {!! lmcTrans("laravel-media-module/admin.media_category.media.{$operation}", [
            'media_category' => $media_category->name_uc_first,
            'media'          => $operation === 'edit' ? $media->title_uc_first : null
        ]) !!}
    @else
        {!! lmcTrans("laravel-media-module/admin.media.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($media_category))
        <h1>
            {!! lmcTrans("laravel-media-module/admin.media_category.media.{$operation}", [
                'media_category' => $media_category->name_uc_first,
                'media'          => $operation === 'edit' ? $media->title_uc_first : null
            ]) !!}
            <small>
                {!! lmcTrans("laravel-media-module/admin.media_category.media.{$operation}_description", [
                    'media_category' => $media_category->name_uc_first,
                    'media'          => $operation === 'edit' ? $media->title_uc_first : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-media-module/admin.media.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-media-module/admin.media.{$operation}_description", [
                    'media' => $operation === 'edit' ? $media->title_uc_first : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($media_category))
@section('breadcrumb')
    @if ($operation === 'edit')
        {!! LMCBreadcrumb::getBreadcrumb([$media_category,$media], ['name','title']) !!}
    @else
        {!! LMCBreadcrumb::getBreadcrumb([$media_category], ['name']) !!}
    @endif
@endsection
@endif

@section('css')
    @parent
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/media/operation.js') !!}";
        var videoPhotoJs = "{!! lmcElixir('assets/pages/scripts/media/video_photo.js') !!}";
    {{-- /js file path --}}

    {{-- Description Is Editor --}}
    @if(isset($media_category) && $media_category->description_is_editor)
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
    @endif
    {{-- /Description Is Editor --}}

        {{-- routes --}}
        @if(isset($media_category))
            var modelsURL = "{!! lmbRoute('api.media_category.models', ['id' => $media_category]) !!}";
        @else
            var modelsURL = "{!! lmbRoute('api.media_category.models') !!}";
        @endif
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" },
            photo: { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            video: { required: "{!! LMCValidation::getMessage('video','required') !!}" }
        };
        var validExtension = "{!! config('laravel-media-module.media.uploads.photo.mimes') !!}";
        var aspectRatio = '{!! isset($media_category) && $media_category->aspect_ratio ? $media_category->aspect_ratio : config('laravel-media-module.media.uploads.photo.aspect_ratio') !!}';
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/media/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    {{-- Description Is Editor --}}
    @if(isset($media_category) && $media_category->description_is_editor)
        <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
    @endif
    {{-- /Description Is Editor --}}
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-media-module.icons.media') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($media_category))
                        {!! lmcTrans("laravel-media-module/admin.media_category.media.{$operation}", [
                            'media_category' => $media_category->name_uc_first,
                            'media'          => $operation === 'edit' ? $media->title_uc_first : null
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-media-module/admin.media.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                @if(isset($media_category))
                    {!! getOps($media, 'edit', true, $media_category, config('laravel-media-module.url.media')) !!}
                @else
                    {!! getOps($media, 'edit', true) !!}
                @endif
            </div>
            @endif
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            <?php
                $form = [
                    'method'=> $operation === 'edit' ? 'PATCH' : 'POST',
                    'url'   => isset($media_category) ? lmbRoute('admin.media_category.media.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id'                                    => $media_category->id,
                        config('laravel-media-module.url.media')  => $operation === 'edit' ? $media->id : null
                    ]) : lmbRoute('admin.media.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $media->id : null
                    ]),
                    'class' => 'form',
                    'files' => true
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::media.partials.form')
                @include('laravel-modules-core::partials.form.model_extras_form', [
                    'category'  => isset($media_category) ? $media_category : false,
                    'model'     => isset($media) ? $media : false
                ])
            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
