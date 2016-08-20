@extends(config('laravel-document-module.views.document_category.layout'))

@section('title')
    @if(isset($parent_document_category))
        {!! lmcTrans("laravel-document-module/admin.document_category.document_category.{$operation}", [
            'parent_document_category' => $parent_document_category->name
        ]) !!}
    @else
        {!! lmcTrans("laravel-document-module/admin.document_category.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_document_category))
        <h1>
            {!! lmcTrans("laravel-document-module/admin.document_category.document_category.{$operation}", [
                'parent_document_category'  => $parent_document_category->name
            ]) !!}
            <small>
                {!! lmcTrans("laravel-document-module/admin.document_category.document_category.{$operation}_description", [
                    'parent_document_category'  => $parent_document_category->name,
                    'document_category'         => $operation === 'edit' ? $document_category->name : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-document-module/admin.document_category.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-document-module/admin.document_category.{$operation}_description",
                [
                    'document_category'     => $operation === 'edit' ? $document_category->name : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($parent_document_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb($parent_document_category, 'name') !!}
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/document_category/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/document_category/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-note font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    @if(isset($parent_document_category))
                        {!! lmcTrans("laravel-document-module/admin.document_category.document_category.{$operation}", [
                            'parent_document_category' => $parent_document_category->name
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-document-module/admin.document_category.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
                <div class="actions pull-left">
                    @if(isset($parent_document_category))
                        {!! getOps($document_category, 'edit', false, $parent_document_category, config('laravel-page-module.url.document_category')) !!}
                    @else
                        {!! getOps($document_category, 'edit', false) !!}
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
                    'url'   => isset($parent_document_category) ? route('admin.document_category.document_category.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $parent_document_category->id,
                        config('laravel-document-module.url.document_category') => $operation === 'edit' ? $document_category->id : null
                    ]) : route('admin.document_category.' . ($operation === 'edit' ? 'update' : 'store'),[
                            'id' => $operation === 'edit' ? $document_category->id : null,
                    ]),
                    'class' => 'form'
            ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($document_category,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::document_category.partials.form', [
                    'parent'    => isset($parent_document_category) ? $parent_document_category : false
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
