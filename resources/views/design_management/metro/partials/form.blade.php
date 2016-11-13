{{-- Current Photo --}}
@if( ! is_null($model) && ! is_null($model->photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_photo') !!}
        </label>
        <div class="col-md-9">
            <div class="mt-element-overlay">
                <div class="mt-overlay-1">
                    {!! Html::image( $model->photo_url ) !!}
                    <div class="mt-overlay">
                        <ul class="mt-info">
                            <li>
                                <a class="btn btn-sm red btn-outline"
                                   href="javascript:;"
                                   onclick="bootbox.confirm('{!! trans('laravel-modules-core::admin.ops.destroy_confirmation') !!}',function(r){if(r) window.location = '{!! lmbRoute('admin.metro.photoDestroy') !!}';}); return false;">
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
    'input_name'    => 'photo[photo]',
    'input_id'      => 'photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-photo',
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
        {!! Form::text( 'first_color', !is_null($model) ? $model->first_color : null, [
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
        {!! Form::text( 'second_color', !is_null($model) ? $model->second_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_color')
        ]) !!}
    </div>
</div>
{{-- /Second Color --}}

{{-- Current First Mini Photo --}}
@if( ! is_null($model) && ! is_null($model->first_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $model->first_mini_photo_url, null, [
                'width'     => 300
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
        {!! Form::text( 'first_link', !is_null($model) ? $model->first_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /First Link --}}

{{-- Current Second Mini Photo --}}
@if( ! is_null($model) && ! is_null($model->second_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $model->second_mini_photo_url, null, [
                'width'     => 300
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
        {!! Form::text( 'second_link', !is_null($model) ? $model->second_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Second Link --}}

{{-- Current Third Mini Photo --}}
@if( ! is_null($model) && ! is_null($model->third_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $model->third_mini_photo_url, null, [
                'width'     => 300
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
        {!! Form::text( 'third_link', !is_null($model) ? $model->third_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.third_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Third Link --}}

{{-- Current Fourth Mini Photo --}}
@if( ! is_null($model) && ! is_null($model->fourth_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $model->fourth_mini_photo_url, null, [
                'width'     => 300
            ] ) !!}
        </div>
    </div>
@endif
{{-- /Current Fourth Mini Photo --}}

{{-- Fourth Mini Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.fourth_mini_photo'),
    'input_name'    => 'fourth_mini_photo[fourth_mini_photo]',
    'input_id'      => 'fourth-mini-photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-fourth-mini-photo',
    'multiple'      => false,
    'columns'       => true
])
{{-- /Fourth Mini Photo --}}

{{-- Fourth Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.fourth_link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'fourth_link', !is_null($model) ? $model->fourth_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.fourth_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Fourth Link --}}

{{-- Current Fifth Mini Photo --}}
@if( ! is_null($model) && ! is_null($model->fifth_mini_photo))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $model->fifth_mini_photo_url, null, [
                'width'     => 300
            ] ) !!}
        </div>
    </div>
@endif
{{-- /Current Fifth Mini Photo --}}

{{-- Fifth Mini Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.fifth_mini_photo'),
    'input_name'    => 'fifth_mini_photo[fifth_mini_photo]',
    'input_id'      => 'fifth-mini-photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-fifth-mini-photo',
    'multiple'      => false,
    'columns'       => true
])
{{-- /Fifth Mini Photo --}}

{{-- Fifth Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.fifth_link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'fifth_link', !is_null($model) ? $model->fifth_link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.fifth_link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Fifth Link --}}