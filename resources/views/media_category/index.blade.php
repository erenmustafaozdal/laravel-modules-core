@extends(config('laravel-media-module.views.media_category.layout'))

@section('title')
    @if(isset($parent_media_category))
        {!! lmcTrans('laravel-media-module/admin.media_category.media_category.index', [
            'parent_media_category' => $parent_media_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-media-module/admin.media_category.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_media_category))
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media_category.media_category.index', [
                'parent_media_category' => $parent_media_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media_category.media_category.index_description', [
                    'parent_media_category' => $parent_media_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media_category.index') !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media_category.index_description') !!}
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
    {{-- Bootstrap gTreeTable --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-gtreetable/dist/bootstrap-gtreetable.min.css') !!}
    {{-- /Bootstrap gTreeTable --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var gtreetableJs = "{!! lmcElixir('assets/app/gTreeTable.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/media_category/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($parent_media_category))
        var ajaxURL = "{!! lmbRoute('api.media_category.media_category.index', [
            'id' => $parent_media_category->id
        ]) !!}";
        var showURL = "{!! lmbRoute('admin.media_category.media_category.show', [
            'id' => $parent_media_category->id,
            config('laravel-media-module.url.media_category') => '###id###'
        ]) !!}";
        var editURL = "{!! lmbRoute('admin.media_category.media_category.edit', [
            'id' => $parent_media_category->id,
            config('laravel-media-module.url.media_category') => '###id###'
        ]) !!}";
        @else
        var ajaxURL = "{!! lmbRoute('api.media_category.index') !!}";
        var showURL = "{!! lmbRoute('admin.media_category.show', ['id' => '###id###']) !!}";
        var editURL = "{!! lmbRoute('admin.media_category.edit', ['id' => '###id###']) !!}";
        @endif
        var apiStoreURL = "{!! lmbRoute('api.media_category.store') !!}";
        var apiUpdateURL = "{!! lmbRoute('api.media_category.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! lmbRoute('api.media_category.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! lmbRoute('api.media_category.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        var relationLinksCategory = "{!! config('laravel-modules-core.options.media_category.show_relation_category_link') !!}";
        var relationLinksModel = "{!! config('laravel-modules-core.options.media_category.show_relation_model_link') !!}";
        var relationURLsCategory = "{!! config('laravel-modules-core.options.media_category.show_relation_category_link') ? lmbRoute('admin.media_category.media_category.index', ['id' => '###id###']) : '#' !!}";
        var relationURLsModel = "{!! config('laravel-modules-core.options.media_category.show_relation_model_link') ? lmbRoute('admin.media_category.media.index', ['id' => '###id###']) : '#' !!}";
        var nestableLevel = "{!! isset($parent_media_category) ? config('laravel-modules-core.options.media_category.nestable_level_nested') : config('laravel-modules-core.options.media_category.nestable_level_root') !!}";
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/media_category/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-media-module.icons.media_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_media_category))
                        {!! lmcTrans('laravel-media-module/admin.media_category.media_category.index', ['parent_media_category' => $parent_media_category->name_uc_first]) !!}
                    @else
                        {!! lmcTrans('laravel-media-module/admin.media_category.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($parent_media_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => [ 'id' =>  $parent_media_category->id, 'route' => 'media_category.media_category'],
                    'fast_add'  => false,
                    'add'       => true,
                    'tools'     => false
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => 'media_category',
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
                @if( (isset($parent_media_category) && $parent_media_category->isLeaf()) || App\MediaCategory::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-media-module/admin.helpers.media_category.not_have_child') !!}
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
