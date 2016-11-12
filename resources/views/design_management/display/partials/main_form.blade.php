{{-- Current Photo --}}
@if( ! is_null($main) && ! is_null($main->photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $main->photo_url, null, [
                'height'    => 100
            ] ) !!}
        </div>
    </div>
@endif
{{-- /Current Photo --}}

{{-- Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.photo'),
    'input_name'    => 'photo[photo]',
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

{{-- Current First Mini Photo --}}
@if( ! is_null($main) && ! is_null($main->first_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $main->first_mini_photo_url, null, [
                'height'    => 100
            ] ) !!}
        </div>
    </div>
@endif
{{-- /Current First Mini Photo --}}

{{-- First Mini Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_mini_photo'),
    'input_name'    => 'first_mini_photo[first_mini_photo]',
    'input_id'      => 'first-mini-photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-first-mini-photo',
    'multiple'      => false,
    'columns'       => true
])
{{-- /First Mini Photo --}}

{{-- First Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'first_link', !is_null($main) ? $main->first_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /First Link --}}

{{-- Current Second Mini Photo --}}
@if( ! is_null($main) && ! is_null($main->second_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $main->second_mini_photo_url, null, [
                'height'    => 100
            ] ) !!}
        </div>
    </div>
@endif
{{-- /Current Second Mini Photo --}}

{{-- Second Mini Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_mini_photo'),
    'input_name'    => 'second_mini_photo[second_mini_photo]',
    'input_id'      => 'second-mini-photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-second-mini-photo',
    'multiple'      => false,
    'columns'       => true
])
{{-- /Second Mini Photo --}}

{{-- Second Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'second_link', !is_null($main) ? $main->second_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Second Link --}}

{{-- Current Third Mini Photo --}}
@if( ! is_null($main) && ! is_null($main->third_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $main->third_mini_photo_url, null, [
                'height'    => 100
            ] ) !!}
        </div>
    </div>
@endif
{{-- /Current Third Mini Photo --}}

{{-- Third Mini Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.third_mini_photo'),
    'input_name'    => 'third_mini_photo[third_mini_photo]',
    'input_id'      => 'third-mini-photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-third-mini-photo',
    'multiple'      => false,
    'columns'       => true
])
{{-- /Third Mini Photo --}}

{{-- Third Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.third_link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'third_link', !is_null($main) ? $main->third_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.third_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Third Link --}}