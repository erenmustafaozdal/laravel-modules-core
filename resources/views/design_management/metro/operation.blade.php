@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.metro.edit") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.metro.edit") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.metro.edit_description") !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
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
        var modelJs = "{!! lmcElixir('assets/pages/scripts/design_management/metro/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            first_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" },
            second_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" },
            third_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" },
            fourth_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" },
            fifth_link: { url: "{!! LMCValidation::getMessage('link','url') !!}" }
        };
        var validExtension = "{!! config('ezelnet-frontend-module.metro.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('ezelnet-frontend-module.metro.uploads.photo.max_size') !!}";
        var aspectRatio = 1;
        var photoAspectRatio = "{!! config('ezelnet-frontend-module.metro.uploads.photo.aspect_ratio.photo') !!}";
        var firstAspectRatio = "{!! config('ezelnet-frontend-module.metro.uploads.photo.aspect_ratio.first_mini_photo') !!}";
        var secondAspectRatio = "{!! config('ezelnet-frontend-module.metro.uploads.photo.aspect_ratio.second_mini_photo') !!}";
        var thirdAspectRatio = "{!! config('ezelnet-frontend-module.metro.uploads.photo.aspect_ratio.third_mini_photo') !!}";
        var fourthAspectRatio = "{!! config('ezelnet-frontend-module.metro.uploads.photo.aspect_ratio.fourth_mini_photo') !!}";
        var fifthAspectRatio = "{!! config('ezelnet-frontend-module.metro.uploads.photo.aspect_ratio.fifth_mini_photo') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/design_management/metro/operation.js') !!}"></script>
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
                    {!! lmcTrans("ezelnet-frontend-module/admin.metro.edit") !!}
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
                'method'=> 'POST',
                'url'   => lmbRoute('admin.metro.update'),
                'class' => 'form-horizontal form-bordered',
                'files' => true
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])


            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::design_management.metro.partials.form', [
                    'columns'   => true
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
