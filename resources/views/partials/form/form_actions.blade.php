{{-- Form Action --}}
<div class="form-actions {!! $type !!}">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::button( trans('laravel-modules-core::admin.ops.cancel'), [
                'class' => 'btn red btn-outline',
                'type' => 'reset'
            ]) !!}
            {!! Form::button( trans('laravel-modules-core::admin.ops.submit'), [
                'class' => 'btn blue btn-outline',
                'type' => 'submit'
            ]) !!}
        </div>
    </div>
</div>
{{-- /Form Action --}}
