@extends(config('laravel-description-module.views.description.layout'))

@section('title')
    @if(isset($description_category))
        {!! lmcTrans("laravel-description-module/admin.description_category.description.{$operation}", [
            'description_category' => $description_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans("laravel-description-module/admin.description.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($description_category))
        <h1>
            {!! lmcTrans("laravel-description-module/admin.description_category.description.{$operation}", [
                'description_category' => $description_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans("laravel-description-module/admin.description_category.description.{$operation}_description", [
                    'description_category' => $description_category->name_uc_first,
                    'description'          => $operation === 'edit' ? $description->title_uc_first : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-description-module/admin.description.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-description-module/admin.description.{$operation}_description", [
                    'description' => $operation === 'edit' ? $description->title_uc_first : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($description_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$description_category], ['name']) !!}
@endsection
@endif

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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/description/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($description_category))
            var modelsURL = "{!! route('api.description_category.models', ['id' => $description_category]) !!}";
        @else
            var modelsURL = "{!! route('api.description_category.models') !!}";
        @endif
        var categoryDetailURL = "{!! route('api.description_category.detail', ['id' => '###id###']) !!}";
        var removePhotoURL = "{!! route('api.description.removePhoto', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" },
            link: { url: "{!! LMCValidation::getMessage('link','url') !!}" }
        };
        var validExtension = "{!! config('laravel-description-module.description.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-description-module.description.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-description-module.description.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = '{!! config('laravel-description-module.description.uploads.photo.aspect_ratio') !!}';
        var hasDescription = {{ ( isset($description) && $description->category->has_description ) || ( isset($description_category) && $description_category->has_description ) || (! isset($description) && ! isset($description_category)) ? 'true' : 'false' }};
        var hasPhoto = {{ ( isset($description) && $description->category->has_photo ) || ( isset($description_category) && $description_category->has_photo ) || (! isset($description) && ! isset($description_category)) ? 'true' : 'false' }};
        var hasLink = {{ ( isset($description) && $description->category->has_link ) || ( isset($description_category) && $description_category->has_link ) || (! isset($description) && ! isset($description_category)) ? 'true' : 'false' }};
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/description/operation.js') !!}"></script>
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
                <i class="{!! config('laravel-description-module.icons.description') !!} font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    @if(isset($description_category))
                        {!! lmcTrans("laravel-description-module/admin.description_category.description.{$operation}", [
                            'description_category' => $description_category->name_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-description-module/admin.description.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                @if(isset($description_category))
                    {!! getOps($description, 'edit', true, $description_category, config('laravel-description-module.url.description')) !!}
                @else
                    {!! getOps($description, 'edit', true) !!}
                @endif
            </div>
            @endif
            {{-- /Actions --}}

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.overview') !!}
                    </a>
                </li>
                <li id="detail_tab">
                    <a href="#detail" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.detail') !!}
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
                    'url'   => isset($description_category) ? route('admin.description_category.description.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id'                                    => $description_category->id,
                        config('laravel-description-module.url.description')  => $operation === 'edit' ? $description->id : null
                    ]) : route('admin.description.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $description->id : null
                    ]),
                    'class' => 'form',
                    'files' => true
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('laravel-modules-core::description.partials.form', [
                            'isRelation'    => isset($description_category) ? true : false
                        ])
                    </div>
                    <div class="tab-pane" id="detail">
                        @include('laravel-modules-core::description.partials.detail_form', [
                            'currentPhoto'  => isset($description)
                        ])
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
