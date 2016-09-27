{{-- Mission --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.mission') !!}</label>
    {!! Form::textarea( 'mission', is_null($company) ? null : $company->mission, [
        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.mission'),
        'rows'          => 5
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-company-module/admin.helpers.company.mission') !!}
    </span>
</div>
{{-- /Mission --}}

{{-- Vision --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.vision') !!}</label>
    {!! Form::textarea( 'vision', is_null($company) ? null : $company->vision, [
        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.vision'),
        'rows'          => 5
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-company-module/admin.helpers.company.vision') !!}
    </span>
</div>
{{-- /Vision --}}