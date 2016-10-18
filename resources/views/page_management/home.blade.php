@extends(config('ezelnet-frontend-module.views.page_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.page_management.home") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.page_management.home") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.page_management.home_description") !!}
        </small>
    </h1>
@endsection

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
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/page_management/home.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ProductCategoriesURL = "{!! lmbRoute('api.product_category.models') !!}";
        var ProjectCategoriesURL = "{!! lmbRoute('api.description_category.models', [
            'id' => config('ezelnet.seed.description_category.projects')
        ]) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var validExtension = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.max_size') !!}";
        var homeImageBannerAspectRatio = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.aspect_ratio.home_image_banner') !!}";
        var homeAdvertisementBannerBigAspectRatio = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.aspect_ratio.home_advertisement_banner_big') !!}";
        var homeAdvertisementBannerSmallAspectRatio = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.aspect_ratio.home_advertisement_banner_small') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/page_management/home.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Sortable Content --}}
    <div id="sortable_portlets">
        
        {{-- Sortable Buttons --}}
        <div class="margin-bottom-40">
            <button type="button" class="btn blue btn-outline" id="enable_sortable">
                <i class="fa fa-check"></i>
                <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.enable_sortable') !!} </span>
            </button>
            <button type="button" class="btn red btn-outline hidden" id="disable_sortable">
                <i class="fa fa-times"></i>
                <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.disable_sortable') !!}  </span>
            </button>
            <button type="button" class="btn green btn-outline disabled" id="save_sortable">
                <i class="fa fa-floppy-o"></i>
                <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.save_sortable') !!} </span>
            </button>
        </div>
        {{-- /Sortable Buttons --}}
        
        <div class="sortable">

            @foreach($page->sections as $section)
                @include('laravel-modules-core::page_management.sortable_portlet')
            @endforeach

        </div>
    </div>
    {{-- /Sortable Content --}}
@endsection
