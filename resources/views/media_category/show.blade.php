@extends(config('laravel-media-module.views.media_category.layout'))

@section('title')
    @if(isset($parent_media_category))
        {!! lmcTrans('laravel-media-module/admin.media_category.media_category.show', [
            'parent_media_category' => $parent_media_category->name
        ]) !!}
    @else
        {!! lmcTrans('laravel-media-module/admin.media_category.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_media_category))
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media_category.media_category.show', [
                'parent_media_category' => $parent_media_category->name
            ]) !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media_category.media_category.show_description', [
                    'parent_media_category'  => $parent_media_category->name,
                    'media_category'         => $media_category->name
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-media-module/admin.media_category.show') !!}
            <small>
                {!! lmcTrans('laravel-media-module/admin.media_category.show_description', [
                    'media_category' => $media_category->name
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($parent_media_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_media_category], ['name']) !!}
@endsection
@endif

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

    {{-- Portfolio (CubePortfolio) CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/cubeportfolio/css/cubeportfolio.css') !!}
    {{-- /Portfolio (CubePortfolio) CSS --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/media_category/show.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            type: { required: "{!! LMCValidation::getMessage('type','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/media_category/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-media-module.icons.media_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_media_category))
                        {!! lmcTrans('laravel-media-module/admin.media_category.media_category.show', ['parent_media_category' => $parent_media_category->name]) !!}
                    @else
                        {!! lmcTrans('laravel-media-module/admin.media_category.show') !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($parent_media_category))
                    {!! getOps($media_category, 'show', false, $parent_media_category, config('laravel-media-module.url.media_category')) !!}
                @else
                    {!! getOps($media_category, 'show', false) !!}
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

                        @if (hasPermission('admin.'. (isset($parent_media_category) ? 'media_category.media_category' : 'media_category') .'.update' . (isset($parent_media_category) ? '#####'.$parent_media_category->id : '')))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                        </li>

                        {{-- Relations --}}
                        @if(! isset($parent_media_category) || ! $parent_media_category->config_propagation)
                            <li>
                                <a data-toggle="tab" href="#photo_configs">
                                    <i class="fa fa-picture-o"></i>
                                    {!! lmcTrans('admin.fields.photo_configs') !!}
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#extra_columns">
                                    <i class="fa fa-database"></i>
                                    {!! lmcTrans('admin.fields.extra_columns') !!}
                                </a>
                            </li>
                        @endif
                        {{-- /Relations --}}

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
                                @include('laravel-modules-core::media_category.partials.overview')

                                @if($media_category->medias->count() > 0)
                                    <h4>{!! lmcTrans("laravel-media-module/admin.fields.media_category.{$media_category->type}s") !!}</h4>
                                    @include('laravel-modules-core::media_category.partials.medias')
                                @endif
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (hasPermission('admin.'. (isset($parent_media_category) ? 'media_category.media_category' : 'media_category') .'.update' . (isset($parent_media_category) ? '#####'.$parent_media_category->id : '')))

                        {{-- Edit Form --}}
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::model($media_category,[
                                'method'    => 'PATCH',
                                'url'       => isset($parent_media_category) ? lmbRoute('admin.media_category.media_category.update', [ 'id' => $parent_media_category->id, config('laravel-media-module.url.media_category') => $media_category->id, 'form' => 'general' ]) : lmbRoute('admin.media_category.update', [ 'id' => $media_category->id, 'form' => 'general' ]),
                                'id'        => 'media_category-edit-info'
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::media_category.partials.form', [
                                    'parent'    => isset($parent_media_category) ? $parent_media_category : false,
                                    'model'     => $media_category
                                ])
                            </div>
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Edit Form --}}

                        {{-- Photo Form --}}
                        <div id="photo_configs" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => isset($parent_media_category) ? lmbRoute('admin.media_category.media_category.update', [ 'id' => $parent_media_category->id, config('laravel-media-module.url.media_category') => $media_category->id ]) : lmbRoute('admin.media_category.update', [ 'id' => $media_category->id ])
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::partials.form.photo_config_form', [
                                    'parent'    => isset($parent_media_category) ? $parent_media_category : false,
                                    'model'     => $media_category
                                ])
                            </div>
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Photo Form --}}

                        {{-- Extra Column Form --}}
                        <div id="extra_columns" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => isset($parent_media_category) ? lmbRoute('admin.media_category.media_category.update', [ 'id' => $parent_media_category->id, config('laravel-media-module.url.media_category') => $media_category->id ]) : lmbRoute('admin.media_category.update', [ 'id' => $media_category->id ])
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::partials.form.extra_column_form', [
                                    'parent'    => isset($parent_media_category) ? $parent_media_category : false,
                                    'model'     => $media_category
                                ])
                            </div>
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Extra Column Form --}}

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
