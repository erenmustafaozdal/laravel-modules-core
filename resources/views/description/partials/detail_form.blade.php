{{-- Document Description --}}
<div class="form-group" id="description_wrapper">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description.description') !!}</label>
    {!! Form::textarea( 'description', isset($description) && ! is_null($description->description) ? $description->description->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-description-module/admin.fields.description.description'),
        'rows'          => 3,
        'maxlength'     => 255,
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
        'jcrop'         => false,
        'ratio'         => config('laravel-description-module.description.uploads.photo.aspect_ratio'),
        'elfinder'      => ( isset($description) && $description->category->is_multiple_photo ) || ( isset($description_category) && $description_category->is_multiple_photo ) || ! isset($description) ? 'false' : 'true',
        'elfinder_id'   => 'elfinder-photo',
        'multiple'      => isset($description_category) ? $description_category->is_multiple_photo : isset($description) ? $description->category->is_multiple_photo : false
    ])
    <span class="help-block">
        {!! lmcTrans('laravel-description-module/admin.helpers.description.photo',[],1) !!}
    </span>
    @if(isset($description) && ! is_null($description->photo) && ! is_null($description->photo->photo))
        <label class="control-label">{!! trans('laravel-modules-core::admin.fields.current_photo') !!}</label>
        <a href="{{ $description->photo->getPhoto([],'normal',true,'description','description') }}" class="thumbnail" target="_blank">
            {!! $description->photo->getPhoto([],'normal',false,'description','description') !!}
        </a>
    @endif
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