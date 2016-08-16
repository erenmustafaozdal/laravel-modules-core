@extends(config('laravel-document-module.views.document_category.layout'))

@section('title')
    @if(isset($parent_document_category))
        {!! lmcTrans('laravel-document-module/admin.document_category.document_category.create', ['parent_document_category' => $parent_document_category->name]) !!}
    @else
        {!! lmcTrans('laravel-document-module/admin.document_category.create') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_document_category))
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.document_category.create', ['parent_document_category' => $parent_document_category->name]) !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.document_category.create_description', ['parent_document_category' => $parent_document_category->name]) !!}</small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.create') !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.create_description') !!}</small>
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
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: {
                required: "{!! LMCValidation::getMessage('name','required') !!}"
            }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        $script.ready('jquery', function()
        {
            $script("{!! lmcElixir('assets/pages/scripts/document_category/create.js') !!}",'create');
        });
        $script.ready(['config','create'], function()
        {
            Create.init();
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption">
                <i class="icon-note font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    @if(isset($parent_document_category))
                        {!! lmcTrans('laravel-document-module/admin.document_category.document_category.create', ['parent_document_category' => $parent_document_category->name]) !!}
                    @else
                        {!! lmcTrans('laravel-document-module/admin.document_category.create') !!}
                    @endif
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

            {{-- Create Form --}}
            {!! Form::open([
                'method'    => 'POST',
                'url'       => isset($parent_document_category) ? route('admin.document_category.document_category.store', [
                    'id'    => $parent_document_category->id
                ]) : route('admin.document_category.store'),
                'class'     => 'form'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::document_category.partials.form', [
                    'parent'    => isset($parent_document_category) ? $parent_document_category : false,
                    'model'     => false
                ])
            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Create Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
