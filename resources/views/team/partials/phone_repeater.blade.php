<div data-repeater-item class="mt-repeater-item">
    <div class="row mt-repeater-row">

        {{-- Number --}}
        <div class="col-md-{!! $multiple ? 11 : 12 !!}">
            <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.phone') !!}</label>
            {!! Form::text( 'phone', isset($phone) ? $phone->phone : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-phone repeater',
                'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.phone'),
                'data-rule-phone_tr'=> 'true',
                'data-msg-phone_tr' => LMCValidation::getMessage('phone','phone_tr')
            ]) !!}
        </div>
        {{-- /Number --}}

        {{-- Repeater Delete --}}
        @if($multiple)
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
        @endif
        {{-- /Repeater Delete --}}

    </div>
</div>