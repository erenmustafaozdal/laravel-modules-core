{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $contact->name_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $contact->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $contact->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($contact->is_publish)
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

    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-contact-module/admin.fields.contact.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $contact->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Address --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-contact-module/admin.fields.contact.address') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $contact->full_address !!} </p>
        </div>
    </div>
    {{-- /Address --}}

    {{-- Map Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-contact-module/admin.fields.contact.map_title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $contact->map_title }} </p>
        </div>
    </div>
    {{-- /Map Title --}}

    {{-- Latitude --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('admin.fields.latitude') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $contact->latitude }} </p>
        </div>
    </div>
    {{-- /Latitude --}}

    {{-- Longitude --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('admin.fields.longitude') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $contact->longitude }} </p>
        </div>
    </div>
    {{-- /Longitude --}}

    {{-- Zoom --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('admin.fields.zoom') !!}<br>
            {!! lmcTrans('admin.fields.zoom_info') !!}
        </label>
        <div class="col-sm-10">
            {!! getProgressBar(1,20,$contact->zoom) !!}
        </div>
    </div>
    {{-- /Zoom --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $contact->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $contact->updated_at }} </p>
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
                @if ($contact->is_publish)
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