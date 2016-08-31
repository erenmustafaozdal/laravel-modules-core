@if($parent)
{{-- Parent Category --}}
{!! Form::hidden('parent', $parent->id) !!}
{{-- /Parent Category --}}
@endif

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-description-module/admin.fields.description_category.name')
    ]) !!}
</div>
{{-- /Name --}}


@if($parent || isset($description_category))
    {!! Form::hidden('has_description', $parent ? $parent->has_description : $description_category->has_description) !!}
    {!! Form::hidden('has_photo', $parent ? $parent->has_photo : $description_category->has_photo) !!}
    {!! Form::hidden('has_link', $parent ? $parent->has_link : $description_category->has_link) !!}
    {!! Form::hidden('show_title', $parent ? $parent->show_title : $description_category->show_title) !!}
    {!! Form::hidden('show_description', $parent ? $parent->show_description : $description_category->show_description) !!}
    {!! Form::hidden('show_photo', $parent ? $parent->show_photo : $description_category->show_photo) !!}
    {!! Form::hidden('show_link', $parent ? $parent->show_link : $description_category->show_link) !!}
    {!! Form::hidden('is_multiple_photo', $parent ? $parent->is_multiple_photo : $description_category->is_multiple_photo) !!}
@else
    <h3>{!! lmcTrans('laravel-description-module/admin.fields.description_category.descriptions_setting') !!}</h3>
    {{-- Has Description --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.has_description') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('has_description', 0) !!}
        {!! Form::checkbox( 'has_description', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.has_description') !!} </span>
    </div>
    {{-- /Has Description --}}

    {{-- Has Photo --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.has_photo') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('has_photo', 0) !!}
        {!! Form::checkbox( 'has_photo', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.has_photo') !!} </span>
    </div>
    {{-- /Has Photo --}}

    {{-- Has Link --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.has_link') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('has_link', 0) !!}
        {!! Form::checkbox( 'has_link', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.has_link') !!} </span>
    </div>
    {{-- /Has Link --}}

    {{-- Show Title --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_title') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('show_title', 0) !!}
        {!! Form::checkbox( 'show_title', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_title') !!} </span>
    </div>
    {{-- /Has Title --}}

    {{-- Show Description --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_description') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('show_description', 0) !!}
        {!! Form::checkbox( 'show_description', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_description') !!} </span>
    </div>
    {{-- /Show Description --}}

    {{-- Show Photo --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_photo') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('show_photo', 0) !!}
        {!! Form::checkbox( 'show_photo', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_photo') !!} </span>
    </div>
    {{-- /Show Photo --}}

    {{-- Show Link --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_link') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('show_link', 0) !!}
        {!! Form::checkbox( 'show_link', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_link') !!} </span>
    </div>
    {{-- /Show Link --}}

    {{-- Is Multiple Photo --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.is_multiple_photo') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('is_multiple_photo', 0) !!}
        {!! Form::checkbox( 'is_multiple_photo', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.is_multiple_photo') !!} </span>
    </div>
    {{-- /Is Multiple Photo --}}
@endif