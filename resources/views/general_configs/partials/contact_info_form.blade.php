{{-- Phone --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.phone') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'phone', is_null($contact) ? null : $contact->phone, [
            'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-phone',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.phone')
        ]) !!}
    </div>
</div>
{{-- /Phone --}}

{{-- Email --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.email') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'email', is_null($contact) ? null : $contact->email, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.email')
        ]) !!}
    </div>
</div>
{{-- /Email --}}