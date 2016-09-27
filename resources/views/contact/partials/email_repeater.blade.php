<div data-repeater-item class="mt-repeater-item">
    <div class="row mt-repeater-row">

        {{-- Email Title --}}
        <div class="col-md-6">
            <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.email_title') !!}</label>
            {!! Form::text( 'email_title', isset($email) ? $email->title : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.email_title')
            ]) !!}
        </div>
        {{-- /Email Title --}}

        {{-- Email --}}
        <div class="col-md-5">
            <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.email') !!}</label>
            {!! Form::text( 'email', isset($email) ? $email->email : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.email'),
                'data-rule-email'=> 'true',
                'data-msg-email'=> LMCValidation::getMessage('email','email')
            ]) !!}
            <span class="help-block">
                        {!! lmcTrans('laravel-contact-module/admin.helpers.contact.email') !!}
                    </span>
        </div>
        {{-- /Email --}}

        {{-- Repeater Delete --}}
        <div class="col-md-1">
            <a href="javascript:;"
               data-repeater-delete
               class="btn red btn-outline mt-repeater-delete tooltips"
               data-container="body"
               data-original-title="{!! lmcTrans('admin.ops.destroy') !!}"
            >
                <i class="fa fa-close"></i>
            </a>
        </div>
        {{-- /Repeater Delete --}}

    </div>
</div>