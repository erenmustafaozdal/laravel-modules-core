{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $description->title_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $description->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $description->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($description->is_publish)
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
    @if( ! isset($description_category))
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description->category->name_uc_first }} </p>
        </div>
    </div>
    @endif
    {{-- /Category --}}

    {{-- Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-description-module/admin.fields.description.title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description->title_uc_first }} </p>
        </div>
    </div>
    {{-- /Title --}}

    {{-- Date --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            Tarih
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description->date }} </p>
        </div>
    </div>
    {{-- /Date --}}

    {{-- Extra Column Values --}}
    @include('laravel-modules-core::partials.common.overview_model_extras', ['model' => $description])
    {{-- /Extra Column Values --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $description->updated_at }} </p>
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
                @if ($description->is_publish)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.published') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.not_published') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Status --}}

    @if($description->category->has_description || $description->category->has_photo)
        <h4>{!! trans('laravel-modules-core::admin.fields.detail') !!}</h4>

        {{-- Description --}}
        @if($description->category->has_description)
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-description-module/admin.fields.description.description') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {!! $description->description->description or '' !!} </p>
                </div>
            </div>
        @endif
        {{-- /Description --}}

        {{-- Link --}}
        @if($description->category->has_link)
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-description-module/admin.fields.description.link') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static">
                        {!! $description->html_link !!}
                    </p>
                </div>
            </div>
        @endif
        {{-- /Link --}}

        {{-- Photo --}}
        @if($description->category->has_photo)
            <div class="form-group">
                @include('laravel-modules-core::partials.common.current_photos', [
                    'model'             => $description,
                    'relation'          => 'multiplePhoto',
                    'relationType'      => 'hasMany',
                    'modelSlug'         => 'description',   // for ModelDataTrait->getPhoto() function
                    'parentRelation'    => 'description_id' // for ModelDataTrait->getPhoto() function
                ])
            </div>
        @endif
        {{-- /Photo --}}
    @endif

</form>
{{-- /Information on Form --}}