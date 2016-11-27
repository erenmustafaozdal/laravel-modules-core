{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', [
        'id'    => $model->id,
        'form'  => $section->slug,
        'page'  => 'home'
    ]),
    'class' => 'form-horizontal form-bordered'
]) !!}

<div class="form-body">

    {{-- Title --}}
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.title') !!}
        </label>
        <div class="col-md-9">
            {!! Form::text( 'title', isset($model) ? $model->title : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.title')
            ]) !!}
        </div>
    </div>
    {{-- /Title --}}

    @include('laravel-modules-core::page_management.showcase_form', [
        'auto_play_hidden'  => false,
        'auto_play'         => null,
        'is_revert_hidden'  => true,
        'is_revert'         => null,
        'order_type_hidden' => true,
        'order_type'        => 'random',
        'item_type_hidden'  => true,
        'item_type'         => 'Product',
        'items_type_hidden' => false,
        'items_type'        => null,
        'options_hidden'    => false
    ])

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}