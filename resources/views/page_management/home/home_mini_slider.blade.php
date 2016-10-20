{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', ['id' => $model->id]),
    'class' => 'form-horizontal form-bordered'
]) !!}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">
    
    @include('laravel-modules-core::page_management.showcase_form', [
        'auto_play_hidden'  => false,
        'auto_play'         => null,
        'is_revert_hidden'  => true,
        'is_revert'         => null,
        'order_type_hidden' => true,
        'order_type'        => 'last',
        'item_type_hidden'  => false,
        'item_type'         => null,
        'items_type_hidden' => false,
        'items_type'        => null,
    ])
    
</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}