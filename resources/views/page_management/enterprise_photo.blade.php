@extends(config('ezelnet-frontend-module.views.page_management.layout'))

@section('title')
    {!! lmcTrans('ezelnet-frontend-module/admin.page_management.enterprise_photo') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('ezelnet-frontend-module/admin.page_management.enterprise_photo') !!}
        <small>
            {!! lmcTrans('ezelnet-frontend-module/admin.page_management.enterprise_photo_description') !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Bootstrap Select --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') !!}
    {{-- /Bootstrap Select --}}
@endsection

@section('script')
    @parent
    <script src="{!! lmcElixir('assets/pages/js/loaders/page_management/usefulLinks.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-pencil font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('ezelnet-frontend-module/admin.page_management.enterprise_photo') !!}
                </span>
            </div>
            {{-- /Caption --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Helpers --}}
            <div class="note note-info">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.page_options') !!}
            </div>
            {{-- /Helpers --}}

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            @if( ! $pages->isEmpty())
                {!! Form::open([
                    'method'=> 'POST',
                    'url'   => lmbRoute('admin.page_management.pageOptionUpdate',[
                        'page'  => 'enterprise_photo',
                    ]),
                    'class' => 'form-horizontal form-bordered'
                ]) !!}

                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                {{-- Form Body --}}
                <div class="form-body">

                    @foreach($pages as $page)
                        @include('laravel-modules-core::page_management.partials.page_option_title')
                        @include('laravel-modules-core::page_management.partials.page_option_gallery_type')
                    @endforeach

                </div>
                {{-- /Form Body --}}

                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                {!! Form::close() !!}
            @endif
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
