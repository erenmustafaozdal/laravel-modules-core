{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $page->title_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $page->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $page->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($page->is_publish)
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
            {!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->category->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Category --}}

    {{-- Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-page-module/admin.fields.page.title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->title_uc_first }} </p>
        </div>
    </div>
    {{-- /Title --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->updated_at }} </p>
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
                @if ($page->is_publish)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.published') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.not_published') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Status --}}

    <h4>{!! trans('laravel-modules-core::admin.fields.seo') !!}</h4>

    {{-- META Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-page-module/admin.fields.page.meta_title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->meta_title }} </p>
        </div>
    </div>
    {{-- /META Title --}}

    {{-- META Description --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-page-module/admin.fields.page.meta_description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->meta_description }} </p>
        </div>
    </div>
    {{-- /META Description --}}

    {{-- META Keywords --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-page-module/admin.fields.page.meta_keywords') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $page->meta_keywords }} </p>
        </div>
    </div>
    {{-- /META Keywords --}}
</form>
{{-- /Information on Form --}}