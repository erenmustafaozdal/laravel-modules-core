{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', ['id' => $model->id]),
    'class' => 'form-horizontal form-bordered'
]) !!}

{{-- Error Messages --}}
@include('laravel-modules-core::partials.error_message')
{{-- /Error Messages --}}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">
    
    {{-- Auto Play --}}
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
    {{-- /Auto Play --}}

    {{-- Is Revert --}}
    {!! Form::hidden('is_revert', 0) !!}
    {{-- /Is Revert --}}

    {{-- Order Type --}}
    {!! Form::hidden('order_type', 'last') !!}
    {{-- /Order Type --}}

    {{-- Item Type --}}
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.item_type') !!}
        </label>
        <div class="col-md-9">
            <select class="form-control form-control-solid placeholder-no-fix select2me item-type"
                    name="item_type"
                    style="width: 100%;"
            >
                <option></option>
                <option value="Product" {{ ! is_null($model->carouselOption) && $model->carouselOption->item_type === 'Product' ? 'selected' : '' }}>
                    {!! lmcTrans('laravel-product-module/admin.product.index') !!}
                </option>
                <option value="Project" {{ ! is_null($model->carouselOption) && $model->carouselOption->item_type === 'Project' ? 'selected' : '' }}>
                    {!! trans('admin.menu.projects.root') !!}
                </option>
            </select>
        </div>
    </div>
    {{-- /Item Type --}}

    {{-- Items Type --}}
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.items_type') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('category_id', ! is_null($model->carouselOption) ? $model->carouselOption->category_id : 0) !!}
            <select class="form-control form-control-solid placeholder-no-fix select2me items-type"
                    name="items_type"
                    style="width: 100%;"
            >
                <option></option>
                <option value="all" {{ ! is_null($model->carouselOption) && $model->carouselOption->items_type === 'all' ? 'selected' : '' }}>
                    {!! lmcTrans('admin.ops.all') !!}
                </option>
                @if(! is_null($model->carouselOption) && $model->carouselOption->category_id > 0)
                    <option value="{{ $model->carouselOption->category->id }}" selected>{{ $model->carouselOption->category->name_uc_first }}</option>
                @endif
            </select>
        </div>
    </div>
    {{-- /Items Type --}}
    
</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}