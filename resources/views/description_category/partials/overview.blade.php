{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $description_category->name_uc_first }}</h1>
{{-- /Summary --}}

{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">
    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description_category->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description_category->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description_category->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}

    {{-- Has Description --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.has_description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->has_description)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Has Description --}}

    {{-- Has Photo --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.has_photo') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->has_photo)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Has Photo --}}

    {{-- Has Link --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.has_link') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->has_link)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Has Link --}}

    {{-- Show Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.show_title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->show_title)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Title --}}

    {{-- Show Description --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.show_description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->show_description)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Description --}}

    {{-- Show Photo --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.show_photo') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->show_photo)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Photo --}}

    {{-- Show Link --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.show_link') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->show_link)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Link --}}

    {{-- Is Multiple Photo --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.is_multiple_photo') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($description_category->is_multiple_photo)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Is Multiple Photo --}}
</form>
{{-- /Information on Form --}}