@if($parent)
{{-- Parent Category --}}
{!! Form::hidden('parent', $parent->id) !!}
{{-- /Parent Category --}}
@endif

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name')
    ]) !!}
</div>
{{-- /Name --}}



<h3>{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.dealers_setting') !!}</h3>
{{-- Show Address --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_address') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_address', 0) !!}
    {!! Form::checkbox( 'show_address', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_address') !!} </span>
</div>
{{-- /Show Address --}}

{{-- Show Province --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_province') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_province', 0) !!}
    {!! Form::checkbox( 'show_province', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_province') !!} </span>
</div>
{{-- /Show Province --}}

{{-- Show County --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_county') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_county', 0) !!}
    {!! Form::checkbox( 'show_county', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_county') !!} </span>
</div>
{{-- /Has County --}}

{{-- Show District --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_district') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_district', 0) !!}
    {!! Form::checkbox( 'show_district', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_district') !!} </span>
</div>
{{-- /Has District --}}

{{-- Show Neighborhood --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_neighborhood') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_neighborhood', 0) !!}
    {!! Form::checkbox( 'show_neighborhood', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_neighborhood') !!} </span>
</div>
{{-- /Has Neighborhood --}}

{{-- Show Postal Code --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_postal_code') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_postal_code', 0) !!}
    {!! Form::checkbox( 'show_postal_code', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_postal_code') !!} </span>
</div>
{{-- /Has Postal Code --}}

{{-- Show Land Phone --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_land_phone') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_land_phone', 0) !!}
    {!! Form::checkbox( 'show_land_phone', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_land_phone') !!} </span>
</div>
{{-- /Has Land Phone --}}

{{-- Show Mobile Phone --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_mobile_phone') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_mobile_phone', 0) !!}
    {!! Form::checkbox( 'show_mobile_phone', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_mobile_phone') !!} </span>
</div>
{{-- /Has Mobile Phone --}}

{{-- Show Url --}}
<div class="form-group last">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_url') !!}</label>
    <div class="clearfix"></div>
    {!! Form::hidden('show_url', 0) !!}
    {!! Form::checkbox( 'show_url', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
        'data-off-color'=> 'danger',
    ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer_category.show_url') !!} </span>
</div>
{{-- /Has Url --}}