@extends(config('laravel-user-module.views.user.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/admin.role.show') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-user-module/admin.user.show') !!}
        <small>{!! str_replace([':role'], [$role->name], lmcTrans('laravel-user-module/admin.role.show_description'))  !!}</small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: {
                required: "{!! LMCValidation::getMessage('name','required') !!}"
            },
            slug: {
                alpha_dash: "{!! LMCValidation::getMessage('slug','alpha_dash') !!}"
            }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        $script.ready('validation', function()
        {
            $script("{!! lmcElixir('assets/app/validationMethods.js') !!}");
        });
        $script.ready('jquery', function()
        {
            $script("{!! lmcElixir('assets/pages/scripts/role/show.js') !!}",'show');
            $script("{!! lmcElixir('assets/pages/scripts/role/permission.js') !!}", 'permission');
            $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-easypiechart/dist/jquery.easypiechart.min.js','easypiechart');
            $script("{!! lmcElixir('assets/app/easypiechart.js') !!}", 'app_easypiechart');
        });
        $script.ready(['show', 'config'], function()
        {
            Show.init();
        });
        $script.ready(['config', 'permission'], function()
        {
            Permission.init();
        });
        $script.ready(['config', 'easypiechart', 'app_easypiechart'], function()
        {
            EasyPie.init({
                src: '.easy-pie-chart .number'
            });
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon">
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-user font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans('laravel-user-module/admin.role.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($role,'show') !!}
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
                        <li class="padding-tb-10">
                            @include('laravel-modules-core::partials.laravel-user-module.permissions_rate',['model'=>$role])
                        </li>
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
                            <a data-toggle="tab" href="#edit_permission">
                                <i class="fa fa-user-secret"></i>
                                {!! lmcTrans('laravel-user-module/admin.fields.role.edit_permission') !!}
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
                                <h1 class="font-blue sbold uppercase">{{ $role->name }}</h1>
                                {{-- /Summary --}}

                                {{-- Information on Form --}}
                                <form class="form-horizontal" role="form" action="#">
                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! lmcTrans('laravel-user-module/admin.fields.role.name') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $role->name }} </p>
                                        </div>
                                    </div>
                                    {{-- /Name --}}

                                    {{-- Slug --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! lmcTrans('laravel-user-module/admin.fields.role.slug') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $role->slug }} </p>
                                        </div>
                                    </div>
                                    {{-- /Slug --}}

                                    {{-- Created At --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $role->created_at }} </p>
                                        </div>
                                    </div>
                                    {{-- /Created At --}}

                                    {{-- Updated At --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $role->updated_at }} </p>
                                        </div>
                                    </div>
                                    {{-- /Updated At --}}
                                </form>
                                {{-- /Information on Form --}}

                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => route('admin.role.update', ['id' => $role->id]),
                                'id'        => 'role-edit-info'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::role.partials.form')
                            </div>
                            {{-- /Form Body --}}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                            {!! Form::close() !!}
                        </div>
                        {{-- /Edit Info --}}

                        {{-- Edit Permission --}}
                        <div id="edit_permission" class="tab-pane">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => route('admin.role.update', ['id' => $role->id]),
                                'id'        => 'edit-permission'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::partials.laravel-user-module.permissions', [
                                    'permissions'   => $role->permissions
                                ])
                            </div>
                            {{-- /Form Body --}}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                            {!! Form::close() !!}
                        </div>
                        {{-- /Edit Permission --}}
                        
                    </div>
                </div>
                {{-- /Profile Content --}}
                
            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
