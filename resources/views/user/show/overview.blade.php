<div id="overview" class="tab-pane active">
    <div class="profile-info">

        {{-- Summary --}}
        <h1 class="font-blue sbold uppercase">{{ $user->fullname }}</h1>
        <ul class="list-inline">
            @if( ! is_null($user->last_login))
                <li>
                    <i class="fa fa-calendar"></i>
                    {{ str_replace(
                        [':date'],
                        [$user->last_login_for_humans],
                        lmcTrans('laravel-user-module/admin.fields.user.last_login_description')
                    ) }}
                </li>
            @endif
            <li>
                <i class="fa fa-calendar"></i>
                {{ str_replace(
                    [':date'],
                    [$user->created_at_for_humans],
                    trans('laravel-modules-core::admin.fields.created_at_description')
                ) }}
            </li>
            <li>
                <i class="fa fa-calendar"></i>
                {{ str_replace(
                    [':date'],
                    [$user->updated_at_for_humans],
                    trans('laravel-modules-core::admin.fields.updated_at_description')
                ) }}
            </li>
            <li>
                @if ($user->is_active)
                    <i class="fa fa-check font-green"></i>
                    {!! lmcTrans('laravel-user-module/admin.fields.user.active') !!}
                @else
                    <i class="fa fa-times font-red"></i>
                    {!! lmcTrans('laravel-user-module/admin.fields.user.not_active') !!}
                @endif
            </li>
        </ul>
        {{-- /Summary --}}


        {{-- Information on Form --}}
        <form class="form-horizontal" role="form" action="#">
            {{-- First Name --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {{ $user->first_name }} </p>
                </div>
            </div>
            {{-- /First Name --}}

            {{-- Last Name --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {{ $user->last_name }} </p>
                </div>
            </div>
            {{-- /Last Name --}}

            {{-- Email --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static">
                        <a href="mailto:{{ $user->email }}"> {{ $user->email }} </a>
                    </p>
                </div>
            </div>
            {{-- /Email --}}

            {{-- Last Login --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-user-module/admin.fields.user.last_login') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {{ $user->last_login }} </p>
                </div>
            </div>
            {{-- /Last Login --}}

            {{-- Created At --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! trans('laravel-modules-core::admin.fields.created_at') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {{ $user->created_at }} </p>
                </div>
            </div>
            {{-- /Created At --}}

            {{-- Updated At --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {{ $user->updated_at }} </p>
                </div>
            </div>
            {{-- /Updated At --}}

            {{-- Status --}}
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-user-module/admin.fields.user.status') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static">
                        @if ($user->is_active)
                            <span class="font-green"> {!! lmcTrans('laravel-user-module/admin.fields.user.active') !!} </span>
                        @else
                            <span class="font-red"> {!! lmcTrans('laravel-user-module/admin.fields.user.not_active') !!} </span>
                        @endif
                    </p>
                </div>
            </div>
            {{-- /Status --}}
        </form>
        {{-- /Information on Form --}}

    </div>
</div>