{{-- Form Action --}}
<div class="form-actions {!! $type !!}">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="{!! URL::previous() !!}" class="btn red btn-outline">
                <i class="fa fa-times"></i>
                <span class="hidden-xs">
                    {!! trans('laravel-modules-core::admin.ops.cancel') !!}
                </span>
            </a>
            {!! Form::button( '<i class="fa fa-paper-plane"></i> <span class="hidden-xs">' . trans('laravel-modules-core::admin.ops.submit') . '</span>', [
                'class' => 'btn blue btn-outline',
                'type' => 'submit'
            ]) !!}
        </div>
    </div>
</div>
{{-- /Form Action --}}
