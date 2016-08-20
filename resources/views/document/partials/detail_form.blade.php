{{-- Document Description --}}
@if(
    // Document Edit && Category Documents Edit
    ( isset($document) && $document->category->has_description )

    // Category Documents Create
    || ( isset($document_category) && $document_category->has_description )

    // Document Create
    || ! isset($document)
)
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document.title') !!}</label>
    {!! Form::textarea( 'title', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-document-module/admin.fields.document.description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-document-module/admin.helpers.document.description') !!}
    </span>
</div>
@endif
{{-- /Document Description --}}

{{-- Document Photo --}}
@if(
    // Document Edit && Category Documents Edit
    ( isset($document) && $document->category->has_photo )

    // Category Documents Create
    || ( isset($document_category) && $document_category->has_photo )

    // Document Create
    || ! isset($document)
)
@include('laravel-modules-core::partials.form.photo_crop_form', [
    'label'         => lmcTrans('laravel-document-module/admin.fields.document.photo')
])
<span class="help-block">
    {!! lmcTrans('laravel-document-module/admin.helpers.document.photo') !!}
</span>
@endif
{{-- /Document Photo --}}