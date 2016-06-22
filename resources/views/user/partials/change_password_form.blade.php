{{-- Password --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.password') !!}</label>
    {!! Form::password( 'password', [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.password'),
        'id'            => 'password'
    ]) !!}
</div>
{{-- /Password --}}


{{-- Password Confirmation --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.password_confirmation') !!}</label>
    {!! Form::password( 'password_confirmation', [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.password_confirmation')
    ]) !!}
</div>
{{-- /Password Confirmation --}}