{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', [
        'id'    => $model->id,
        'form'  => $model->slug,
        'page'  => 'company'
    ]),
    'class' => 'form-horizontal form-bordered'
]) !!}

<div class="form-body">

    @include('laravel-modules-core::page_management.showcase_form', [
        'auto_play_hidden'  => false,
        'auto_play'         => null,
        'is_revert_hidden'  => true,
        'is_revert'         => null,
        'order_type_hidden' => true,
        'order_type'        => null,
        'item_type_hidden'  => true,
        'item_type'         => null,
        'items_type_hidden' => true,
        'items_type'        => null,
        'options_hidden'    => true
    ])

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}