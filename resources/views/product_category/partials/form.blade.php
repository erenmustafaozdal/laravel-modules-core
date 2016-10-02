{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product_category.name')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Crop Type --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-product-module/admin.fields.product_category.crop_type') !!}</label>
    <div class="input-group">
        <div class="icheck-inline">
            <label>
                {!! Form::radio( 'crop_type', 'square', !isset($product_category) ? true : null, [
                    'class'         => 'icheck',
                    'data-radio'    => 'iradio_line-grey',
                    'data-label'    => '<h5> ' . lmcTrans('admin.fields.square_crop') . ' </h5>' . Html::image('vendor/laravel-modules-core/assets/global/img/product/square-crop.jpg')
                ]) !!}
            </label>
            <label>
                {!! Form::radio( 'crop_type', 'vertical', null, [
                    'class'         => 'icheck',
                    'data-radio'    => 'iradio_line-grey',
                    'data-label'    => '<h5> ' . lmcTrans('admin.fields.vertical_crop') . ' </h5>' . Html::image('vendor/laravel-modules-core/assets/global/img/product/vertical-crop.jpg')
                ]) !!}
            </label>
            <label>
                {!! Form::radio( 'crop_type', 'horizontal', null, [
                    'class'         => 'icheck',
                    'data-radio'    => 'iradio_line-grey',
                    'data-label'    => '<h5> ' . lmcTrans('admin.fields.horizontal_crop') . ' </h5>' . Html::image('vendor/laravel-modules-core/assets/global/img/product/horizontal-crop.jpg')
                ]) !!}
            </label>
        </div>
    </div>
</div>
{{-- /Crop Type --}}