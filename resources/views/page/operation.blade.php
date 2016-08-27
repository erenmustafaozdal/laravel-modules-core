@extends(config('laravel-page-module.views.page.layout'))

@section('title')
    @if(isset($page_category))
        {!! lmcTrans("laravel-page-module/admin.page_category.page.{$operation}", [
            'page_category' => $page_category->name
        ]) !!}
    @else
        {!! lmcTrans("laravel-page-module/admin.page.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>
            {!! lmcTrans("laravel-page-module/admin.page_category.page.{$operation}", [
                'page_category' => $page_category->name
            ]) !!}
            <small>
                {!! lmcTrans("laravel-page-module/admin.page_category.page.{$operation}_description", [
                    'page_category' => $page_category->name,
                    'page'          => $operation === 'edit' ? $page->title : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-page-module/admin.page.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-page-module/admin.page.{$operation}_description", [
                    'page' => $operation === 'edit' ? $page->title : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($page_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$page_category], ['name']) !!}
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
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/page/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($page_category))
            var modelsURL = '';
        @else
            var modelsURL = "{!! route('api.page_category.models') !!}";
        @endif
        var tinymceURL = "{!! route('elfinder.tinymce4') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" },
            slug: { alpha_dash: "{!! LMCValidation::getMessage('slug','alpha_dash') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/page/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-page-module.icons.page') !!} font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    @if(isset($page_category))
                        {!! lmcTrans("laravel-page-module/admin.page_category.page.{$operation}", [
                            'page_category' => $page_category->name
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-page-module/admin.page.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                @if(isset($page_category))
                    {!! getOps($page, 'edit', true, $page_category, config('laravel-page-module.url.page')) !!}
                @else
                    {!! getOps($page, 'edit', true) !!}
                @endif
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
                    'url'   => isset($page_category) ? route('admin.page_category.page.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id'                                    => $page_category->id,
                        config('laravel-page-module.url.page')  => $operation === 'edit' ? $page->id : null
                    ]) : route('admin.page.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $page->id : null
                    ]),
                    'class' => 'form'
                ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($page,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('laravel-modules-core::page.partials.form', [
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
            {{-- /Form Body --}}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

            {!! Form::close() !!}
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
