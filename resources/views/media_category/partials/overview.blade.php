{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $media_category->name_uc_first }}</h1>
{{-- /Summary --}}

{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">
    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-media-module/admin.fields.media_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $media_category->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $media_category->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $media_category->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}

    {{-- Type --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-media-module/admin.fields.media_category.type') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                {{ lmcTrans('laravel-media-module/admin.fields.media_category.' . $media_category->type) }}
            </p>
        </div>
    </div>
    {{-- /Type --}}
</form>
{{-- /Information on Form --}}