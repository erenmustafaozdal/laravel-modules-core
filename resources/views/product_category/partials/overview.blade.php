{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $product_category->name_uc_first }}</h1>
{{-- /Summary --}}

{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">
    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-product-module/admin.fields.product_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $product_category->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Crop Type --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-product-module/admin.fields.product_category.crop_type') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ lmcTrans("admin.fields.{$product_category->crop_type}_crop") }} </p>
        </div>
    </div>
    {{-- /Crop Type --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $product_category->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $product_category->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}
</form>
{{-- /Information on Form --}}