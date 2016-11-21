{{-- Province --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('admin.fields.province_id') !!}</label>
    <select id="province_id" class="form-control form-control-solid placeholder-no-fix addresses" name="province_id" style="width: 100%">
        @if(! is_null($model) && ! is_null($model->province))
            <option value="{{ $model->province->id }}" selected>{{ $model->province->province }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.province_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.province_id') !!} </span>
@endif
{{-- /Province --}}

{{-- County --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('admin.fields.county_id') !!}</label>
    <select id="county_id" class="form-control form-control-solid placeholder-no-fix addresses" name="county_id" {{ is_null($model) || ( is_null($model->county) || is_null($model->county->county) ) ? 'disabled' : '' }} style="width: 100%">
        @if(! is_null($model) && ! is_null($model->county))
            <option value="{{ $model->county->id }}" selected>{{ $model->county->county }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.county_id') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.county_id') !!} </span>
@endif
{{-- /County --}}

{{-- District --}}
{{--<div class="form-group">--}}
    {{--<label class="control-label">{!! lmcTrans('admin.fields.district_id') !!}</label>--}}
    {{--{!! Form::hidden('district_id',0) !!}--}}
    {{--<select id="district_id" class="form-control form-control-solid placeholder-no-fix addresses" name="district_id" {{ is_null($model) || ( is_null($model->district) || is_null($model->district->district) ) ? 'disabled' : '' }} style="width: 100%">--}}
        {{--@if(! is_null($model) && ! is_null($model->district))--}}
            {{--<option value="{{ $model->district->id }}" selected>{{ $model->district->district }}</option>--}}
        {{--@endif--}}
    {{--</select>--}}

    {{--@if ( ! isset($helpBlockAfter) )--}}
        {{--<span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.district_id') !!} </span>--}}
    {{--@endif--}}

{{--</div>--}}
{{--@if ( isset($helpBlockAfter) )--}}
    {{--<span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.district_id') !!} </span>--}}
{{--@endif--}}
{{-- /District --}}

{{-- Neighborhood --}}
{{--<div class="form-group">--}}
    {{--<label class="control-label">{!! lmcTrans('admin.fields.neighborhood_id') !!}</label>--}}
    {{--{!! Form::hidden('neighborhood_id',0) !!}--}}
    {{--<select id="neighborhood_id" class="form-control form-control-solid placeholder-no-fix addresses" name="neighborhood_id" {{ is_null($model) || ( is_null($model->neighborhood) || is_null($model->neighborhood->neighborhood) ) ? 'disabled' : '' }} style="width: 100%">--}}
        {{--@if(! is_null($model) && ! is_null($model->neighborhood))--}}
            {{--<option value="{{ $model->neighborhood->id }}" selected>{{ $model->neighborhood->neighborhood }}</option>--}}
        {{--@endif--}}
    {{--</select>--}}

    {{--@if ( ! isset($helpBlockAfter) )--}}
        {{--<span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.neighborhood_id') !!} </span>--}}
    {{--@endif--}}

{{--</div>--}}
{{--@if ( isset($helpBlockAfter) )--}}
    {{--<span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.neighborhood_id') !!} </span>--}}
{{--@endif--}}
{{-- /Neighborhood --}}

{{-- Postal Code --}}
{{--<div class="form-group">--}}
    {{--<label class="control-label">{!! lmcTrans('admin.fields.postal_code_id') !!}</label>--}}
    {{--{!! Form::hidden('postal_code_id',0) !!}--}}
    {{--<select id="postal_code_id" class="form-control form-control-solid placeholder-no-fix addresses" name="postal_code_id" {{ is_null($model) || ( is_null($model->postalCode) || is_null($model->postalCode->postal_code) ) ? 'disabled' : '' }} style="width: 100%" readonly="readonly">--}}
        {{--@if(! is_null($model) && ! is_null($model->postalCode))--}}
            {{--<option value="{{ $model->postalCode->id }}" selected>{{ $model->postalCode->postal_code }}</option>--}}
        {{--@endif--}}
    {{--</select>--}}

    {{--@if ( ! isset($helpBlockAfter) )--}}
        {{--<span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.postal_code_id') !!} </span>--}}
    {{--@endif--}}

{{--</div>--}}
{{--@if ( isset($helpBlockAfter) )--}}
    {{--<span class="help-block"> {!! lmcTrans('laravel-' . $model_slug . '-module/admin.helpers.' . $model_slug . '.postal_code_id') !!} </span>--}}
{{--@endif--}}
{{-- /Postal Code --}}