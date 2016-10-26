{{-- Item Type --}}
@if($item_type_hidden)
    {!! Form::hidden('carouselOption[item_type]', $item_type) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.item_type') !!}
        </label>
        <div class="col-md-9">
            <select class="form-control form-control-solid placeholder-no-fix select2me item-type"
                    name="carouselOption[item_type]"
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
@endif
{{-- /Item Type --}}

{{-- Items Type --}}
@if($items_type_hidden)
    {!! Form::hidden('carouselOption[items_type]', $items_type) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.items_type') !!}
        </label>
        <div class="col-md-9">
            <select class="form-control form-control-solid placeholder-no-fix select2me items-type"
                    name="carouselOption[items_type]"
                    style="width: 100%;"
            >
                <option></option>
                <option value="all" {{ ! is_null($model->carouselOption) && $model->carouselOption->items_type === 'all' ? 'selected' : '' }}>
                    {!! lmcTrans('admin.ops.all') !!}
                </option>
                @if( ! $item_type_hidden && ! is_null($model->carouselOption) && is_numeric($model->carouselOption->items_type))
                    <option value="{{ $model->carouselOption->items_type }}" selected>{{ $model->carouselOption->category->name_uc_first }}</option>
                @elseif($item_type_hidden)
                    @foreach($product_category as $category)
                        <option value="{{ $category->id }}" {{ ! is_null($model->carouselOption) && $model->carouselOption->items_type === $category->id ? 'selected' : '' }}>{{ $category->name_uc_first }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
@endif
{{-- /Items Type --}}