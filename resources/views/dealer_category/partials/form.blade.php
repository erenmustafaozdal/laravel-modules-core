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


{!! Form::hidden('show_address', 0) !!}
{!! Form::hidden('show_province', 0) !!}
{!! Form::hidden('show_county', 0) !!}
{!! Form::hidden('show_district', 0) !!}
{!! Form::hidden('show_neighborhood', 0) !!}
{!! Form::hidden('show_postal_code', 0) !!}
{!! Form::hidden('show_land_phone', 0) !!}
{!! Form::hidden('show_mobile_phone', 0) !!}
{!! Form::hidden('show_url', 0) !!}