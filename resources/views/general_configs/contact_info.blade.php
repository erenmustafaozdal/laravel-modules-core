@extends(config('ezelnet-frontend-module.views.general_configs.layout'))

@section('title')
    {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.contact_info') !!}
@endsection

@section('page-title')
        <h1>
            {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.contact_info') !!}
            <small>
                {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.contact_info_description') !!}
            </small>
        </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var modelJs = "{!! lmcElixir('assets/pages/scripts/general_configs/contact_info.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            email: { email: "{!! LMCValidation::getMessage('email','email') !!}" },
            phone: { phone_tr: "{!! LMCValidation::getMessage('phone','phone_tr') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/general_configs/contactInfo.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-phone font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.contact_info') !!}
                </span>
            </div>
            {{-- /Caption --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            {!! Form::open([
                'method'=> 'POST',
                'url'   => lmbRoute('admin.general_configs.contactInfoUpdate'),
                'class' => 'form-horizontal form-bordered'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                @include('laravel-modules-core::general_configs.partials.contact_info_form')

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
