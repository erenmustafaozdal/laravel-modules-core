{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $dealer_category->name_uc_first }}</h1>
{{-- /Summary --}}

{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">
    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer_category->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer_category->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer_category->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}

    {{-- Show Address --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_address') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_address)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Address --}}

    {{-- Show Province --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_province') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_province)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Province --}}

    {{-- Show County --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_county') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_county)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show County --}}

    {{-- Show District --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_district') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_district)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show District --}}

    {{-- Show Neighborhood --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_neighborhood') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_neighborhood)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Neighborhood --}}

    {{-- Show Postal Code --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_postal_code') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_postal_code)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Postal Code --}}

    {{-- Show Land Phone --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_land_phone') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_land_phone)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Land Phone --}}

    {{-- Show Mobile Phone --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_mobile_phone') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_mobile_phone)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Mobile Phone --}}

    {{-- Show Url --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.show_url') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer_category->show_url)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Url --}}
</form>
{{-- /Information on Form --}}