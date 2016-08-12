@extends(config('laravel-page-module.views.page.layout'))

@section('title')
    @if(isset($page_category))
        {!! lmcTrans('laravel-page-module/admin.page_category.page.create', ['page_category' => $page_category->name]) !!}
    @else
        {!! lmcTrans('laravel-page-module/admin.page.create') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>{!! lmcTrans('laravel-page-module/admin.page_category.page.create', ['page_category' => $page_category->name]) !!}
            <small>{!! lmcTrans('laravel-page-module/admin.page_category.page.create_description', ['page_category' => $page_category->name]) !!}</small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-page-module/admin.page.create') !!}
            <small>{!! lmcTrans('laravel-page-module/admin.page.create_description') !!}</small>
        </h1>
    @endif
@endsection

@if(isset($page_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb($page_category, 'name') !!}
@endsection
@endif

@section('css')
    @parent
    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($page_category))
            var modelsURL = '';
        @else
            var modelsURL = "{!! route('api.page_category.models') !!}";
        @endif
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: {
                required: "{!! LMCValidation::getMessage('category_id','required') !!}"
            },
            title: {
                required: "{!! LMCValidation::getMessage('title','required') !!}"
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
            $script("{!! lmcElixir('assets/pages/scripts/page/create.js') !!}",'create');
        });
        $script.ready(['config','create'], function()
        {
            Create.init();
        });
        $script.ready(['config','app_select2'], function()
        {
            Select2.init({
                variableNames: {
                    text: 'name'
                },
                select2: {
                    ajax: {
                        url: modelsURL
                    }
                }
            });
        });
        $script.ready(['config','app_tinymce'], function()
        {
            Tinymce.init({
                route: '{!! route('elfinder.tinymce4') !!}'
            });
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption">
                <i class="icon-note font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans('laravel-page-module/admin.page.create') !!}
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

            {{-- Create Form --}}
            {!! Form::open([
                'method'    => 'POST',
                'url'       => isset($page_category) ? route('admin.page_category.page.store', [
                    'id'    => $page_category->id
                ]) : route('admin.page.store'),
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
                            <a href="#content_info" data-toggle="tab" aria-expanded="true">
                                {!! trans('laravel-modules-core::admin.fields.content_info') !!}
                            </a>
                        </li>
                        <li>
                            <a href="#seo" data-toggle="tab" aria-expanded="true">
                                {!! trans('laravel-modules-core::admin.fields.seo') !!}
                            </a>
                        </li>
                    </ul>
                    {{-- /Nav Tabs --}}

                    {{-- Tab Contents --}}
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            @include('laravel-modules-core::page.partials.form', [
                                'select2'       => true,
                                'isRelation'    => isset($page_category) ? true : false
                            ])
                        </div>
                        <div class="tab-pane" id="content_info">
                            @include('laravel-modules-core::page.partials.content_form', [ 'isForm' => true ])
                        </div>
                        <div class="tab-pane" id="seo">
                            @include('laravel-modules-core::page.partials.seo_form')
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
