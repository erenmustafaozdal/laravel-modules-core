<div class="panel-group accordion margin-top-40" id="product_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle accordion-toggle-styled collapsed"
                   data-toggle="collapse"
                   data-parent="#product_accordion"
                   href="#detail_accordion"
                > {!! lmcTrans('laravel-product-module/admin.fields.product.product_detail') !!} </a>
            </h4>
        </div>
        <div id="detail_accordion" class="panel-collapse collapse">
            <div class="panel-body">

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
                    'elfinder'      => true,
                    'elfinder_id'   => 'elfinder-photo',
                    'multiple'      => true
                ])
                {{-- /Photo --}}

                {{-- Current Photo/Photos --}}
                @if(isset($currentPhoto) && $currentPhoto)
                    @include('laravel-modules-core::partials.common.current_photos', [
                        'model'             => $product,
                        'relation'          => 'photos',
                        'relationType'      => 'hasMany',
                        'modelSlug'         => 'product',   // for ModelDataTrait->getPhoto() function
                        'parentRelation'    => 'product_id',// for ModelDataTrait->getPhoto() function
                        'hasRibbon'         => true,
                        'hasSetMainPhoto'   => true
                    ])
                @endif
                {{-- /Current Photo/Photos --}}

            </div>
        </div>
    </div>
</div>