{{-- Current Photo --}}
@if( ! is_null($main) && ! is_null($main->photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $main->photo_url, null, [
                'height'    => 200
            ] ) !!}
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

{{-- Text Background Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.text_background_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'text_background_color', !is_null($main) ? $main->text_background_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.text_background_color')
        ]) !!}
    </div>
</div>
{{-- /Text Background Color --}}