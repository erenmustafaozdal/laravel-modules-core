@extends(config('laravel-description-module.views.description_category.layout'))

@section('title')
    @if(isset($parent_description_category))
        {!! lmcTrans('laravel-description-module/admin.description_category.description_category.index', ['parent_description_category' => $parent_description_category->name_uc_first]) !!}
    @else
        {!! lmcTrans('laravel-description-module/admin.description_category.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_description_category))
        <h1>
            {!! lmcTrans('laravel-description-module/admin.description_category.description_category.index', [
                'parent_description_category' => $parent_description_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-description-module/admin.description_category.description_category.index_description', [
                    'parent_description_category' => $parent_description_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-description-module/admin.description_category.index') !!}
            <small>
                {!! lmcTrans('laravel-description-module/admin.description_category.index_description') !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($parent_description_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_description_category], ['name']) !!}
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
        var indexJs = "{!! lmcElixir('assets/pages/scripts/description_category/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($parent_description_category))
        var ajaxURL = "{!! lmbRoute('api.description_category.description_category.index', [
            'id' => $parent_description_category->id
        ]) !!}";
        var showURL = "{!! lmbRoute('admin.description_category.description_category.show', [
            'id' => $parent_description_category->id,
            config('laravel-description-module.url.description_category') => '###id###'
        ]) !!}";
        var editURL = "{!! lmbRoute('admin.description_category.description_category.edit', [
            'id' => $parent_description_category->id,
            config('laravel-description-module.url.description_category') => '###id###'
        ]) !!}";
        @else
        var ajaxURL = "{!! lmbRoute('api.description_category.index') !!}";
        var showURL = "{!! lmbRoute('admin.description_category.show', ['id' => '###id###']) !!}";
        var editURL = "{!! lmbRoute('admin.description_category.edit', ['id' => '###id###']) !!}";
        @endif
        var apiStoreURL = "{!! lmbRoute('api.description_category.store') !!}";
        var apiUpdateURL = "{!! lmbRoute('api.description_category.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! lmbRoute('api.description_category.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! lmbRoute('api.description_category.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        var relationLinksCategory = "{!! config('laravel-modules-core.options.description_category.show_relation_category_link') !!}";
        var relationLinksModel = "{!! config('laravel-modules-core.options.description_category.show_relation_model_link') !!}";
        var relationURLsCategory = "{!! config('laravel-modules-core.options.description_category.show_relation_category_link') ? lmbRoute('admin.description_category.description_category.index', ['id' => '###id###']) : '#' !!}";
        var relationURLsModel = "{!! config('laravel-modules-core.options.description_category.show_relation_model_link') ? lmbRoute('admin.description_category.description.index', ['id' => '###id###']) : '#' !!}";
        var nestableLevel = "{!! isset($parent_description_category) ? config('laravel-modules-core.options.description_category.nestable_level_nested') : config('laravel-modules-core.options.description_category.nestable_level_root') !!}";
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/description_category/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-description-module.icons.description_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_description_category))
                        {!! lmcTrans('laravel-description-module/admin.description_category.description_category.index', ['parent_description_category' => $parent_description_category->name_uc_first]) !!}
                    @else
                        {!! lmcTrans('laravel-description-module/admin.description_category.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($parent_description_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => [ 'id' =>  $parent_description_category->id, 'route' => 'description_category.description_category'],
                    'fast_add'  => false,
                    'add'       => true,
                    'tools'     => false
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => 'description_category',
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

                {{-- GTreeTable --}}
                {{-- if is not have child show info, if have child show table --}}
                @if( (isset($parent_description_category) && $parent_description_category->isLeaf()) || App\DescriptionCategory::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-description-module/admin.helpers.description_category.not_have_child') !!}
                    </div>
                @else
                    <table class="table table-striped table-bordered table-hover gtreetable"></table>
                @endif
                {{-- /if is not have child show info, if have child show table --}}
                {{-- /GTreeTable --}}
            </div>
        </div>
        {{-- /Table Portlet Body --}}
    </div>
    {{-- /Table Portlet --}}
@endsection
