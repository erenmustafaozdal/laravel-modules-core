@extends(config('laravel-document-module.views.document.layout'))

@section('title')
    @if(isset($document_category))
        {!! lmcTrans("laravel-document-module/admin.document_category.document.{$operation}", [
            'document_category' => $document_category->name
        ]) !!}
    @else
        {!! lmcTrans("laravel-document-module/admin.document.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($document_category))
        <h1>
            {!! lmcTrans("laravel-document-module/admin.document_category.document.{$operation}", [
                'document_category' => $document_category->name
            ]) !!}
            <small>
                {!! lmcTrans("laravel-document-module/admin.document_category.document.{$operation}_description", [
                    'document_category' => $document_category->name,
                    'document'          => $operation === 'edit' ? $document->title : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-document-module/admin.document.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-document-module/admin.document.{$operation}_description", [
                    'document' => $operation === 'edit' ? $document->title : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($document_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb($document_category, 'name') !!}
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/document/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($document_category))
            var modelsURL = "{!! route('api.document_category.models', ['id' => $document_category]) !!}";
        @else
            var modelsURL = "{!! route('api.document_category.models') !!}";
        @endif
        var tinymceURL = "{!! route('elfinder.tinymce4') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" }
        };
        var validExtension = "{!! config('laravel-document-module.document.uploads.mimes') !!}";
        var maxSize = "{!! config('laravel-document-module.document.uploads.max_size') !!}";
        var aspectRatio = '{!! config('laravel-document-module.document.uploads.aspect_ratio') !!}';
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/document/operation.js') !!}"></script>
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
                <i class="icon-note font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans("laravel-document-module/admin.document.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                @if(isset($document_category))
                    {!! getOps($document, 'edit', true, $document_category, config('laravel-document-module.url.document')) !!}
                @else
                    {!! getOps($document, 'edit', true) !!}
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
                @if(
                    // Document Edit && Category Documents Edit
                    ( isset($document) && $document->category->has_description )
                    || ( isset($document) && $document->category->has_photo )

                    // Category Documents Create
                    || ( isset($document_category) && $document_category->has_description )
                    || ( isset($document_category) && $document_category->has_photo )

                    // Document Create
                    || ! isset($document)
                )
                <li>
                    <a href="#detail" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.detail') !!}
                    </a>
                </li>
                @endif
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
                    'url'   => isset($document_category) ? route('admin.document_category.document.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id'                                    => $document_category->id,
                        config('laravel-document-module.url.document')  => $operation === 'edit' ? $document->id : null
                    ]) : route('admin.document.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $document->id : null
                    ]),
                    'class' => 'form'
                ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($document,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('laravel-modules-core::document.partials.form', [
                            'isRelation'    => isset($document_category) ? true : false
                        ])
                    </div>

                    @if(
                        // Document Edit && Category Documents Edit
                        ( isset($document) && $document->category->has_description )
                        || ( isset($document) && $document->category->has_photo )

                        // Category Documents Create
                        || ( isset($document_category) && $document_category->has_description )
                        || ( isset($document_category) && $document_category->has_photo )

                        // Document Create
                        || ! isset($document)
                    )
                    <div class="tab-pane" id="detail">
                        @include('laravel-modules-core::document.partials.detail_form')
                    </div>
                    @endif
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
