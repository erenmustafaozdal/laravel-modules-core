{{-- Meta Title --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-product-module/admin.fields.product.meta_title') !!}</h3>
    </div>
    <div class="panel-body"> {!! $product->meta_title !!} </div>
</div>
{{-- /Meta Title --}}

{{-- Meta Description --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-product-module/admin.fields.product.meta_description') !!}</h3>
    </div>
    <div class="panel-body"> {!! $product->meta_description !!} </div>
</div>
{{-- /Meta Description --}}

{{-- Meta Keywords --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-product-module/admin.fields.product.meta_keywords') !!}</h3>
    </div>
    <div class="panel-body"> {!! $product->meta_keywords !!} </div>
</div>
{{-- /Meta Keywords --}}