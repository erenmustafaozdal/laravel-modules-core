{{-- Meta Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.meta_title') !!}</label>
    {!! Form::text( 'meta_title', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.meta_title'),
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.meta_title_help') !!} </span>
</div>
{{-- /Meta Title --}}

{{-- Meta Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.meta_description') !!}</label>
    {!! Form::textarea( 'meta_description', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.meta_description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.meta_description_help') !!} </span>
</div>
{{-- /Meta Description --}}

{{-- Meta Keywords --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.meta_keywords') !!}</label>
    {!! Form::text( 'meta_keywords', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.meta_keywords'),
        'maxlength'     => 255
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.meta_keywords_help') !!} </span>
</div>
{{-- /Meta Keywords --}}