{{-- First Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}</label>
    {!! Form::text( 'first_name', $user->first_name, [
        'class'         => 'form-control form-control-solid placeholder-no-fix'
    ]) !!}
</div>
{{-- /First Name --}}


{{-- Last Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}</label>
    {!! Form::text( 'last_name', $user->last_name, [
        'class'         => 'form-control form-control-solid placeholder-no-fix'
    ]) !!}
</div>
{{-- /Last Name --}}


{{-- Email --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}</label>
    {!! Form::text( 'email,', $user->email, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'disabled'      => 'disabled'
    ]) !!}
    <span class="help-block text-info">
        {!! lmcTrans('laravel-user-module/admin.helpers.user.email_not_changeable') !!}
    </span>
</div>
{{-- /Email --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.status') !!}</label>
    <div class="clearfix"></div>
    {!! Form::checkbox( 'is_active', 1, $user->is_active, [
        'class'         => 'make-switch',
        'data-on-text'  => lmcTrans('laravel-user-module/admin.fields.user.active'),
        'data-on-color' => 'success',
        'data-off-text' => lmcTrans('laravel-user-module/admin.fields.user.not_active'),
        'data-off-color'=> 'danger',
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.is_active_help') !!} </span>
</div>
{{-- /Status --}}