{{-- Item Type --}}
@if($item_type_hidden)
    {!! Form::hidden('item_type', $item_type) !!}
@else
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
@endif
{{-- /Item Type --}}

{{-- Items Type --}}
@if($items_type_hidden)
    {!! Form::hidden('category_id', ! is_null($model->carouselOption) ? $model->carouselOption->category_id : 0) !!}
    {!! Form::hidden('items_type', $items_type) !!}
@else
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.items_type') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('category_id', ! is_null($model->carouselOption) ? $model->carouselOption->category_id : 0) !!}
            <select class="form-control form-control-solid placeholder-no-fix select2me item-type"
                    name="items_type"
                    style="width: 100%;"
            >
                <option></option>
                <option value="all" {{ ! is_null($model->carouselOption) && $model->carouselOption->items_type === 'all' ? 'selected' : '' }}>
                    {!! lmcTrans('admin.ops.all') !!}
                </option>
                @if( ! $item_type_hidden ||  (! is_null($model->carouselOption) && $model->carouselOption->category_id > 0))

                    <?php
                    $type = ! is_null($model->carouselOption) ? $model->carouselOption->item_type : (! $item_type_hidden ? $item_type : null);
                    if (is_null($type)) {
                        $categories = [];
                    } else if ($type == 'Project') {
                        $categories = \App\DescriptionCategory::find(config('ezelnet.seed.description_category.projects'))
                                ->descendants()->get();
                    } else {
                        $type = '\App\\' . $type . 'Category';
                        $categories = $type::all();
                    }
                    ?>

                    @foreach( $categories as $category )
                        <option value="{{ $category->id }}" {{ ! is_null($model->carouselOption) && ! is_null($model->carouselOption->category) && $model->carouselOption->category->id === $category->id ? 'selected' : '' }}>{{ $category->name_uc_first }}</option>
                    @endforeach

                @endif
            </select>
        </div>
    </div>
@endif
{{-- /Items Type --}}