{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.role.name') !!}</label>
    {!! Form::text( 'name', isset($role) ? $role->name : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-user-module/admin.fields.role.name')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Slug --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.role.slug') !!}</label>
    {!! Form::text( 'slug', isset($role) ? $role->slug : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-user-module/admin.fields.role.slug')
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block">
        {!! lmcTrans('laravel-user-module/admin.helpers.role.slug') !!}
    </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block">
        {!! lmcTrans('laravel-user-module/admin.helpers.role.slug') !!}
    </span>
@endif
{{-- /Slug --}}