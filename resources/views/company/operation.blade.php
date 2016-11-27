@extends(config('laravel-company-module.views.company.layout'))

@section('title')
    {!! lmcTrans("laravel-company-module/admin.company.edit") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-company-module/admin.company.edit") !!}
        <small>
            {!! lmcTrans("laravel-company-module/admin.company.edit_description", [
                'company' => ! is_null($company) ? $company->title_uc_first : null
            ]) !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent

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
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/company/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        var removePhotoURL = "{!! lmbRoute('api.company.removePhoto') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" }
        };
        var validExtension = "{!! config('laravel-company-module.company.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-company-module.company.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-company-module.company.uploads.photo.max_file') !!}";
        var aspectRatio = '{!! config('laravel-company-module.company.uploads.photo.aspect_ratio') !!}';
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/company/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-company-module.icons.company') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-company-module/admin.company.edit") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#company_profile_info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('laravel-company-module/admin.fields.company.company_profile_info') !!}
                    </a>
                </li>
                <li>
                    <a href="#mission_vision_info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('laravel-company-module/admin.fields.company.mission_vision_info') !!}
                    </a>
                </li>
                <li>
                    <a href="#photo_info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('laravel-company-module/admin.fields.company.photo') !!}
                    </a>
                </li>
                <li>
                    <a href="#value_info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('laravel-company-module/admin.fields.company.value') !!}
                    </a>
                </li>
                <li>
                    <a href="#seo_info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.seo') !!}
                    </a>
                </li>
            </ul>
            {{-- /Nav Tabs --}}
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
                'url'   => lmbRoute('admin.company.update'),
                'class' => 'form',
                'files' => true
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])


            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="company_profile_info">
                        @include('laravel-modules-core::company.partials.form')
                    </div>
                    <div class="tab-pane" id="mission_vision_info">
                        @include('laravel-modules-core::company.partials.mission_vision_form')
                    </div>
                    <div class="tab-pane" id="photo_info">
                        @include('laravel-modules-core::company.partials.photo_form')
                    </div>
                    <div class="tab-pane" id="value_info">
                        @include('laravel-modules-core::company.partials.value_form')
                    </div>
                    <div class="tab-pane" id="seo_info">
                        @include('laravel-modules-core::company.partials.seo_form')
                    </div>
                </div>
                {{-- /Tab Contents --}}

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
