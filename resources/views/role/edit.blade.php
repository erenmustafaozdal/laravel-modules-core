@extends(config('laravel-user-module.views.role.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/admin.role.edit') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-user-module/admin.role.edit') !!}
        <small>{!! lmcTrans('laravel-user-module/admin.role.edit_description', [ 'role' => $role->name ])  !!}</small>
    </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
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
            $script("{!! lmcElixir('assets/pages/scripts/role/create.js') !!}",'create');
            $script("{!! lmcElixir('assets/pages/scripts/role/permission.js') !!}", 'permission');
        });
        $script.ready(['config','create','permission'], function()
        {
            Create.init();
            Permission.init();
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-user-follow font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans('laravel-user-module/admin.role.edit') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($role, 'edit') !!}
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Create Form --}}
            {!! Form::open([
                'method'    => 'PUT',
                'url'       => route('admin.role.update', ['id' => $role->id]),
                'class'     => 'form'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">
                <div class="tabbable-line">
                    {{-- Nav Tabs --}}
                    <ul class="nav nav-tabs nav-tabs-lg">
                        <li class="active">
                            <a href="#info" data-toggle="tab" aria-expanded="true">
                                {!! trans('laravel-modules-core::admin.fields.overview') !!}
                            </a>
                        </li>
                        <li>
                            <a href="#permission" data-toggle="tab" aria-expanded="true">
                                {!! lmcTrans('laravel-user-module/admin.fields.role.permissions') !!}
                            </a>
                        </li>
                    </ul>
                    {{-- /Nav Tabs --}}
                    
                    {{-- Tab Contents --}}
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            @include('laravel-modules-core::role.partials.form')
                        </div>
                        <div class="tab-pane" id="permission">
                            @include('laravel-modules-core::partials.laravel-user-module.permissions')
                        </div>
                    </div>
                    {{-- /Tab Contents --}}
                </div>
            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Create Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
