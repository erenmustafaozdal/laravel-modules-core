{{-- Roles --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.roles') !!}</label>
    {!! Form::select('roles', [], null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix select2',
        'multiple'      => true
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.roles_help') !!} </span>
</div>
{{-- /Roles --}}