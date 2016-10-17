@extends(config('laravel-media-module.views.media_category.layout'))

@section('title')
    @if(isset($parent_media_category))
        {!! lmcTrans("laravel-media-module/admin.media_category.media_category.{$operation}", [
            'parent_media_category' => $parent_media_category->name
        ]) !!}
    @else
        {!! lmcTrans("laravel-media-module/admin.media_category.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_media_category))
        <h1>
            {!! lmcTrans("laravel-media-module/admin.media_category.media_category.{$operation}", [
                'parent_media_category'  => $parent_media_category->name
            ]) !!}
            <small>
                {!! lmcTrans("laravel-media-module/admin.media_category.media_category.{$operation}_description", [
                    'parent_media_category'  => $parent_media_category->name,
                    'media_category'         => $operation === 'edit' ? $media_category->name : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-media-module/admin.media_category.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-media-module/admin.media_category.{$operation}_description",
                [
                    'media_category'     => $operation === 'edit' ? $media_category->name : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($parent_media_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_media_category], ['name']) !!}
@endsection
@endif

@section('css')
    @parent
    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/media_category/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            type: { required: "{!! LMCValidation::getMessage('type','required') !!}" },
            gallery_type: { required: "{!! LMCValidation::getMessage('gallery_type','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/media_category/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-media-module.icons.media_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_media_category))
                        {!! lmcTrans("laravel-media-module/admin.media_category.media_category.{$operation}", [
                            'parent_media_category' => $parent_media_category->name
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-media-module/admin.media_category.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
                <div class="actions pull-left">
                    @if(isset($parent_media_category))
                        {!! getOps($media_category, 'edit', false, $parent_media_category, config('laravel-page-module.url.media_category')) !!}
                    @else
                        {!! getOps($media_category, 'edit', false) !!}
                    @endif
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
                @if(! isset($parent_media_category) || ! $parent_media_category->config_propagation)
                    <li>
                        <a href="#photo_configs" data-toggle="tab" aria-expanded="true">
                            {!! lmcTrans('admin.fields.photo_configs') !!}
                        </a>
                    </li>
                    <li>
                        <a href="#extra_columns" data-toggle="tab" aria-expanded="true">
                            {!! lmcTrans('admin.fields.extra_columns') !!}
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
                    'url'   => isset($parent_media_category) ? lmbRoute('admin.media_category.media_category.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $parent_media_category->id,
                        config('laravel-media-module.url.media_category') => $operation === 'edit' ? $media_category->id : null, 'form' => 'general'
                    ]) : lmbRoute('admin.media_category.' . ($operation === 'edit' ? 'update' : 'store'),[
                            'id' => $operation === 'edit' ? $media_category->id : null, 'form' => 'general'
                    ]),
                    'class' => 'form'
            ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($media_category,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('laravel-modules-core::media_category.partials.form', [
                            'parent'    => isset($parent_media_category) ? $parent_media_category : false
                        ])

                        @if(isset($medias) && $medias->count() > 0)
                            @include('laravel-modules-core::media_category.partials.medias_list')
                        @endif
                    </div>
                    <div class="tab-pane" id="photo_configs">
                        @include('laravel-modules-core::partials.form.photo_config_form', [
                            'parent'    => isset($parent_media_category) ? $parent_media_category : false,
                            'model'     => isset($media_category) ? $media_category : false
                        ])
                    </div>
                    <div class="tab-pane" id="extra_columns">
                        @include('laravel-modules-core::partials.form.extra_column_form', [
                            'parent'    => isset($parent_media_category) ? $parent_media_category : false,
                            'model'     => isset($media_category) ? $media_category : false
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
