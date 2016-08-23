{{-- First Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}</label>
    {!! Form::text( 'first_name', isset($user) ? $user->first_name : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.first_name')
    ]) !!}
</div>
{{-- /First Name --}}


{{-- Last Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}</label>
    {!! Form::text( 'last_name', isset($user) ? $user->last_name : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.last_name')
    ]) !!}
</div>
{{-- /Last Name --}}


{{-- Email --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}</label>

    {{-- if user isset, email is disabled --}}
    @if (isset($user))
        {!! Form::text( 'email', $user->email, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.email'),
            'disabled'      => 'disabled'
        ]) !!}
    @else
        {!! Form::text( 'email', null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.email')
        ]) !!}
    @endif
    {{-- /if user isset, email is disabled --}}
    @if ( ! isset($helpBlockAfter) )
    <span class="help-block text-info">
        {!! lmcTrans('laravel-user-module/admin.helpers.user.email_not_changeable') !!}
    </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block text-info">
        {!! lmcTrans('laravel-user-module/admin.helpers.user.email_not_changeable') !!}
    </span>
@endif
{{-- /Email --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_active', 0) !!}
    @endif
    {!! Form::checkbox( 'is_active', 1, isset($user) ? $user->is_active : null, [
        'class'         => 'make-switch',
        'data-on-text'  => lmcTrans('laravel-user-module/admin.fields.user.active'),
        'data-on-color' => 'success',
        'data-off-text' => lmcTrans('laravel-user-module/admin.fields.user.not_active'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.is_active_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.is_active_help') !!} </span>
@endif
{{-- /Status --}}