{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product_showcase.name') !!}</label>
    {!! Form::text( 'name', isset($product_showcase) ? $product_showcase->name_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product_showcase.name')
    ]) !!}
</div>
{{-- /Name --}}