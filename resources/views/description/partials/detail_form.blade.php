{{-- Document Description --}}
<div class="form-group" id="description_wrapper">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description.description') !!}</label>
    {!! Form::textarea( 'description', isset($description) && ! is_null($description->description) ? $description->description->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
        'placeholder'   => lmcTrans('laravel-description-module/admin.fields.description.description'),
        'rows'          => 5,
        'id'            => 'description'
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-description-module/admin.helpers.description.description') !!}
    </span>
</div>
{{-- /Document Description --}}

{{-- Document Photo --}}
<div class="form-group" id="photo_wrapper">
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('laravel-description-module/admin.fields.description.photo'),
        'input_name'    => 'photo',
        'input_id'      => 'photo',
        'elfinder'      => ( isset($description) && $description->category->is_multiple_photo ) || ( isset($description_category) && $description_category->is_multiple_photo ) || (! isset($description_category) && ! isset($description) ) ? false : true,
        'elfinder_id'   => 'elfinder-photo',
        'multiple'      => isset($description) ? $description->category->is_multiple_photo : ( isset($description_category) ? $description_category->is_multiple_photo : false )
    ])

    <span class="help-block">
        {!! lmcTrans('laravel-description-module/admin.helpers.description.photo',[],1) !!}
    </span>

    {{-- Current Photo/Photos --}}
    @if(isset($currentPhoto) && $currentPhoto)
        @include('laravel-modules-core::partials.common.current_photos', [
            'model'             => $description,
            'relation'          => 'multiplePhoto',
            'relationType'      => 'hasMany',
            'modelSlug'         => 'description',   // for ModelDataTrait->getPhoto() function
            'parentRelation'    => 'description_id' // for ModelDataTrait->getPhoto() function
        ])
    @endif
    {{-- /Current Photo/Photos --}}

</div>
{{-- /Document Photo --}}

{{-- Title --}}
<div id="link_wrapper" class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description.link') !!}</label>
    {!! Form::text( 'link', isset($description) && ! is_null($description->link) ? $description->link->link : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-description-module/admin.fields.description.link'),
        'id'            => 'link'
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-description-module/admin.helpers.description.link') !!}
    </span>
</div>
{{-- /Title --}}