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

    {{-- Bootstrap Select --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') !!}
    {{-- /Bootstrap Select --}}

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
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/team/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var modelsURL = "{!! lmbRoute('api.team_category.models') !!}";
        var categoriesURL = "{!! lmbRoute('api.team_category.models') !!}";
        var brandsURL = "{!! lmbRoute('api.team_brand.models') !!}";
        var removePhotoURL = "{!! lmbRoute('api.team.removePhoto', ['id' => '###id###']) !!}";
        var setMainPhotoURL = "{!! lmbRoute('api.team.setMainPhoto', ['id' => '###id###']) !!}";
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        var categoryDetailURL = "{!! lmbRoute('api.team_category.detail', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            'category_id': { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            brand_id: { required: "{!! LMCValidation::getMessage('brand_id','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        var validExtension = "{!! config('laravel-team-module.team.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-team-module.team.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-team-module.team.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = "{!! isset($team) ? $team->category->aspect_ratio : config('laravel-team-module.team.uploads.photo.horizontal_ratio') !!}";
        var verticalRatio = "{!! config('laravel-team-module.team.uploads.photo.vertical_ratio') !!}";
        var horizontalRatio = "{!! config('laravel-team-module.team.uploads.photo.horizontal_ratio') !!}";
        {{-- /languages --}}

        {{-- Product Copy Preview --}}
        var initialPreview = false;
        var initialPreviewConfig = false;
        var initialPreviewThumbTags = false;
        @if($operation === 'copy')
            initialPreview = [
            @foreach($team->photos as $photo)
                '{!! $photo->getPhoto([
                    'class'     => 'kv-preview-data file-preview-image jcrop-item img-responsive',
                    'id'        => "img-" . time() . "-{$photo->id}"
                ], 'original', false, 'team','team_id') !!}',
            @endforeach
            ];
            initialPreviewConfig = [
            @foreach($team->photos as $photo)
                {
                    caption: '{{ $photo->photo }}',
                    size: '{{ filesize(removeDomain($photo->getPhoto([], 'original', true, 'team','team_id'))) }}'
                },
            @endforeach
            ];
            initialPreviewThumbTags = [
            @foreach($team->photos as $photo)
                {
                    '{PHOTO_URL}': '{{ removeDomain($photo->getPhoto([], 'original', true, 'team','team_id')) }}'
                },
            @endforeach
            ];
        @endif
        {{-- /Product Copy Preview --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/team/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
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

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.overview') !!}
                    </a>
                </li>
                <li id="descriptions_tab">
                    <a href="#descriptions" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.descriptions') !!}
                    </a>
                </li>
                <li id="seo_tab">
                    <a href="#seo" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.seo') !!}
                    </a>
                </li>
                <li id="showcase_tab">
                    <a href="#showcase" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.showcase') !!}
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
            
            {{-- Copied Id --}}
            @if ($operation === 'copy')
            {!! Form::hidden('id',$team->id) !!}
            @endif
            {{-- /Copied Id --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">

                        @include('laravel-modules-core::team.partials.form')

                        {{-- Product Detail --}}
                        @include('laravel-modules-core::team.partials.detail_form', [
                            'currentPhoto'  => isset($team) && $operation != 'copy'
                        ])
                        {{-- /Product Detail --}}

                    </div>
                    <div class="tab-pane" id="descriptions">
                        @include('laravel-modules-core::team.partials.descriptions_form')
                    </div>
                    <div class="tab-pane" id="seo">
                        @include('laravel-modules-core::team.partials.seo_form')
                    </div>
                    <div class="tab-pane" id="showcase">
                        @include('laravel-modules-core::team.partials.showcase_form')
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
