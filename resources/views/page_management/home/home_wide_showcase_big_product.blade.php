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

    @include('laravel-modules-core::page_management.showcase_form', [
        'auto_play_hidden'  => false,
        'auto_play'         => null,
        'is_revert_hidden'  => false,
        'is_revert'         => null,
        'order_type_hidden' => true,
        'order_type'        => 'random',
        'item_type_hidden'  => false,
        'item_type'         => null,
        'items_type_hidden' => false,
        'items_type'        => null,
    ])

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}