{{-- Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2category select2me" multiple name="category_id[]" style="width: 100%">
        @if(isset($product))
            @foreach($product->categories as $category)
                <option value="{{ $category->id }}" selected>{{ $category->name_uc_first }}</option>
            @endforeach
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.category_id_help') !!} </span>
@endif
{{-- /Category --}}

{{-- Brand --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product_brand.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2brand select2me" name="brand_id" style="width: 100%">
        @if(isset($product) && ! is_null($product->brand))
            <option value="{{ $product->brand->id }}" selected>{{ $product->brand->name_uc_first }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.brand_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.brand_id_help') !!} </span>
@endif
{{-- /Brand --}}

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.name') !!}</label>
    {!! Form::text( 'name', isset($product) ? $product->name_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.name')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Amount --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.amount') !!}</label>
    <div class="input-group">
        {!! Form::text( 'amount', isset($product) ? $product->amount : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix input-group-element',
            'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.amount'),
            'id'            => 'amount'
        ]) !!}
        <span class="input-group-addon">
            <i class="fa fa-try font-dark"></i>
        </span>
    </div>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.amount') !!} </span>
    @endif
</div>

@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.amount') !!} </span>
@endif
{{-- /Amount --}}

{{-- Code --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.code') !!}</label>
    {!! Form::text( 'code', isset($product) ? $product->code : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.code')
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.code') !!} </span>
    @endif
</div>

@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.code') !!} </span>
@endif
{{-- /Code --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($product) ? $product->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.is_publish_help') !!} </span>
@endif
{{-- /Status --}}