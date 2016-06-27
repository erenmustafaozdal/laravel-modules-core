@extends(config('laravel-user-module.views.user.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/admin.user.show') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-user-module/admin.user.show') !!}
        <small>{!! str_replace([':user'], [$user->fullname], lmcTrans('laravel-user-module/admin.user.show_description'))  !!}</small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

    {{-- jCrop Image Crop Extension --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /jCrop Image Crop Extension --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var avatarPhotoPath = "{!! '/' . config('laravel-user-module.user.avatar_path') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var destroyAvatarURL = "{!! route('api.user.destroy_avatar', ['id' => $user->id]) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var userEditInfoMessages = {
            first_name: {
                required: "{!! LMCValidation::getMessage('first_name','required') !!}"
            },
            last_name: {
                required: "{!! LMCValidation::getMessage('last_name','required') !!}"
            }
        };
        var userChangePasswordMessages = {
            password: {
                required: "{!! LMCValidation::getMessage('password','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password','min.string', [':min' => 6]) !!}"
            },
            password_confirmation: {
                required: "{!! LMCValidation::getMessage('password_confirmation','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password_confirmation','min.string', [':min' => 6]) !!}",
                equalTo: "{!! LMCValidation::getMessage('password','confirmed') !!}"
            }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        $script.ready(['app_fileinput','app_jcrop'], function()
        {
            $script("{!! lmcElixir('assets/pages/scripts/user/show.js') !!}",'show');
        });
        $script.ready(['show', 'config'], function()
        {
            Show.init();
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $user->is_active ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $user->is_active ? lmcTrans('laravel-user-module/admin.fields.user.active_user') : lmcTrans('laravel-user-module/admin.fields.user.not_active_user') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-user font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans('laravel-user-module/admin.user.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                <a class="btn red btn-outline" href="{!! route('admin.user.destroy', ['id' => $user->id]) !!}">
                    {!! trans('laravel-modules-core::admin.ops.destroy') !!}
                    <i class="fa fa-trash"></i>
                </a>
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title --}}
        
        {{-- Portlet Body --}}
        <div class="portlet-body profile">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="row profile-account">
                
                {{-- Profile Navigation --}}
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-40">
                        <li>
                            {!! $user->getPhoto([
                                'class' => 'img-responsive pic-bordered',
                                'alt'   => $user->fullname,
                                'id'    => 'nav-profile-photo'
                            ], 'biggest') !!}
                        </li>
                        {{-- Eğer profil fotoğrafı kayıtlı ise; sil butonu --}}
                        <li {!! $user->photo == '' ? 'class="hidden"' : '' !!}>
                            <a href="javascript:;" class="font-red" id="destroy-avatar">
                                <i class="fa fa-trash"></i>
                                {!! trans('laravel-modules-core::admin.ops.destroy_image') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        {{-- /Eğer profil fotoğrafı kayıtlı ise; sil butonu --}}
                        <li class="active">
                            <a data-toggle="tab" href="#overview">
                                <i class="fa fa-info"></i>
                                {!! trans('laravel-modules-core::admin.fields.overview') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_avatar">
                                <i class="fa fa-picture-o"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_avatar') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_password">
                                <i class="fa fa-lock"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_password') !!}
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- /Profile Navigation --}}
                
                {{-- Profile Content --}}
                <div class="col-md-9">
                    <div class="tab-content">
                        
                        {{-- Overview --}}
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
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => route('admin.user.update', ['id' => $user->id]),
                                'id'        => 'user-edit-info'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::user.partials.edit_info_form')
                            </div>
                            {{-- /Form Body --}}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                            {!! Form::close() !!}
                        </div>
                        {{-- /Edit Info --}}

                        {{-- Change Avatar --}}
                        <div id="change_avatar" class="tab-pane">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => route('api.user.avatar_photo', ['id' => $user->id]),
                                'id'        => 'change-avatar-form'
                            ]) !!}

                            @include('laravel-modules-core::user.partials.change_avatar_form')

                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Avatar --}}

                        {{-- Change Password --}}
                        <div id="change_password" class="tab-pane">
                            {!! Form::open([
                                'method'    => 'POST',
                                'url'       => route('admin.user.changePassword', ['id' => $user->id]),
                                'id'        => 'user-change-password'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::user.partials.change_password_form')
                            </div>
                            {{-- /Form Body --}}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Password --}}
                        
                    </div>
                </div>
                {{-- /Profile Content --}}
                
            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
