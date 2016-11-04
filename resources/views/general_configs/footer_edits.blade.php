@extends(config('ezelnet-frontend-module.views.general_configs.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.general_configs.footer_edits") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.general_configs.footer_edits") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.general_configs.footer_edits_description") !!}
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
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        {{-- /routes --}}


        $script.ready(['config','repeater'], function()
        {
        });
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/general_configs/footerEdits.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    @foreach($footers->chunk(2) as $chunked)
    <div class="row">

        @foreach($chunked as $footer)
        <div class="col-md-6">

            {{-- Footer Portlet --}}
            <a name="{{ $footer->slug }}"></a>
            <div class="portlet light bordered">
                {{-- Portlet Title and Actions --}}
                <div class="portlet-title tabbable-line">
                    {{-- Caption --}}
                    <div class="caption">
                        <i class="fa fa-bars font-red"></i>
                        <span class="caption-subject font-red"> {{ $footer->name_uc_first }} </span>
                    </div>
                    {{-- /Caption --}}
                </div>
                {{-- /Portlet Title and Actions --}}

                {{-- Portlet Body --}}
                <div class="portlet-body form">

                    {{-- Error Messages --}}
                    @if (Request::get('footer') === $footer->slug)
                        @include('laravel-modules-core::partials.error_message')
                    @endif
                    {{-- /Error Messages --}}

                    {{-- Operation Form --}}
                    {!! Form::open([
                        'method'=> 'POST',
                        'url'   => lmbRoute('admin.general_configs.footerEditsUpdate',[
                            'id'    => $footer->id,
                            'form' => $footer->slug
                        ]),
                        'class' => 'form-horizontal form-bordered'
                    ]) !!}

                    @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                    {{-- Form Body --}}
                    <div class="form-body">

                        @include('laravel-modules-core::general_configs.partials.footer_edits_form')

                    </div>
                    {{-- /Form Body --}}

                    @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                    {!! Form::close() !!}
                    {{-- /Operation Form --}}

                </div>
                {{-- /Portlet Body --}}
            </div>
            {{-- /Footer Portlet --}}

        </div>
        @endforeach

    </div>
    @endforeach
@endsection
