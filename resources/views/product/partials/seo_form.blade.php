{{-- Meta Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.meta_title') !!}</label>
    {!! Form::text( 'meta_title', isset($product) ? $product->meta_title : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.meta_title'),
        'maxlength'     => 255
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.meta_title_help') !!} </span>
    @endif
</div>

@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.meta_title_help') !!} </span>
@endif
{{-- /Meta Title --}}

{{-- Meta Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.meta_description') !!}</label>
    {!! Form::textarea( 'meta_description', isset($product) ? $product->meta_description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.meta_description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.meta_description_help') !!} </span>
    @endif
</div>

@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.meta_description_help') !!} </span>
@endif
{{-- /Meta Description --}}

{{-- Meta Keywords --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.meta_keywords') !!}</label>
    {!! Form::text( 'meta_keywords', isset($product) ? $product->meta_keywords : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.meta_keywords'),
        'maxlength'     => 255
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.meta_keywords_help') !!} </span>
    @endif
</div>

@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.meta_keywords_help') !!} </span>
@endif
{{-- /Meta Keywords --}}