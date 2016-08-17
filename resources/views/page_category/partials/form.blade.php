{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page_category.name')
    ]) !!}
</div>
{{-- /Name --}}