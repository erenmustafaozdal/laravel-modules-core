{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team_category.name')
    ]) !!}
</div>
{{-- /Name --}}