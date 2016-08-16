@extends(config('laravel-document-module.views.document_category.layout'))

@section('title')
    @if(isset($document_category))
        {!! lmcTrans('laravel-document-module/admin.document_category.document_category.index', ['document_category' => $document_category->name]) !!}
    @else
        {!! lmcTrans('laravel-document-module/admin.document_category.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($document_category))
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.document_category.index', ['document_category' => $document_category->name]) !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.document_category.index_description', ['document_category' => $document_category->name]) !!}</small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.index') !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.index_description') !!}</small>
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
    {{-- Bootstrap gTreeTable --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-gtreetable/dist/bootstrap-gtreetable.min.css') !!}
    {{-- /Bootstrap gTreeTable --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var gtreetableJs = "{!! lmcElixir('assets/app/gTreeTable.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($document_category))
        var ajaxURL = "{!! route('api.document_category.document_category.index', ['id' => $document_category->id]) !!}";
        var showURL = "{!! route('admin.document_category.show', [
            'id' => $document_category->id,
            config('laravel-document-module.url.document_category') => '###id###'
        ]) !!}";
        var editURL = "{!! route('admin.document_category.edit', [
            'id' => $document_category->id,
            config('laravel-document-module.url.document_category') => '###id###'
        ]) !!}";
        @else
        var ajaxURL = "{!! route('api.document_category.index') !!}";
        var showURL = "{!! route('admin.document_category.show', ['id' => '###id###']) !!}";
        var editURL = "{!! route('admin.document_category.edit', ['id' => '###id###']) !!}";
        @endif
        var apiStoreURL = "{!! route('api.document_category.store') !!}";
        var apiUpdateURL = "{!! route('api.document_category.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! route('api.document_category.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! route('api.document_category.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        $script.ready('app_gtreetable', function()
        {
            $script("{!! lmcElixir('assets/pages/scripts/document_category/index.js') !!}",'index');
        });
        $script.ready(['config','index'], function()
        {
            Index.init({
                relationLinks: {
                    category: {!! config('laravel-document-module.document_category.show_relation_category_link') ? true : false !!},
                    model: {!! config('laravel-document-module.document_category.show_relation_document_link') ? true : false !!}
                },
                relationURLs: {
                    category: "{!! config('laravel-document-module.document_category.show_relation_category_link') ? route('admin.document_category.document_category.index', ['id' => '###id###']) : '#' !!}",
                    model: "{!! config('laravel-document-module.document_category.show_relation_document_link') ? route('admin.document_category.document.index', ['id' => '###id###']) : '#' !!}"
                },
                nestableLevel: {!! isset($document_category) ? config('laravel-document-module.document_category.nestable_level.nested_category') : config('laravel-document-module.document_category.nestable_level.root') !!}
            });
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-doc font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans('laravel-document-module/admin.document_category.index') !!}
                </span>
            </div>
            @if(isset($document_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => [ 'id' =>  $document_category->id, 'route' => 'document_category.document_category'],
                    'fast_add'  => false,
                    'add'       => true,
                    'tools'     => false
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => 'document_category',
                    'fast_add'  => false,
                    'add'       => true,
                    'tools'     => false
                ])
            @endif
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="table-container">

                {{-- DataTable --}}
                {{-- if is not have child show info, if have child show table --}}
                @if( (isset($document_category) && $document_category->isLeaf()) || App\DocumentCategory::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-document-module/admin.helpers.document_category.not_have_child') !!}
                    </div>
                @else
                    <table class="table table-striped table-bordered table-hover gtreetable"></table>
                @endif
                {{-- /if is not have child show info, if have child show table --}}
                {{-- /DataTable --}}
            </div>
        </div>
        {{-- /Table Portlet Body --}}
    </div>
    {{-- /Table Portlet --}}
@endsection
