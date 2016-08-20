@extends(config('laravel-user-module.views.user.layout'))

@section('title')
    {!! lmcTrans("laravel-user-module/admin.user.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-user-module/admin.user.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-user-module/admin.user.{$operation}_description", [
                'user' => $operation === 'edit' ? $user->fullname : null
            ])  !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- jCrop Image Crop Extension --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /jCrop Image Crop Extension --}}

    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/user/operation.js') !!}";
        var permissionJs = "{!! lmcElixir('assets/pages/scripts/role/permission.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var modelsURL = "{!! route('api.role.models') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            first_name: { required: "{!! LMCValidation::getMessage('first_name','required') !!}" },
            last_name: { required: "{!! LMCValidation::getMessage('last_name','required') !!}" },
            email: { required: "{!! LMCValidation::getMessage('email','required') !!}", email: "{!! LMCValidation::getMessage('email','email') !!}" },
            password: { required: "{!! LMCValidation::getMessage('password','required') !!}", minlength: "{!! LMCValidation::getMessage('password','min.string', [':min' => 6]) !!}" },
            password_confirmation: { required: "{!! LMCValidation::getMessage('password_confirmation','required') !!}", minlength: "{!! LMCValidation::getMessage('password_confirmation','min.string', [':min' => 6]) !!}", equalTo: "{!! LMCValidation::getMessage('password','confirmed') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/user/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-user-follow font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans("laravel-user-module/admin.user.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                {!! getOps($user,'edit') !!}
            </div>
            @endif
            {{-- /Actions --}}

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.overview') !!}
                    </a>
                </li>
                <li>
                    <a href="#avatar" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('laravel-user-module/admin.fields.user.photo') !!}
                    </a>
                </li>
                <li>
                    <a href="#permission" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('laravel-user-module/admin.fields.role.permissions') !!}
                    </a>
                </li>
            </ul>
            {{-- /Nav Tabs --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            <?php
            $form = [
                    'method'=> $operation === 'edit' ? 'PATCH' : 'POST',
                    'url'   => route('admin.user.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $user->id : null
                    ]),
                    'class' => 'form'
            ];
            ?>
            {!! Form::open([
                'method'    => 'PATCH',
                'url'       => route('admin.user.update', ['id' => $operation === 'edit' ? $user->id : null]),
                'class'     => 'form',
                'files'     => true
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                    {{-- Tab Contents --}}
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            @include('laravel-modules-core::user.partials.roles_form')
                            @include('laravel-modules-core::user.partials.edit_info_form')
                            @include('laravel-modules-core::user.partials.change_password_form')
                        </div>
                        <div class="tab-pane" id="avatar">
                            @include('laravel-modules-core::partials.form.photo_crop_form', [
                                'label'         => lmcTrans('laravel-user-module/admin.fields.user.photo')
                            ])
                        </div>
                        <div class="tab-pane" id="permission">
                            @include('laravel-modules-core::partials.laravel-user-module.permissions', [
                                'permissions'       => $operation === 'edit' ? $user->permissions : []
                            ])
                        </div>
                    </div>
                {{-- /Tab Contents --}}

            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
