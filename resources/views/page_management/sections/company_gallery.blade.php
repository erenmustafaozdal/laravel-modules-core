{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', [
        'id'    => $model->id,
        'form'  => $model->slug,
        'page'  => 'company'
    ]),
    'class' => 'form-horizontal form-bordered'
]) !!}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">

    @include('laravel-modules-core::page_management.showcase_form', [
        'auto_play_hidden'  => false,
        'auto_play'         => null,
        'is_revert_hidden'  => true,
        'is_revert'         => null,
        'order_type_hidden' => false,
        'order_type'        => null,
        'item_type_hidden'  => true,
        'item_type'         => null,
        'items_type_hidden' => true,
        'items_type'        => null,
        'options_hidden'    => true
    ])

    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.item_type') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('carouselOption[item_type]', null) !!}
            <select class="form-control form-control-solid placeholder-no-fix select2me item-type"
                    name="carouselOption[item_type]"
                    style="width: 100%;"
            >
                <option></option>
                <option value="CompanyPhoto" {{ ! is_null($model->carouselOption) && $model->carouselOption->item_type === 'CompanyPhoto' ? 'selected' : '' }}>
                    {!! lmcTrans('laravel-company-module/admin.menu.company.root') !!}
                </option>
                <option value="EnterprisePhoto" {{ ! is_null($model->carouselOption) && $model->carouselOption->item_type === 'EnterprisePhoto' ? 'selected' : '' }}>
                    {!! trans('admin.menu.enterprise.root') !!} {!! trans('admin.menu.enterprise.photos.root') !!}
                </option>
                <option value="MediaWePhoto" {{ ! is_null($model->carouselOption) && $model->carouselOption->item_type === 'MediaWePhoto' ? 'selected' : '' }}>
                    {!! trans('admin.menu.media_we.root') !!} {!! trans('admin.menu.media_we.photos.root') !!}
                </option>
            </select>
        </div>
    </div>

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}