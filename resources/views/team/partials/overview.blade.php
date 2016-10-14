{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $team->name_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $team->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $team->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($team->is_publish)
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
            {!! lmcTrans('laravel-team-module/admin.fields.team_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @foreach(\LMBCollection::renderAncestorsAndSelf(collect()->push($team->category),'/',['name_uc_first']) as $category)
                    {!! $category['parent_name_uc_first'] === ''
                        ? $category['name_uc_first']
                        : '<span class="text-muted">' . $category['parent_name_uc_first'] . '/</span>' . $category['name_uc_first'] !!}
                @endforeach
            </p>
        </div>
    </div>
    {{-- /Category --}}

    {{-- Brand --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team_brand.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $team->brand->name_uc_first or '' }} </p>
        </div>
    </div>
    {{-- /Brand --}}

    {{-- Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $team->name_uc_first }} </p>
        </div>
    </div>
    {{-- /Name --}}

    {{-- Amount --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team.amount') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $team->amount_turkish !!} </p>
        </div>
    </div>
    {{-- /Amount --}}

    {{-- Code --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team.code') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $team->code_uc !!} </p>
        </div>
    </div>
    {{-- /Code --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $team->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $team->updated_at }} </p>
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
                @if ($team->is_publish)
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