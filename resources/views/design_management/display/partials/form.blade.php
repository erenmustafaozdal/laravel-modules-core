{{-- Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.photo'),
    'input_name'    => 'photo',
    'input_id'      => 'photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-photo',
    'multiple'      => false,
    'columns'       => $columns
])
{{-- /Photo --}}

{{-- Status --}}
<div class="form-group">
    <label class="{{ $columns ? 'col-md-3' : '' }} control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>

    @if($columns)
        <div class="col-md-9">
            @else
                <div class="clearfix"></div>
            @endif

            @if ( ! isset($helpBlockAfter) )
                {!! Form::hidden('is_publish', 0) !!}
            @endif
            {!! Form::checkbox( 'is_publish', 1, null, [
                'class'         => 'make-switch',
                'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
                'data-on-color' => 'success',
                'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
                'data-off-color'=> 'danger',
            ]) !!}

            @if($columns)
        </div>
    @endif
</div>
{{-- /Status --}}