{{-- Company Photo --}}
<div class="form-group">
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('laravel-company-module/admin.fields.company.photo'),
        'input_name'    => 'photo',
        'input_id'      => 'photo',
        'elfinder'      => true,
        'elfinder_id'   => 'elfinder-photo',
        'multiple'      => true
    ])

    <span class="help-block">
        {!! lmcTrans('laravel-company-module/admin.helpers.company.photo',[],1) !!}
    </span>

    {{-- Current Photo/Photos --}}
    @include('laravel-modules-core::partials.common.current_photos', [
        'model'             => $company,
        'relation'          => 'photos',
        'relationType'      => 'hasMany',
        'modelSlug'         => 'company',   // for ModelDataTrait->getPhoto() function
        'parentRelation'    => 'company_id' // for ModelDataTrait->getPhoto() function
    ])
    {{-- /Current Photo/Photos --}}

</div>
{{-- /Company Photo --}}