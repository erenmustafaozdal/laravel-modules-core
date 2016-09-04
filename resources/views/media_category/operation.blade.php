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
            type: { required: "{!! LMCValidation::getMessage('type','required') !!}" }
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
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-media-module.icons.media_category') !!} font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
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
                    'url'   => isset($parent_media_category) ? route('admin.media_category.media_category.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $parent_media_category->id,
                        config('laravel-media-module.url.media_category') => $operation === 'edit' ? $media_category->id : null
                    ]) : route('admin.media_category.' . ($operation === 'edit' ? 'update' : 'store'),[
                            'id' => $operation === 'edit' ? $media_category->id : null,
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
                @include('laravel-modules-core::media_category.partials.form', [
                    'parent'    => isset($parent_media_category) ? $parent_media_category : false
                ])

                @if(isset($medias) && $medias->count() > 0)
                    @include('laravel-modules-core::media_category.partials.medias_list')
                @endif
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
