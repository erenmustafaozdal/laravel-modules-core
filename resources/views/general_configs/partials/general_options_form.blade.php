<h4>{!! lmcTrans('admin.fields.coming_soon') !!}</h4>
{{-- Coming Soon Is Active --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_is_active') !!}</label>
    <div class="col-md-9">
        {!! Form::hidden('options[coming_soon][is_active]',0) !!}
        {!! Form::checkbox( 'options[coming_soon][is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->is_active, [
            'class'         => 'make-switch',
            'data-on-text'  => '<i class="fa fa-check"></i>',
            'data-on-color' => 'success',
            'data-off-text' => '<i class="fa fa-times"></i>',
            'data-off-color'=> 'danger'
        ]) !!}
    </div>
</div>
{{-- /Coming Soon Is Active --}}

{{-- Coming Soon Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'options[coming_soon][title]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->title : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('admin.fields.coming_soon_title'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Coming Soon Title --}}

{{-- Coming Soon Message --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_message') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'options[coming_soon][message]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->message : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('admin.fields.coming_soon_message'),
            'rows'          => 3,
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Coming Soon Message --}}

{{-- Coming Soon Date --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_date') !!}</label>
    <div class="col-md-9">
        <div class="input-group date date-time-picker">
            {!! Form::text( 'options[coming_soon][date]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->coming_soon_date : null, [
                'class'         => 'form-control',
                'placeholder'   => lmcTrans('admin.fields.coming_soon_date'),
                'maxlength'     => 255,
                'readonly'      => true
            ]) !!}
            <span class="input-group-btn">
                <button class="btn green btn-outline date-set" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
        </div>
    </div>
</div>
{{-- /Coming Soon Date --}}

{{-- Coming Soon Social Is Active --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_social_is_active') !!}</label>
    <div class="col-md-9">
        {!! Form::hidden('options[coming_soon][social_is_active]',0) !!}
        {!! Form::checkbox( 'options[coming_soon][social_is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->social_is_active, [
            'class'         => 'make-switch',
            'data-on-text'  => '<i class="fa fa-check"></i>',
            'data-on-color' => 'success',
            'data-off-text' => '<i class="fa fa-times"></i>',
            'data-off-color'=> 'danger'
        ]) !!}
    </div>
</div>
{{-- /Coming Soon Social Is Active --}}

{{-- Coming Soon Social Message --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_social_message') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'options[coming_soon][social_message]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->social_message : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('admin.fields.coming_soon_social_message'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Coming Soon Social Message --}}

{{-- Coming Soon Phone Is Active --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('admin.fields.coming_soon_phone_is_active') !!}</label>
    <div class="col-md-9">
        {!! Form::hidden('options[coming_soon][phone_is_active]',0) !!}
        {!! Form::checkbox( 'options[coming_soon][phone_is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->phone_is_active, [
            'class'         => 'make-switch',
            'data-on-text'  => '<i class="fa fa-check"></i>',
            'data-on-color' => 'success',
            'data-off-text' => '<i class="fa fa-times"></i>',
            'data-off-color'=> 'danger'
        ]) !!}
    </div>
</div>
{{-- /Coming Soon Phone Is Active --}}