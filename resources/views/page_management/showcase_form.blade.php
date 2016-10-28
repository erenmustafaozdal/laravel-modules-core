{{-- Auto Play --}}
@if($auto_play_hidden)
    {!! Form::hidden('carouselOption[auto_play]', $auto_play) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.auto_play') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('carouselOption[auto_play]', 0) !!}
            {!! Form::checkbox( 'carouselOption[auto_play]', 1, $model->carouselOption->auto_play, [
                'class'         => 'make-switch',
                'data-on-text'  => '<i class="fa fa-check"></i>',
                'data-on-color' => 'success',
                'data-off-text' => '<i class="fa fa-times"></i>',
                'data-off-color'=> 'danger',
            ]) !!}
        </div>
    </div>
@endif
{{-- /Auto Play --}}

{{-- Is Revert --}}
@if($is_revert_hidden)
    {!! Form::hidden('carouselOption[is_revert]', $is_revert) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.is_revert') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('carouselOption[is_revert]', 0) !!}
            {!! Form::checkbox( 'carouselOption[is_revert]', 1, $model->carouselOption->is_revert, [
                'class'         => 'make-switch',
                'data-on-text'  => '<i class="fa fa-check"></i>',
                'data-on-color' => 'success',
                'data-off-text' => '<i class="fa fa-times"></i>',
                'data-off-color'=> 'danger',
            ]) !!}
        </div>
    </div>
@endif
{{-- /Is Revert --}}

{{-- Order Type --}}
@if($order_type_hidden)
    {!! Form::hidden('carouselOption[order_type]', $order_type) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.order_type') !!}
        </label>
        <div class="col-md-9">
            <select class="form-control form-control-solid placeholder-no-fix select2me"
                    name="carouselOption[order_type]"
                    style="width: 100%;"
            >
                <option></option>
                <option value="random" {{ ! is_null($model->carouselOption) && $model->carouselOption->order_type === 'random' ? 'selected' : '' }}>
                    {!! lmcTrans('admin.fields.order_random') !!}
                </option>
                <option value="last" {{ ! is_null($model->carouselOption) && $model->carouselOption->order_type === 'last' ? 'selected' : '' }}>
                    {!! lmcTrans('admin.fields.order_last') !!}
                </option>
            </select>
        </div>
    </div>
@endif
{{-- /Order Type --}}

@include('laravel-modules-core::page_management.items_type', [
    'item_type_hidden'  => $item_type_hidden,
    'item_type'         => $item_type,
    'items_type_hidden' => $items_type_hidden,
    'items_type'        => $items_type,
])

{{-- Options --}}
@if( ! $options_hidden)
    <input type="hidden" name="carouselOption[options][item_visible]" value="">
    <div class="form-group {{ ! is_null($model->carouselOption) && $model->carouselOption->item_type === 'Project' ? 'hidden' : '' }}">
        <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.item_visible') !!}</label>
        <div class="col-md-9 input-group">
            <div class="icheck-inline">
                <label>
                    <input type="checkbox"
                           name="carouselOption[options][item_visible][]"
                           value="name"
                           class="icheck"
                           data-checkbox="icheckbox_line-grey"
                           data-label="{!! lmcTrans('laravel-product-module/admin.fields.product.name') !!}"
                            {{ !$model->carouselOption->options_array || !isset($model->carouselOption->options_array->item_visible) || !in_array('name',$model->carouselOption->options_array->item_visible) ? '' : 'checked' }}
                            @if(! is_null($model->carouselOption) && $model->carouselOption->item_type === 'Project')
                            disabled
                            @endif
                    >
                </label>
                <label>
                    <input type="checkbox"
                           name="carouselOption[options][item_visible][]"
                           value="code"
                           class="icheck"
                           data-checkbox="icheckbox_line-grey"
                           data-label="{!! lmcTrans('laravel-product-module/admin.fields.product.code') !!}"
                           {{ !$model->carouselOption->options_array || !isset($model->carouselOption->options_array->item_visible) || !in_array('code',$model->carouselOption->options_array->item_visible) ? '' : 'checked' }}
                           @if(! is_null($model->carouselOption) && $model->carouselOption->item_type === 'Project')
                           disabled
                            @endif
                    >
                </label>
                <label>
                    <input type="checkbox"
                           name="carouselOption[options][item_visible][]"
                           value="amount"
                           class="icheck"
                           data-checkbox="icheckbox_line-grey"
                           data-label="{!! lmcTrans('laravel-product-module/admin.fields.product.amount') !!}"
                           {{ !$model->carouselOption->options_array || !isset($model->carouselOption->options_array->item_visible) || !in_array('amount',$model->carouselOption->options_array->item_visible) ? '' : 'checked' }}
                           @if(! is_null($model->carouselOption) && $model->carouselOption->item_type === 'Project')
                           disabled
                            @endif
                    >
                </label>
            </div>
            <span class="help-block">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.item_visible') !!}
            </span>
        </div>
    </div>
@endif
{{-- /Options --}}