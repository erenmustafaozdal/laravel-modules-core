@extends(config('laravel-document-module.views.document_category.layout'))

@section('title')
    @if(isset($parent_document_category))
        {!! lmcTrans('laravel-document-module/admin.document_category.document_category.show', ['parent_document_category' => $parent_document_category->name]) !!}
    @else
        {!! lmcTrans('laravel-document-module/admin.document_category.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_document_category))
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.document_category.show', ['parent_document_category' => $parent_document_category->name]) !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.document_category.show_description', [
                'parent_document_category'  => $parent_document_category->name,
                'document_category'         => $document_category->name
            ]) !!}</small>
        </h1>
    @else
        <h1>{!! lmcTrans('laravel-document-module/admin.document_category.show') !!}
            <small>{!! lmcTrans('laravel-document-module/admin.document_category.show_description', [ 'document_category' => $document_category->name ]) !!}</small>
        </h1>
    @endif
@endsection

@if(isset($parent_document_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_document_category], ['name']) !!}
@endsection
@endif

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/document_category/show.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/document_category/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-document-module.icons.document_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_document_category))
                        {!! lmcTrans('laravel-document-module/admin.document_category.document_category.show', ['parent_document_category' => $parent_document_category->name]) !!}
                    @else
                        {!! lmcTrans('laravel-document-module/admin.document_category.show') !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($parent_document_category))
                    {!! getOps($document_category, 'show', false, $parent_document_category, config('laravel-document-module.url.document_category')) !!}
                @else
                    {!! getOps($document_category, 'show', false) !!}
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

                        @if (hasPermission('admin.'. (isset($parent_document_category) ? 'document_category.document_category' : 'document_category') .'.update' . (isset($parent_document_category) ? '#####'.$parent_document_category->id : '')))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! lmcTrans('admin.fields.edit_info') !!}
                            </a>
                        </li>
                        
                        {{-- Relations --}}
                        @if(! isset($parent_document_category) || ! $parent_document_category->config_propagation)
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
                                @include('laravel-modules-core::document_category.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (hasPermission('admin.'. (isset($parent_document_category) ? 'document_category.document_category' : 'document_category') .'.update' . (isset($parent_document_category) ? '#####'.$parent_document_category->id : '')))

                        {{-- Edit Form --}}
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::model($document_category,[
                                'method'    => 'PATCH',
                                'url'       => isset($parent_document_category) ? lmbRoute('admin.document_category.document_category.update', [ 'id' => $parent_document_category->id, config('laravel-document-module.url.document_category') => $document_category->id, 'form' => 'general' ]) : lmbRoute('admin.document_category.update', [ 'id' => $document_category->id, 'form' => 'general' ]),
                                'id'        => 'document_category-edit-info'
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::document_category.partials.form', [
                                    'parent'    => isset($parent_document_category) ? $parent_document_category : false,
                                    'model'     => $document_category
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
                                'url'       => isset($parent_document_category) ? lmbRoute('admin.document_category.document_category.update', [ 'id' => $parent_document_category->id, config('laravel-document-module.url.document_category') => $document_category->id ]) : lmbRoute('admin.document_category.update', [ 'id' => $document_category->id ])
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::partials.form.photo_config_form', [
                                    'parent'    => isset($parent_document_category) ? $parent_document_category : false,
                                    'model'     => $document_category
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
                                'url'       => isset($parent_document_category) ? lmbRoute('admin.document_category.document_category.update', [ 'id' => $parent_document_category->id, config('laravel-document-module.url.document_category') => $document_category->id ]) : lmbRoute('admin.document_category.update', [ 'id' => $document_category->id ])
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::partials.form.extra_column_form', [
                                    'parent'    => isset($parent_document_category) ? $parent_document_category : false,
                                    'model'     => $document_category
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
