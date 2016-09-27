{{-- Meta Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.meta_title') !!}</label>
    {!! Form::text( 'meta_title', is_null($company) ? null : $company->meta_title, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.meta_title'),
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-company-module/admin.helpers.company.meta_title') !!} </span>
</div>
{{-- /Meta Title --}}

{{-- Meta Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.meta_description') !!}</label>
    {!! Form::textarea( 'meta_description', is_null($company) ? null : $company->meta_description, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.meta_description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-company-module/admin.helpers.company.meta_description') !!} </span>
</div>
{{-- /Meta Description --}}

{{-- Meta Keywords --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.meta_keywords') !!}</label>
    {!! Form::text( 'meta_keywords', is_null($company) ? null : $company->meta_keywords, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.meta_keywords'),
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-company-module/admin.helpers.company.meta_keywords') !!} </span>
</div>
{{-- /Meta Keywords --}}