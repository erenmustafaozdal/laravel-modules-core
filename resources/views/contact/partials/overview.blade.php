{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $dealer->name_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $dealer->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $dealer->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($dealer->is_publish)
            <i class="fa fa-check font-green"></i>
            {!! trans('laravel-modules-core::admin.ops.published') !!}
        @else
            <i class="fa fa-times font-red"></i>
            {!! trans('laravel-modules-core::admin.ops.not_published') !!}
        @endif
    </li>
</ul>
{{-- /Summary --}}


{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">

    {{-- Category --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer->category->name_uc_first or '' }} </p>
        </div>
    </div>
    {{-- /Category --}}

    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Address --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer.address') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $dealer->full_address !!} </p>
        </div>
    </div>
    {{-- /Address --}}

    {{-- Land Phone --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer.land_phone') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer->land_phone }} </p>
        </div>
    </div>
    {{-- /Land Phone --}}

    {{-- Mobile Phone --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer.mobile_phone') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer->mobile_phone }} </p>
        </div>
    </div>
    {{-- /Mobile Phone --}}

    {{-- Url --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-dealer-module/admin.fields.dealer.url') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $dealer->url_link !!} </p>
        </div>
    </div>
    {{-- /Url --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $dealer->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}

    {{-- Status --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.ops.status') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($dealer->is_publish)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.published') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.not_published') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Status --}}

</form>
{{-- /Information on Form --}}