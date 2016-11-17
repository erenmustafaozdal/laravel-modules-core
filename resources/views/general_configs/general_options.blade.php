@extends(config('ezelnet-frontend-module.views.general_configs.layout'))

@section('title')
    {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.general_options') !!}
@endsection

@section('page-title')
        <h1>
            {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.general_options') !!}
            <small>
                {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.general_options_description') !!}
            </small>
        </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-cogs font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('ezelnet-frontend-module/admin.general_configs.general_options') !!}
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
                'url'   => lmbRoute('admin.general_configs.generalOptionsUpdate'),
                'class' => 'form-horizontal form-bordered'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                @include('laravel-modules-core::general_configs.partials.general_options_form')

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
