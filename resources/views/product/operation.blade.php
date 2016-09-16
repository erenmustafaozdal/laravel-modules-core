@extends(config('laravel-product-module.views.product.layout'))

@section('title')
    {!! lmcTrans("laravel-product-module/admin.product.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-product-module/admin.product.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-product-module/admin.product.{$operation}_product", [
                'product' => $operation === 'edit' ? $product->title_uc_first : null
            ]) !!}
        </small>
    </h1> @endsection

@section('css')
    @parent
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/product/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($product_category))
            var modelsURL = "{!! route('api.product_category.models', ['id' => $product_category]) !!}";
        @else
            var modelsURL = "{!! route('api.product_category.models') !!}";
        @endif
        var categoriesURL = "{!! route('api.product_category.models') !!}";
        var brandsURL = "{!! route('api.product_brand.models') !!}";
        var removePhotoURL = "{!! route('api.product.removePhoto', ['id' => '###id###']) !!}";
        var tinymceURL = "{!! route('elfinder.tinymce4') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            'category_id[]': { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            brand_id: { required: "{!! LMCValidation::getMessage('brand_id','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            amount: { required: "{!! LMCValidation::getMessage('amount','required') !!}" }
        };
        var validExtension = "{!! config('laravel-product-module.product.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-product-module.product.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-product-module.product.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = "{!! config('laravel-product-module.product.uploads.photo.aspect_ratio') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-product-module.icons.product') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-product-module/admin.product.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                {!! getOps($product, 'edit', true) !!}
            </div>
            @endif
            {{-- /Actions --}}

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.overview') !!}
                    </a>
                </li>
                <li id="seo_tab">
                    <a href="#seo" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.seo') !!}
                    </a>
                </li>
                <li id="showcase_tab">
                    <a href="#showcase" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.showcase') !!}
                    </a>
                </li>
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
                    'url'   => route('admin.product.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $product->id : null
                    ]),
                    'class' => 'form',
                    'files' => true
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">

                        @include('laravel-modules-core::product.partials.form')

                        {{-- Product Detail --}}
                        <div class="panel-group accordion margin-top-40" id="product_accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed"
                                           data-toggle="collapse"
                                           data-parent="#product_accordion"
                                           href="#detail_accordion"
                                        > {!! lmcTrans('laravel-product-module/admin.fields.product.product_detail') !!} </a>
                                    </h4>
                                </div>
                                <div id="detail_accordion" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        @include('laravel-modules-core::product.partials.detail_form')
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /Product Detail --}}

                    </div>
                    <div class="tab-pane" id="seo">
                        @include('laravel-modules-core::product.partials.seo_form')
                    </div>
                    <div class="tab-pane" id="showcase">
                        @include('laravel-modules-core::product.partials.showcase_form')
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
