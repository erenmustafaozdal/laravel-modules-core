{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product_brand.name') !!}</label>
    {!! Form::text( 'name', isset($product_brand) ? $product_brand->name_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product_brand.name')
    ]) !!}
</div>
{{-- /Name --}}