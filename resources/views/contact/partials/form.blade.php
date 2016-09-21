{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.name') !!}</label>
    {!! Form::text( 'name', isset($dealer) ? $dealer->name_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer.name')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Province --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.province_id') !!}</label>
    {!! Form::hidden('province_id',0) !!}
    <select id="province_id" class="form-control form-control-solid placeholder-no-fix addresses" name="province_id" style="width: 100%">
        @if(isset($dealer) && ! is_null($dealer->province))
            <option value="{{ $dealer->province->id }}" selected>{{ $dealer->province->province }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.province_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.province_id') !!} </span>
@endif
{{-- /Province --}}

{{-- County --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.county_id') !!}</label>
    {!! Form::hidden('county_id',0) !!}
    <select id="county_id" class="form-control form-control-solid placeholder-no-fix addresses" name="county_id" {{ ! isset($dealer) || ( is_null($dealer->county) || is_null($dealer->county->county) ) ? 'disabled' : '' }} style="width: 100%">
        @if(isset($dealer) && ! is_null($dealer->county))
            <option value="{{ $dealer->county->id }}" selected>{{ $dealer->county->county }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.county_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.county_id') !!} </span>
@endif
{{-- /County --}}

{{-- District --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.district_id') !!}</label>
    {!! Form::hidden('district_id',0) !!}
    <select id="district_id" class="form-control form-control-solid placeholder-no-fix addresses" name="district_id" {{ ! isset($dealer) || ( is_null($dealer->district) || is_null($dealer->district->district) ) ? 'disabled' : '' }} style="width: 100%">
        @if(isset($dealer) && ! is_null($dealer->district))
            <option value="{{ $dealer->district->id }}" selected>{{ $dealer->district->district }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.district_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.district_id') !!} </span>
@endif
{{-- /District --}}

{{-- Neighborhood --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.neighborhood_id') !!}</label>
    {!! Form::hidden('neighborhood_id',0) !!}
    <select id="neighborhood_id" class="form-control form-control-solid placeholder-no-fix addresses" name="neighborhood_id" {{ ! isset($dealer) || ( is_null($dealer->neighborhood) || is_null($dealer->neighborhood->neighborhood) ) ? 'disabled' : '' }} style="width: 100%">
        @if(isset($dealer) && ! is_null($dealer->neighborhood))
            <option value="{{ $dealer->neighborhood->id }}" selected>{{ $dealer->neighborhood->neighborhood }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.neighborhood_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.neighborhood_id') !!} </span>
@endif
{{-- /Neighborhood --}}

{{-- Postal Code --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.postal_code_id') !!}</label>
    {!! Form::hidden('postal_code_id',0) !!}
    <select id="postal_code_id" class="form-control form-control-solid placeholder-no-fix addresses" name="postal_code_id" {{ ! isset($dealer) || ( is_null($dealer->postalCode) || is_null($dealer->postalCode->postal_code) ) ? 'disabled' : '' }} style="width: 100%" readonly="readonly">
        @if(isset($dealer) && ! is_null($dealer->postalCode))
            <option value="{{ $dealer->postalCode->id }}" selected>{{ $dealer->postalCode->postal_code }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.postal_code_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.postal_code_id') !!} </span>
@endif
{{-- /Postal Code --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($dealer) ? $dealer->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.is_publish_help') !!} </span>
@endif
{{-- /Status --}}