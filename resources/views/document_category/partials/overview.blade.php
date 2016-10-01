{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $document_category->name_uc_first }}</h1>
{{-- /Summary --}}

{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">
    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document_category->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document_category->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document_category->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}


    <h4>{!! lmcTrans('admin.fields.category_configs') !!}</h4>

    {{-- Has Description --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.has_description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($document_category->has_description)
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
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.has_photo') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($document_category->has_photo)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Has Photo --}}

    {{-- Show Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.show_title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($document_category->show_title)
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
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.show_description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($document_category->show_description)
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
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.show_photo') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($document_category->show_photo)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.yes') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.no') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Show Photo --}}


    @include('laravel-modules-core::partials.common.overview_datatable',[
        'model' => $document_category
    ])

    @include('laravel-modules-core::partials.common.overview_other_configs',[
        'model' => $document_category
    ])

    @include('laravel-modules-core::partials.common.overview_thumbnails',[
        'model' => $document_category
    ])

    @include('laravel-modules-core::partials.common.overview_extras',[
        'model' => $document_category
    ])
</form>
{{-- /Information on Form --}}