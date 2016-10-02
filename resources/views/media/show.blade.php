@extends(config('laravel-media-module.views.media.layout'))

@section('title')
    @if(isset($media_category))
        {!! lmcTrans('laravel-media-module/admin.media_category.media.show', [
            'media_category' => $media_category->name_uc_first,
            'media'          => $media->title_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-media-module/admin.media.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media_category.media.show', [
                'media_category' => $media_category->name_uc_first,
                'media'          => $media->title_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media_category.media.show_description', [
                    'media_category' => $media_category->name_uc_first,
                    'media'          => $media->title_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media.show') !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media.show_description', [
                    'media' => $media->title_uc_first
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($media_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$media_category,$media], ['name','title']) !!}
@endsection
@endif

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

    {{-- Date Picker --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {{-- /Date Picker --}}

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
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/media/show.js') !!}";
        {{-- /js file path --}}

        {{-- Description Is Editor --}}
        @if(isset($media_category) && $media_category->description_is_editor)
            var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
            var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        @endif
        {{-- /Description Is Editor --}}

        {{-- routes --}}
        @if(isset($media_category))
            var modelsURL = "{!! lmbRoute('api.media_category.models', ['id' => $media_category]) !!}";
        @else
            var modelsURL = "{!! lmbRoute('api.media_category.models') !!}";
        @endif
        var categoryDetailURL = "{!! lmbRoute('api.media_category.detail', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/media/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    {{-- Description Is Editor --}}
    @if(isset($media_category) && $media_category->description_is_editor)
        <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
    @endif
    {{-- /Description Is Editor --}}
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $media->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $media->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-media-module.icons.media') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($media_category))
                        {!! lmcTrans('laravel-media-module/admin.media_category.media.show', [
                            'media_category' => $media_category->name_uc_first,
                            'media'          => $media->title_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans('laravel-media-module/admin.media.show') !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($media_category))
                    {!! getOps($media, 'show', true, $media_category, config('laravel-media-module.url.media')) !!}
                @else
                    {!! getOps($media, 'show', true) !!}
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

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($media_category) ? 'media_category.media' : 'media') .'.update'))
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
                                @include('laravel-modules-core::media.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($media_category) ? 'media_category.media' : 'media') .'.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => isset($media_category) ? lmbRoute('admin.media_category.media.update', [
                                    'id'                                    => $media_category->id,
                                    config('laravel-media-module.url.media')  => $media->id
                                ]) : lmbRoute('admin.media.update', [ 'id' => $media->id ]),
                                'id'        => 'media-edit-info',
                                'files'     => true
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::media.partials.form')
                                @include('laravel-modules-core::partials.form.model_extras_form', [
                                    'category'  => isset($media_category) ? $media_category : false,
                                    'model'     => $media
                                ])
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
