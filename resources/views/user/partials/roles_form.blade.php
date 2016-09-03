{{-- Roles --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.roles') !!}</label>
    {!! Form::hidden('roles[]',0) !!}
    <select class="form-control form-control-solid placeholder-no-fix select2" multiple name="roles[]" style="width: 100%">
        @if( isset($user) )
            @foreach($user->roles as $role)
            <option value="{{ $role->id }}" selected="selected">{{ $role->name_uc_first }}</option>
            @endforeach
        @endif
    </select>
    <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.roles_help') !!} </span>
</div>
{{-- /Roles --}}