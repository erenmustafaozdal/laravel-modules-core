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

    {{-- Dropzone image drop upload --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/dropzone/dropzone.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/dropzone/basic.min.css') !!}
    {{-- /Dropzone image drop upload --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var avatarPhotoPath = "{!! '/' . config('laravel-user-module.user.avatar_path') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var destroyAvatarURL = "{!! route('api.user.destroy_avatar', ['id' => $user->id]) !!}";
        {{-- /routes --}}

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
    <div class="portlet light portlet-fit bordered mt-element-ribbon">
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
                                <i class="fa fa-times"></i>
                                {!! trans('laravel-modules-core::admin.ops.destroy_image') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        {{-- /Eğer profil fotoğrafı kayıtlı ise; sil butonu --}}
                        <li class="active">
                            <a data-toggle="tab" href="#overview">
                                <i class="fa fa-info"></i>
                                {!! lmcTrans('laravel-user-module/admin.fields.user.overview') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! lmcTrans('laravel-user-module/admin.fields.user.edit_info') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_avatar">
                                <i class="fa fa-picture-o"></i>
                                {!! lmcTrans('laravel-user-module/admin.fields.user.change_avatar') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_password">
                                <i class="fa fa-lock"></i>
                                {!! lmcTrans('laravel-user-module/admin.fields.user.change_password') !!}
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- /Profile Navigation --}}
                
                {{-- Profile Content --}}
                <div class="col-md-9">
                    <div class="tab-content">
                        
                        {{-- Overview --}}
                        @include('laravel-modules-core::user.show.overview')
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @include('laravel-modules-core::user.show.edit_info')
                        {{-- /Edit Info --}}

                        {{-- Change Avatar --}}
                        @include('laravel-modules-core::user.show.change_avatar')
                        {{-- /Change Avatar --}}

                        {{-- Change Password --}}
                        @include('laravel-modules-core::user.show.change_password')
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
