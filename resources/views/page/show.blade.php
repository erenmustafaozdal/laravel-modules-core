@extends(config('laravel-page-module.views.page.layout'))

@section('title')
    @if(isset($page_category))
        {!! lmcTrans('laravel-page-module/admin.page_category.page.show', [
            'page_category' => $page_category->name_uc_first,
            'page'          => $page->title_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-page-module/admin.page.show', [
            'page'          => $page->title_uc_first
        ]) !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>
            {!! lmcTrans('laravel-page-module/admin.page_category.page.show', [
                'page_category' => $page_category->name_uc_first,
                'page'          => $page->title_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-page-module/admin.page_category.page.show_description', [
                    'page_category' => $page_category->name_uc_first,
                    'page'          => $page->title_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-page-module/admin.page.show', [
                'page'          => $page->title_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-page-module/admin.page.show_description', [ 'page' => $page->title_uc_first ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($page_category))
    @section('breadcrumb')
        {!! LMCBreadcrumb::getBreadcrumb([$page_category,$page], ['name','title']) !!}
    @endsection
@else
    @section('breadcrumb')
        {!! LMCBreadcrumb::getBreadcrumb([$page], ['title']) !!}
    @endsection
@endif

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

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
        var showJs = "{!! lmcElixir('assets/pages/scripts/page/show.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($page_category))
            var modelsURL = '';
        @else
            var modelsURL = "{!! route('api.page_category.models') !!}";
        @endif
        var tinymceURL = "{!! route('elfinder.tinymce4') !!}";
        var tinymceSaveURL = "{!! route('api.page.contentUpdate', [ 'id' => $page->id ]) !!}";
        var tinymcePermission = {!! Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('api.page.update') ? 'true' : 'false' !!};
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            category_id: { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" },
            slug: { alpha_dash: "{!! LMCValidation::getMessage('slug','alpha_dash') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/page/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $page->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $page->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-page-module.icons.page') !!} font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    @if(isset($page_category))
                        {!! lmcTrans('laravel-page-module/admin.page_category.page.show', [
                            'page_category' => $page_category->name_uc_first,
                            'page'          => $page->title_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans('laravel-page-module/admin.page.show', [
                            'page'      => $page->title_uc_first
                        ]) !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($page_category))
                    {!! getOps($page, 'show', true, $page_category, config('laravel-page-module.url.page')) !!}
                @else
                    {!! getOps($page, 'show', true) !!}
                @endif
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
                        <li class="active">
                            <a data-toggle="tab" href="#overview">
                                <i class="fa fa-info"></i>
                                {!! trans('laravel-modules-core::admin.fields.overview') !!}
                            </a>
                            <span class="after"> </span>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#content_info">
                                <i class="fa fa-file-text"></i>
                                {!! trans('laravel-modules-core::admin.fields.content_info') !!}
                            </a>
                            <span class="after"> </span>
                        </li>

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($page_category) ? 'page_category.page' : 'page') .'.update'))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                {{-- /Profile Navigation --}}

                {{-- Profile Content --}}
                <div class="col-md-9">
                    <div class="tab-content">

                        {{-- Overview --}}
                        <div id="overview" class="tab-pane active">
                            <div class="profile-info">
                                @include('laravel-modules-core::page.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Overview --}}
                        <div id="content_info" class="tab-pane">
                            @include('laravel-modules-core::page.partials.content_form', [ 'isForm' => false ])
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($page_category) ? 'page_category.page' : 'page') .'.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::model($page,[
                                'method'    => 'PATCH',
                                'url'       => isset($page_category) ? route('admin.page_category.page.update', [
                                    'id'                                    => $page_category->id,
                                    config('laravel-page-module.url.page')  => $page->id
                                ]) : route('admin.page.update', [ 'id' => $page->id ]),
                                'id'        => 'page-edit-info'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::page.partials.form', [
                                    'select2'       => true,
                                    'isRelation'    => isset($page_category) ? true : false
                                ])
                                @include('laravel-modules-core::page.partials.seo_form')
                            </div>
                            {{-- /Form Body --}}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                            {!! Form::close() !!}
                        </div>
                        @endif
                        {{-- /Edit Info --}}

                    </div>
                </div>
                {{-- /Profile Content --}}

            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
