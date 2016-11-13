{{-- Current Mini Photo --}}
@if(isset($model) && ! is_null($model->mini_photo))
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_mini_photo') !!}
    </label>
    <div class="col-md-9">
        {!! Html::image( $model->big_mini_photo_url, null, [
            'height'    => 100
        ] ) !!}
    </div>
</div>
@endif
{{-- /Current Mini Photo --}}

{{-- Mini Photo --}}
@if( ! isset($model) || is_null($model->mini_photo))
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.mini_photo'),
    'input_name'    => 'mini_photo[mini_photo]',
    'input_id'      => 'mini_photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-mini_photo',
    'multiple'      => false,
    'columns'       => true
])
@endif
{{-- /Mini Photo --}}

{{-- Mini Photo Login Type --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.mini_photo_login_type') !!}
    </label>
    <div class="col-md-9">
        <select class="bs-select form-control" data-show-subtext="true" name="mini_photo_login_type">

            @foreach(config('ezelnet-frontend-module.mini_photo_login_type') as $key => $value)
                <option value="{{ $key }}"
                        {{ isset($model) && $model->mini_photo_login_type == $key ? 'selected' : '' }}
                        data-content="{!! $value !!}"
                >
                    {!! $value !!}
                </option>
            @endforeach

        </select>
    </div>
</div>
{{-- /Mini Photo Login Type --}}

{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'title', isset($model) ? $model->title : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Title --}}

{{-- Title Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'title_color', isset($model) ? $model->title_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title_color')
        ]) !!}
    </div>
</div>
{{-- /Title Color --}}

{{-- Title Point --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title_point') !!}
    </label>
    <div class="col-md-9">
        <select class="bs-select form-control" data-show-subtext="true" name="title_point">

            @foreach(config('ezelnet-frontend-module.title_point') as $key => $value)
                <option value="{{ $key }}"
                        {{ isset($model) && $model->title_point == $key ? 'selected' : '' }}
                        data-content="{!! $value !!}"
                >
                    {!! $value !!}
                </option>
            @endforeach

        </select>
    </div>
</div>
{{-- /Title Point --}}

{{-- Description --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'description', isset($model) ? $model->description : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description'),
            'rows'          => 3,
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Description --}}

{{-- Description Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'description_color', isset($model) ? $model->description_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description_color')
        ]) !!}
    </div>
</div>
{{-- /Description Color --}}

{{-- Description Point --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description_point') !!}
    </label>
    <div class="col-md-9">
        <select class="bs-select form-control" data-show-subtext="true" name="description_point">

            @foreach(config('ezelnet-frontend-module.description_point') as $key => $value)
                <option value="{{ $key }}"
                        {{ isset($model) && $model->description_point == $key ? 'selected' : '' }}
                        data-content="{!! $value !!}"
                >
                    {!! $value !!}
                </option>
            @endforeach

        </select>
    </div>
</div>
{{-- /Description Point --}}

{{-- Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'link', isset($model) ? $model->link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Link --}}

{{-- Button Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.button_color') !!}
    </label>
    <div class="col-md-9">
        <select class="bs-select form-control" data-show-subtext="true" name="button_color">

            @foreach(config('ezelnet-frontend-module.button_color') as $key => $value)
                <option value="{{ $key }}"
                        {{ isset($model) && $model->button_color == $key ? 'selected' : '' }}
                        @if(is_array($value))
                        data-content="{!! $value['lang'] !!} <span class='label lable-sm label-primary' style='background: {{ $value['color'] }};'>{!! $value['lang'] !!} </span>"
                        @endif
                >
                    {!! is_array($value) ? $value['lang'] : $value !!}
                </option>
            @endforeach

        </select>
    </div>
</div>
{{-- /Button Color --}}

{{-- Button Text --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.button_text') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'button_text', isset($model) ? $model->button_text : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.button_text'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Button Text --}}