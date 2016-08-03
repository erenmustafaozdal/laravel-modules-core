{{-- Content --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.content') !!}</label>
    {!! Form::textarea( 'content', isset($page) ? $page->content : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix summernote',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.content'),
        'rows'          => 5
    ]) !!}
</div>
{{-- /Content --}}