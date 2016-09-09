{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $product_showcase->name_uc_first }}</h1>
{{-- /Summary --}}

{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">
    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-product-module/admin.fields.product_showcase.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $product_showcase->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $product_showcase->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $product_showcase->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}
</form>
{{-- /Information on Form --}}