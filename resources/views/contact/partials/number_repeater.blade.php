<div data-repeater-item class="mt-repeater-item">
    <div class="row mt-repeater-row">

        {{-- Number Title --}}
        <div class="col-md-6">
            <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.number_title') !!}</label>
            {!! Form::text( 'number_title', isset($number) ? $number->title : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.number_title')
            ]) !!}
        </div>
        {{-- /Number Title --}}

        {{-- Number --}}
        <div class="col-md-5">
            <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.number') !!}</label>
            {!! Form::text( 'number', isset($number) ? $number->number : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-number repeater',
                'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.number'),
                'data-rule-phone_tr'=> 'true',
                'data-msg-phone_tr' => LMCValidation::getMessage('number','phone_tr')
            ]) !!}
            <span class="help-block">
                {!! lmcTrans('laravel-contact-module/admin.helpers.contact.number') !!}
            </span>
        </div>
        {{-- /Number --}}

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