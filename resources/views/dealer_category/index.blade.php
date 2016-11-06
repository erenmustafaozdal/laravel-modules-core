    @extends(config('laravel-dealer-module.views.dealer_category.layout'))

@section('title')
    @if(isset($parent_dealer_category))
        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer_category.index', ['parent_dealer_category' => $parent_dealer_category->name_uc_first]) !!}
    @else
        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.index') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_dealer_category))
        <h1>
            {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer_category.index', [
                'parent_dealer_category' => $parent_dealer_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer_category.index_description', [
                    'parent_dealer_category' => $parent_dealer_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-dealer-module/admin.dealer_category.index') !!}
            <small>{!! lmcTrans('laravel-dealer-module/admin.dealer_category.index_description') !!}</small>
        </h1>
    @endif
@endsection

@if(isset($parent_dealer_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_dealer_category], ['name']) !!}
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
        var indexJs = "{!! lmcElixir('assets/pages/scripts/dealer_category/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($parent_dealer_category))
        var ajaxURL = "{!! lmbRoute('api.dealer_category.dealer_category.index', ['id' => $parent_dealer_category->id]) !!}";
        var showURL = "{!! lmbRoute('admin.dealer_category.dealer_category.show', [
            'id' => $parent_dealer_category->id,
            config('laravel-dealer-module.url.dealer_category') => '###id###'
        ]) !!}";
        var editURL = "{!! lmbRoute('admin.dealer_category.dealer_category.edit', [
            'id' => $parent_dealer_category->id,
            config('laravel-dealer-module.url.dealer_category') => '###id###'
        ]) !!}";
        @else
        var ajaxURL = "{!! lmbRoute('api.dealer_category.index') !!}";
        var showURL = "{!! lmbRoute('admin.dealer_category.show', ['id' => '###id###']) !!}";
        var editURL = "{!! lmbRoute('admin.dealer_category.edit', ['id' => '###id###']) !!}";
        @endif
        var apiStoreURL = "{!! lmbRoute('api.dealer_category.store') !!}";
        var apiUpdateURL = "{!! lmbRoute('api.dealer_category.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! lmbRoute('api.dealer_category.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! lmbRoute('api.dealer_category.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        var relationLinksCategory = "{!! config('laravel-modules-core.options.dealer_category.show_relation_category_link') !!}";
        var relationLinksModel = "{!! config('laravel-modules-core.options.dealer_category.show_relation_model_link') !!}";
        var relationURLsCategory = "{!! config('laravel-modules-core.options.dealer_category.show_relation_category_link') ? lmbRoute('admin.dealer_category.dealer_category.index', ['id' => '###id###']) : '#' !!}";
        var relationURLsModel = "{!! config('laravel-modules-core.options.dealer_category.show_relation_model_link') ? lmbRoute('admin.dealer_category.dealer.index', ['id' => '###id###']) : '#' !!}";
        var nestableLevel = "{!! isset($parent_dealer_category) ? config('laravel-modules-core.options.dealer_category.nestable_level_nested') : config('laravel-modules-core.options.dealer_category.nestable_level_root') !!}";
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/dealer_category/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-dealer-module.icons.dealer_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_dealer_category))
                        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer_category.index', ['parent_dealer_category' => $parent_dealer_category->name_uc_first]) !!}
                    @else
                        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.index') !!}
                    @endif
                </span>
            </div>
            @if(isset($parent_dealer_category))
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => [ 'id' =>  $parent_dealer_category->id, 'route' => 'dealer_category.dealer_category'],
                    'fast_add'  => false,
                    'add'       => true,
                    'tools'     => false
                ])
            @else
                @include('laravel-modules-core::partials.common.indexActions', [
                    'module'    => 'dealer_category',
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
                @if( (isset($parent_dealer_category) && $parent_dealer_category->isLeaf()) || App\DealerCategory::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.not_have_child') !!}
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
