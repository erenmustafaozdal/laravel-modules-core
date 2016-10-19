{{-- Auto Play --}}
@if($auto_play_hidden)
    {!! Form::hidden('auto_play', $auto_play) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.auto_play') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('auto_play', 0) !!}
            {!! Form::checkbox( 'auto_play', 1, $model->carouselOption->auto_play, [
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
    {!! Form::hidden('is_revert', $is_revert) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.is_revert') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('is_revert', 0) !!}
            {!! Form::checkbox( 'is_revert', 1, $model->carouselOption->is_revert, [
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
    {!! Form::hidden('order_type', $order_type) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.order_type') !!}
        </label>
        <div class="col-md-9">
            <select class="form-control form-control-solid placeholder-no-fix select2me"
                    name="order_type"
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