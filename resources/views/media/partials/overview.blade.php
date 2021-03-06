{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $media->title_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $media->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $media->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($media->is_publish)
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
            {!! lmcTrans('laravel-media-module/admin.fields.media_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @foreach(\LMBCollection::renderAncestorsAndSelf($media->categories,'/',['name_uc_first','gallery_type','type']) as $category)
                    {!! $category['parent_name_uc_first'] === ''
                        ? $category['name_uc_first']
                        : '<span class="text-muted">' . $category['parent_name_uc_first'] . '/</span>' . $category['name_uc_first'] !!}
                    @if($category['type'] === 'photo')
                    <span class="text-muted">
                        ({!! lmcTrans('laravel-media-module/admin.fields.media_category.' . $category['gallery_type']) !!})
                    </span>
                    @endif
                    <br>
                @endforeach
            </p>
        </div>
    </div>
    {{-- /Category --}}

    {{-- Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-media-module/admin.fields.media.title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $media->title_uc_first }} </p>
        </div>
    </div>
    {{-- /Title --}}

    {{-- Media --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-media-module/admin.fields.media.' . $media->type) !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $media->html or '' !!} </p>
        </div>
    </div>
    {{-- /Media --}}

    {{-- Description --}}
    @if(isset($media_category) && $media_category->has_description)
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-media-module/admin.fields.media.description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $media->description !!} </p>
        </div>
    </div>
    @endif
    {{-- /Description --}}

    {{-- Extra Column Values --}}
    @include('laravel-modules-core::partials.common.overview_model_extras', ['model' => $media])
    {{-- /Extra Column Values --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $media->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $media->updated_at }} </p>
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
                @if ($media->is_publish)
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