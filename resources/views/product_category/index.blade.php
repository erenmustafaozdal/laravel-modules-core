@extends(config('laravel-product-module.views.product_category.layout'))

@section('title')
    {!! lmcTrans('laravel-product-module/admin.product_category.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-product-module/admin.product_category.index') !!}
        <small>{!! lmcTrans('laravel-product-module/admin.product_category.index_description') !!}</small>
    </h1>
@endsection

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
        var indexJs = "{!! lmcElixir('assets/pages/scripts/product_category/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! route('api.product_category.index') !!}";
        var showURL = "{!! route('admin.product_category.show', ['id' => '###id###']) !!}";
        var editURL = "{!! route('admin.product_category.edit', ['id' => '###id###']) !!}";
        var apiStoreURL = "{!! route('api.product_category.store') !!}";
        var apiUpdateURL = "{!! route('api.product_category.update', ['id' => '###id###']) !!}";
        var apiDestroyURL = "{!! route('api.product_category.destroy', ['id' => '###id###']) !!}";
        var apiMoveURL = "{!! route('api.product_category.move', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- scripts --}}
        var nestableLevel = "{!! config('laravel-modules-core.options.product_category.nestable_level_root') !!}";
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product_category/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-gTreeTable.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-product-module.icons.product_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-product-module/admin.product_category.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module'    => 'product_category',
                'fast_add'  => false,
                'add'       => true,
                'tools'     => false
            ])
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
                @if( (isset($parent_product_category) && $parent_product_category->isLeaf()) || App\DocumentCategory::all()->count() == 0 )
                    <div class="well well-lg">
                        {!! lmcTrans('laravel-product-module/admin.helpers.product_category.not_have_child') !!}
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
