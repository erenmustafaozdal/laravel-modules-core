<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.short_description') !!}</label>
    {!! Form::textarea( 'short_description', isset($product) ? $product->short_description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.short_description'),
        'rows'          => 5
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.short_description') !!} </span>
    @endif
</div>

@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.short_description') !!} </span>
@endif