{{-- Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.photo'),
    'input_name'    => 'photo[photo]',
    'input_id'      => 'photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-photo',
    'multiple'      => false,
    'columns'       => $columns
])
{{-- /Photo --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($product) ? $product->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
</div>
{{-- /Status --}}