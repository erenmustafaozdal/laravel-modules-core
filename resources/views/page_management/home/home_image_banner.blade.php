{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.homeMiniSlider'),
    'class' => 'form-horizontal form-bordered'
]) !!}
@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">



</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}