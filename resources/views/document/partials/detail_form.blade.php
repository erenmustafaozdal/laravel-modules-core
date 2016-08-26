{{-- Document Description --}}
<div class="form-group" id="description_wrapper">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document.description') !!}</label>
    {!! Form::textarea( 'description', isset($document) && ! is_null($document->description) ? $document->description->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-document-module/admin.fields.document.description'),
        'rows'          => 3,
        'maxlength'     => 255,
        'id'            => 'description'
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-document-module/admin.helpers.document.description') !!}
    </span>
</div>
{{-- /Document Description --}}

{{-- Document Photo --}}
<div id="photo_wrapper">
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('laravel-document-module/admin.fields.document.photo'),
        'input_name'    => 'photo',
        'input_id'      => 'photo',
        'jcrop'         => true,
        'ratio'         => config('laravel-document-module.document.uploads.photo.aspect_ratio'),
        'elfinder'      => true,
        'elfinder_id'   => 'elfinder-photo'
    ])
    <span class="help-block">
        {!! lmcTrans('laravel-document-module/admin.helpers.document.photo') !!}
    </span>

    {{-- Current Photo/Photos --}}
    @include('laravel-modules-core::partials.common.current_photos', [
        'model'             => $document,
        'relation'          => 'photo',
        'relationType'      => 'hasOne',
        'modelSlug'         => 'document',   // for ModelDataTrait->getPhoto() function
        'parentRelation'    => 'document'    // for ModelDataTrait->getPhoto() function
    ])
    {{-- /Current Photo/Photos --}}

</div>
{{-- /Document Photo --}}