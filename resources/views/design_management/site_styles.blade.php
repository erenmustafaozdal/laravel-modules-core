@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_styles") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_styles") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_styles_description") !!}
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
    {{-- Site Styles --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="fa fa-desktop font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("ezelnet-frontend-module/admin.design_management.site_styles") !!}
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
                'url'   => lmbRoute('admin.design_management.update',[
                    'form' => 'site_styles'
                ]),
                'class' => 'form-horizontal form-bordered'
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])


            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::design_management.partials.site_styles_form')
            </div>
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Site Styles --}}
@endsection
