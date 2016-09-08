{{-- Address --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.address') !!}</label>
    {!! Form::text( 'address', isset($dealer) ? $dealer->address : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer.address'),
        'maxlength'     => 255
    ]) !!}
</div>
{{-- /Address --}}

{{-- Land Phone --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.land_phone') !!}</label>
    {!! Form::text( 'land_phone', isset($dealer) ? $dealer->land_phone : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-land-phone',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer.land_phone')
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.land_phone') !!}
    </span>
</div>
{{-- /Land Phone --}}

{{-- Mobile Phone --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.mobile_phone') !!}</label>
    {!! Form::text( 'mobile_phone', isset($dealer) ? $dealer->mobile_phone : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-mobile-phone',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer.mobile_phone')
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.mobile_phone') !!}
    </span>
</div>
{{-- /Mobile Phone --}}

{{-- Url --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.url') !!}</label>
    {!! Form::text( 'url', isset($dealer) ? $dealer->url : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer.url')
    ]) !!}
    <span class="help-block">
        {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.url') !!}
    </span>
</div>
{{-- /Url --}}