@if($parent)
{{-- Parent Category --}}
{!! Form::hidden('parent', $parent->id) !!}
{{-- /Parent Category --}}
@endif

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-document-module/admin.fields.document_category.name')
    ]) !!}
</div>
{{-- /Name --}}

<h3>{!! lmcTrans('laravel-document-module/admin.fields.document_category.documents_setting') !!}</h3>
{{-- Has Description --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.has_description') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('has_description', 0) !!}
    {!! Form::checkbox( 'has_description', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.has_description') !!} </span>
</div>
{{-- /Has Description --}}

{{-- Has Photo --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.has_photo') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('has_photo', 0) !!}
    {!! Form::checkbox( 'has_photo', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.has_photo') !!} </span>
</div>
{{-- /Has Photo --}}

{{-- Show Title --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_title') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_title', 0) !!}
    {!! Form::checkbox( 'show_title', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_title') !!} </span>
</div>
{{-- /Has Title --}}

{{-- Show Description --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_description') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_description', 0) !!}
    {!! Form::checkbox( 'show_description', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_description') !!} </span>
</div>
{{-- /Has Description --}}

{{-- Show Photo --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_photo') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_photo', 0) !!}
    {!! Form::checkbox( 'show_photo', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_photo') !!} </span>
</div>
{{-- /Has Photo --}}