{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $team->fullname }}</h1>
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
                @foreach(\LMBCollection::renderAncestorsAndSelf($team->categories,'/',['name_uc_first']) as $category)
                    {!! $category['parent_name_uc_first'] === ''
                        ? $category['name_uc_first']
                        : '<span class="text-muted">' . $category['parent_name_uc_first'] . '/</span>' . $category['name_uc_first'] !!}
                    <br>
                @endforeach
            </p>
        </div>
    </div>
    {{-- /Category --}}

    {{-- First Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team.first_name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $team->first_name_uc_first }} </p>
        </div>
    </div>
    {{-- /First Name --}}

    {{-- Last Name --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team.last_name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $team->last_name_upper }} </p>
        </div>
    </div>
    {{-- /Last Name --}}

    {{-- Description --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-team-module/admin.fields.team.description') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $team->description !!} </p>
        </div>
    </div>
    {{-- /Description --}}

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

    {{-- Social Accounts --}}
    @foreach(config('laravel-team-module.social_accounts') as $social => $icon)
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans("admin.fields.{$social}") . ' ' . lmcTrans('laravel-team-module/admin.fields.team.url') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                {!! !is_null($socialAccount = $team->socialAccounts()->social($icon)->first()) ? $socialAccount->url_link : null !!}
            </p>
        </div>
    </div>
    @endforeach
    {{-- /Social Accounts --}}
    
    {{-- Phone --}}
    @forelse ( isset($team) ? $team->phones : [] as $phone )
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {!! lmcTrans('laravel-team-module/admin.fields.team.phone') !!}
            </label>
            <div class="col-sm-10">
                <p class="form-control-static"> {{ $phone->phone }} </p>
            </div>
        </div>
    @empty
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {!! lmcTrans('laravel-team-module/admin.fields.team.phone') !!}
            </label>
            <div class="col-sm-10">
                <p class="form-control-static"> </p>
            </div>
        </div>
    @endforelse
    {{-- /Phone --}}

    {{-- Email --}}
    @forelse ( isset($team) ? $team->emails : [] as $email )
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {!! lmcTrans('laravel-team-module/admin.fields.team.email') !!}
            </label>
            <div class="col-sm-10">
                <p class="form-control-static"> {{ $email->email }} </p>
            </div>
        </div>
    @empty
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {!! lmcTrans('laravel-team-module/admin.fields.team.email') !!}
            </label>
            <div class="col-sm-10">
                <p class="form-control-static"> </p>
            </div>
        </div>
    @endforelse
    {{-- /Email --}}

</form>
{{-- /Information on Form --}}