{{-- Short Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.short_description') !!}</label>
    {!! Form::textarea( 'short_description', isset($product) ? $product->short_description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.short_description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.short_description') !!} </span>
</div>
{{-- /Short Description --}}

{{-- Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product.description') !!}</label>
    {!! Form::textarea( 'description', isset($product) ? $product->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.description'),
        'rows'          => 5
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-product-module/admin.helpers.product.description') !!} </span>
</div>
{{-- /Description --}}

{{-- Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('laravel-product-module/admin.fields.product.photo'),
    'input_name'    => 'photo',
    'input_id'      => 'photo',
    'jcrop'         => true,
    'ratio'         => config('laravel-product-module.product.uploads.photo.aspect_ratio'),
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-photo',
    'multiple'      => true
])
{{-- /Photo --}}