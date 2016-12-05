@if(hasPermission('admin.general_configs.generalOptionsUpdate'))
    {!! Form::open([
        'method'=> 'POST',
        'url'   => lmbRoute('admin.general_configs.generalOptionsUpdate'),
        'class' => 'form-horizontal form-bordered'
    ]) !!}

    {{-- Coming Soon --}}
    <h3 class="list-heading">{!! lmcTrans('admin.fields.coming_soon') !!}</h3>
    {{-- /Coming Soon --}}

    <ul class="list-items borderless">

        <li>
            {!! lmcTrans('admin.fields.coming_soon_is_active') !!}
            {!! Form::hidden('options[coming_soon][is_active]',0) !!}
            {!! Form::checkbox( 'options[coming_soon][is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->is_active, [
                'class'         => 'make-switch',
                'data-on-text'  => '<i class="fa fa-check"></i>',
                'data-on-color' => 'success',
                'data-off-text' => '<i class="fa fa-times"></i>',
                'data-off-color'=> 'danger',
                'data-size'     => 'small'
            ]) !!}
        </li>
        <li>
            {!! Form::text( 'options[coming_soon][title]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->title : null, [
                'class'         => 'form-control input-sm form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.coming_soon_title'),
                'maxlength'     => 255
            ]) !!}
        </li>
        <li>
            {!! Form::textarea( 'options[coming_soon][message]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->message : null, [
                'class'         => 'form-control input-sm form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.coming_soon_message'),
                'rows'          => 2,
                'maxlength'     => 255
            ]) !!}
        </li>
        <li>
            <div class="input-group date date-time-picker">
                {!! Form::text( 'options[coming_soon][date]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->coming_soon_date : null, [
                    'class'         => 'form-control',
                    'placeholder'   => lmcTrans('admin.fields.coming_soon_date'),
                    'maxlength'     => 255,
                    'readonly'      => true
                ]) !!}
                <span class="input-group-btn">
                                        <button class="btn green date-set" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
            </div>
        </li>
        <li>
            {!! lmcTrans('admin.fields.coming_soon_social_is_active') !!}
            {!! Form::hidden('options[coming_soon][social_is_active]',0) !!}
            {!! Form::checkbox( 'options[coming_soon][social_is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->social_is_active, [
                'class'         => 'make-switch',
                'data-on-text'  => '<i class="fa fa-check"></i>',
                'data-on-color' => 'success',
                'data-off-text' => '<i class="fa fa-times"></i>',
                'data-off-color'=> 'danger',
                'data-size'     => 'small'
            ]) !!}
        </li>
        <li>
            {!! Form::text( 'options[coming_soon][social_message]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->social_message : null, [
                'class'         => 'form-control input-sm form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.coming_soon_social_message'),
                'maxlength'     => 255
            ]) !!}
        </li>
        <li>
            {!! lmcTrans('admin.fields.coming_soon_phone_is_active') !!}
            {!! Form::hidden('options[coming_soon][phone_is_active]',0) !!}
            {!! Form::checkbox( 'options[coming_soon][phone_is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->phone_is_active, [
                'class'         => 'make-switch',
                'data-on-text'  => '<i class="fa fa-check"></i>',
                'data-on-color' => 'success',
                'data-off-text' => '<i class="fa fa-times"></i>',
                'data-off-color'=> 'danger',
                'data-size'     => 'small'
            ]) !!}
        </li>
    </ul>
    <div class="inner-content">
        {!! Form::button( '<i class="icon-settings"></i> <span class="hidden-xs">' . trans('laravel-modules-core::admin.ops.save') . '</span>', [
            'class' => 'btn green',
            'type' => 'submit'
        ]) !!}
    </div>

    {!! Form::close() !!}
@endif