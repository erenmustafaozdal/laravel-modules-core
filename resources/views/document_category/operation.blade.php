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
    {!! LMCBreadcrumb::getBreadcrumb([$parent_document_category], ['name']) !!}
@endsection
@endif

@section('css')
    @parent
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
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
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-document-module.icons.document_category') !!} font-red"></i>
                <span class="caption-subject font-red">
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

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.overview') !!}
                    </a>
                </li>
                @if(! isset($parent_document_category) || ! $parent_document_category->config_propagation)
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
                    'url'   => isset($parent_document_category) ? lmbRoute('admin.document_category.document_category.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $parent_document_category->id,
                        config('laravel-document-module.url.document_category') => $operation === 'edit' ? $document_category->id : null
                    ]) : lmbRoute('admin.document_category.' . ($operation === 'edit' ? 'update' : 'store'),[
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

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('laravel-modules-core::document_category.partials.form', [
                            'parent'    => isset($parent_document_category) ? $parent_document_category : false
                        ])
                    </div>
                    <div class="tab-pane" id="photo_configs">
                        @include('laravel-modules-core::partials.form.photo_config_form', [
                            'parent'    => isset($parent_document_category) ? $parent_document_category : false,
                            'model'     => isset($document_category) ? $document_category : false
                        ])
                    </div>
                    <div class="tab-pane" id="extra_columns">
                        @include('laravel-modules-core::partials.form.extra_column_form', [
                            'parent'    => isset($parent_document_category) ? $parent_document_category : false,
                            'model'     => isset($document_category) ? $document_category : false
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
