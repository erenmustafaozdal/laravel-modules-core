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
        var homeJs = "{!! lmcElixir('assets/pages/scripts/page_management/home.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var saveSortableURL = "{!! lmbRoute('admin.page_management.saveSortable') !!}";
        var ProductCategoriesURL = "{!! lmbRoute('api.product_category.models') !!}";
        var ProjectCategoriesURL = "{!! lmbRoute('api.description_category.models', [
            'id' => config('ezelnet.seed.description_category.projects')
        ]) !!}";
        var removePhotoURL = "{!! lmbRoute('admin.page_management.removePhoto', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var validExtension = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.max_size') !!}";
        var aspectRatio = 1;
        var homeImageBannerAspectRatio = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.aspect_ratio.home_image_banner') !!}";
        var homeCreativeSliderAspectRatio = "{!! config('ezelnet-frontend-module.page_management.uploads.photo.aspect_ratio.home_creative_slider') !!}";
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
        @include('laravel-modules-core::page_management.sortable_buttons')
        {{-- /Sortable Buttons --}}

        {{-- Note --}}
        <div class="note note-info">
            {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.root') !!}
        </div>
        {{-- /Note --}}

        {{-- Error Messages --}}
        @include('laravel-modules-core::partials.error_message')
        {{-- /Error Messages --}}
        
        <div class="sortable">

            @foreach($page->sections as $section)
                @include('laravel-modules-core::page_management.sortable_portlet')
            @endforeach

        </div>
    </div>
    {{-- /Sortable Content --}}
@endsection
