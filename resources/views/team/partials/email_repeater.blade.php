<div data-repeater-item class="mt-repeater-item">
    <div class="row mt-repeater-row">

        {{-- Number --}}
        <div class="col-md-{!! $multiple ? 11 : 12 !!}">
            <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.email') !!}</label>
            {!! Form::text( 'email', isset($email) ? $email->email : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.email'),
                'data-rule-email'=> 'true',
                'data-msg-email'=> LMCValidation::getMessage('email','email')
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