@extends(config('laravel-product-module.views.product.layout'))

@section('title')
    {!! lmcTrans('laravel-product-module/admin.product.show') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('laravel-product-module/admin.product.show') !!}
        <small>
            {!! lmcTrans('laravel-product-module/admin.product.show_description', [
                'product' => $product->name_uc_first
            ]) !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}

    {{-- jCrop Image Crop Extension --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /jCrop Image Crop Extension --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/product/show.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var modelsURL = "{!! lmbRoute('api.product_category.models') !!}";
        var categoriesURL = "{!! lmbRoute('api.product_category.models') !!}";
        var brandsURL = "{!! lmbRoute('api.product_brand.models') !!}";
        var removePhotoURL = "{!! lmbRoute('api.product.removePhoto', ['id' => '###id###']) !!}";
        var setMainPhotoURL = "{!! lmbRoute('api.product.setMainPhoto', ['id' => '###id###']) !!}";
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        var categoryDetailURL = "{!! lmbRoute('api.product_category.detail', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            'category_id': { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        var validExtension = "{!! config('laravel-product-module.product.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-product-module.product.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-product-module.product.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = "{{ $product->category->aspect_ratio }}";
        var verticalRatio = "{!! config('laravel-product-module.product.uploads.photo.vertical_ratio') !!}";
        var horizontalRatio = "{!! config('laravel-product-module.product.uploads.photo.horizontal_ratio') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $product->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $product->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-product-module.icons.product') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-product-module/admin.product.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($product, 'show', true) !!}
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title --}}

        {{-- Portlet Body --}}
        <div class="portlet-body profile">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="row profile-account">

                {{-- Profile Navigation --}}
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-40">
                        @if( ! is_null($product->mainPhoto))
                        <li>
                            {!! $product->mainPhoto->getPhoto([
                                'class' => 'img-responsive pic-bordered',
                                'alt'   => $product->name_uc_first,
                            ], last(array_keys(config('laravel-product-module.product.uploads.photo.thumbnails'))),false,'product','product_id') !!}
                        </li>
                        @endif

                        <li class="active">
                            <a data-toggle="tab" href="#overview">
                                <i class="fa fa-info"></i>
                                {!! trans('laravel-modules-core::admin.fields.overview') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#detail">
                                <i class="fa fa-info-circle"></i>
                                {!! trans('laravel-modules-core::admin.fields.detail') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#descriptions">
                                <i class="fa fa-sticky-note"></i>
                                {!! trans('laravel-modules-core::admin.fields.descriptions') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#seo">
                                <i class="fa fa-google"></i>
                                {!! trans('laravel-modules-core::admin.fields.seo') !!}
                            </a>
                            <span class="after"> </span>
                        </li>

                        @if (hasPermission('admin.'. (isset($product_category) ? 'product_category.product' : 'product') .'.update'))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_descriptions">
                                <i class="fa fa-sticky-note-o"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_descriptions') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_seo">
                                <i class="fa fa-google-plus"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_seo') !!}
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                {{-- /Profile Navigation --}}

                {{-- Profile Content --}}
                <div class="col-md-9">
                    <div class="tab-content">

                        {{-- Overview --}}
                        <div id="overview" class="tab-pane active">
                            <div class="profile-info">
                                @include('laravel-modules-core::product.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Detail --}}
                        <div id="detail" class="tab-pane">
                            <div class="profile-info">
                                @include('laravel-modules-core::product.partials.detail')
                            </div>
                        </div>
                        {{-- /Detail --}}

                        {{-- Descriptions --}}
                        <div id="descriptions" class="tab-pane">
                            @include('laravel-modules-core::product.partials.descriptions')
                        </div>
                        {{-- /Descriptions --}}

                        {{-- Seo --}}
                        <div id="seo" class="tab-pane">
                            <div class="profile-info">
                                @include('laravel-modules-core::product.partials.seo')
                            </div>
                        </div>
                        {{-- /Seo --}}

                        {{-- Edit Info --}}
                        @if (hasPermission('admin.'. (isset($product_category) ? 'product_category.product' : 'product') .'.update'))

                        {{-- Edit Info --}}
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.product.update', [ 'id' => $product->id, 'form' => 'general' ]),
                                'class'     => 'product-form',
                                'files'     => true
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::product.partials.form')
                                    @include('laravel-modules-core::product.partials.detail_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Edit Info --}}

                        {{-- Change Descriptions --}}
                        <div id="change_descriptions" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.product.update', [ 'id' => $product->id, 'form' => 'descriptions' ])
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::product.partials.descriptions_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Descriptions --}}

                        {{-- Change Seo --}}
                        <div id="change_seo" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.product.update', [ 'id' => $product->id, 'form' => 'seo' ])
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::product.partials.seo_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Seo --}}

                        @endif
                        {{-- /Edit Info --}}

                    </div>
                </div>
                {{-- /Profile Content --}}

            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
