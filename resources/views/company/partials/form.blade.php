{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.title') !!}</label>
    {!! Form::text( 'title', is_null($company) ? null : $company->title, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.title')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Company Profile --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.company_profile') !!}</label>
    {!! Form::textarea( 'company_profile', is_null($company) ? null : $company->company_profile, [
        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.company_profile'),
        'rows'          => 5
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-company-module/admin.helpers.company.company_profile') !!}
    </span>
</div>
{{-- /Company Profile --}}