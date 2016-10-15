@extends(config('laravel-team-module.views.team.layout'))

@section('title')
    {!! lmcTrans("laravel-team-module/admin.team.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-team-module/admin.team.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-team-module/admin.team.{$operation}_description", [
                'team' => $operation === 'edit' || $operation === 'copy' ? $team->name_uc_first : null
            ]) !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/team/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var modelsURL = "{!! lmbRoute('api.team_category.models') !!}";
        var categoriesURL = "{!! lmbRoute('api.team_category.models') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            first_name: { required: "{!! LMCValidation::getMessage('first_name','required') !!}" },
            last_name: { required: "{!! LMCValidation::getMessage('last_name','required') !!}" },
            'social-account[][url]': { url: "{!! LMCValidation::getMessage('url','url') !!}" }
        };
        var validExtension = "{!! config('laravel-team-module.team.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-team-module.team.uploads.photo.max_size') !!}";
        var aspectRatio = "{!! config('laravel-team-module.team.uploads.photo.aspect_ratio') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/team/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-team-module.icons.team') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-team-module/admin.team.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                {!! getOps($team, 'edit', true) !!}
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
                    'url'   => lmbRoute('admin.team.' . ($operation === 'edit' ? 'update' : ($operation === 'copy' ? 'storeCopy' : 'store')), [
                            'id' => $operation === 'edit' || $operation === 'copy' ? $team->id : null
                    ]),
                    'class' => 'form',
                    'files' => true
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                @include('laravel-modules-core::team.partials.form')
                @include('laravel-modules-core::team.partials.detail_form')

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
