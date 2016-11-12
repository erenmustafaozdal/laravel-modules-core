@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.creative.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.creative.{$operation}") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.creative.{$operation}_description") !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Bootstrap Select --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') !!}
    {{-- /Bootstrap Select --}}

    {{-- Jquery Mini Color Picker --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jquery-minicolors/jquery.minicolors.css') !!}
    {{-- /Jquery Mini Color Picker --}}

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
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var modelJs = "{!! lmcElixir('assets/pages/scripts/design_management/business/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            photo: { required: "{!! LMCValidation::getMessage('photo','required') !!}" },
            link: { url: "{!! LMCValidation::getMessage('link','url') !!}" }
        };
        var validExtension = "{!! config('ezelnet-frontend-module.creative.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('ezelnet-frontend-module.creative.uploads.photo.max_size') !!}";
        var aspectRatio = 1;
        var photoAspectRatio = '{!! config('ezelnet-frontend-module.creative.uploads.photo.aspect_ratio.photo') !!}';
        var miniPhotoAspectRatio = '{!! config('ezelnet-frontend-module.creative.uploads.photo.aspect_ratio.mini_photo') !!}';
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/design_management/business/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-picture-o font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("ezelnet-frontend-module/admin.creative.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            {!! Form::open([
                'method'=> $operation === 'edit' ? 'PATCH' : 'POST',
                'url'   => lmbRoute('admin.creative.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $operation === 'edit' ? $model->id : null
                ]),
                'class' => 'form-horizontal form-bordered',
                'files' => true
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])


            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::design_management.business.partials.form', [
                    'columns'   => true
                ])
                @include('laravel-modules-core::design_management.business.partials.detail_form')
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
