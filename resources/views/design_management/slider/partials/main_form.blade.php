{{-- Current Photo --}}
@if( ! is_null($main) && ! is_null($main->photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_photo') !!}
        </label>
        <div class="col-md-9">
            <div class="mt-element-overlay">
                <div class="mt-overlay-1">
                    {!! Html::image( $main->photo_url ) !!}
                    <div class="mt-overlay">
                        <ul class="mt-info">
                            <li>
                                <a class="btn btn-sm red btn-outline"
                                   href="javascript:;"
                                   onclick="bootbox.confirm('{!! trans('laravel-modules-core::admin.ops.destroy_confirmation') !!}',function(r){if(r) window.location = '{!! lmbRoute('admin.slider.photoDestroy') !!}';}); return false;">
                                    <i class="fa fa-trash"></i>
                                    <span class="hidden-xs"> {!! trans('laravel-modules-core::admin.ops.destroy') !!}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- /Current Photo --}}

{{-- Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.photo'),
    'input_name'    => 'photo',
    'input_id'      => 'main-photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-main-photo',
    'multiple'      => false,
    'columns'       => true
])
{{-- /Photo --}}

{{-- First Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'first_color', !is_null($main) ? $main->first_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_color')
        ]) !!}
    </div>
</div>
{{-- /First Color --}}

{{-- Second Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'second_color', !is_null($main) ? $main->second_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_color')
        ]) !!}
    </div>
</div>
{{-- /Second Color --}}