{{-- Short Description --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-product-module/admin.fields.product.short_description') !!}</h3>
    </div>
    <div class="panel-body"> {!! $product->short_description !!} </div>
</div>
{{-- /Short Description --}}

{{-- Description --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-product-module/admin.fields.product.description') !!}</h3>
    </div>
    <div class="panel-body"> {!! $product->description !!} </div>
</div>
{{-- /Description --}}

{{-- Current Photos --}}
@include('laravel-modules-core::partials.common.current_photos', [
    'model'             => $product,
    'relation'          => 'photos',
    'relationType'      => 'hasMany',
    'modelSlug'         => 'product',   // for ModelDataTrait->getPhoto() function
    'parentRelation'    => 'product_id',// for ModelDataTrait->getPhoto() function
    'hasRibbon'         => true,
    'hasSetMainPhoto'   => true
])
{{-- /Current Photos --}}