{{-- Dealer Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2me" name="category_id" style="width: 100%">
        @if(isset($dealer))
            <option value="{{ $dealer->category->id }}" selected>{{ $dealer->category->name_uc_first }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.category_id_help') !!} </span>
@endif
{{-- /Dealer Category --}}

{{-- Province --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.province_id') !!}</label>
    <select id="province_id" class="form-control form-control-solid placeholder-no-fix addresses" name="province_id" style="width: 100%">
        @if(isset($dealer))
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
    <select id="county_id" class="form-control form-control-solid placeholder-no-fix addresses" name="county_id" disabled style="width: 100%">
        @if(isset($dealer))
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
    <select id="district_id" class="form-control form-control-solid placeholder-no-fix addresses" name="district_id" disabled style="width: 100%">
        @if(isset($dealer))
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
    <select id="neighborhood_id" class="form-control form-control-solid placeholder-no-fix addresses" name="neighborhood_id" disabled style="width: 100%">
        @if(isset($dealer))
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
    <select id="postal_code_id" class="form-control form-control-solid placeholder-no-fix addresses" name="postal_code_id" disabled style="width: 100%" readonly="readonly">
        @if(isset($dealer))
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