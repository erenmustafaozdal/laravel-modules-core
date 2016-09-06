@extends(config('laravel-description-module.views.description_category.layout'))

@section('title')
    @if(isset($parent_description_category))
        {!! lmcTrans('laravel-description-module/admin.description_category.description_category.show', [
            'parent_description_category' => $parent_description_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-description-module/admin.description_category.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_description_category))
        <h1>
            {!! lmcTrans('laravel-description-module/admin.description_category.description_category.show', [
                'parent_description_category' => $parent_description_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-description-module/admin.description_category.description_category.show_description', [
                    'parent_description_category'  => $parent_description_category->name_uc_first,
                    'description_category'         => $description_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-description-module/admin.description_category.show') !!}
            <small>
                {!! lmcTrans('laravel-description-module/admin.description_category.show_description', [
                    'description_category' => $description_category->name_uc_first
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($parent_description_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_description_category], ['name']) !!}
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
        var showJs = "{!! lmcElixir('assets/pages/scripts/description_category/show.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/description_category/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-description-module.icons.description_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-description-module/admin.description_category.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($parent_description_category))
                    {!! getOps($description_category, 'show', false, $parent_description_category, config('laravel-description-module.url.description_category')) !!}
                @else
                    {!! getOps($description_category, 'show', false) !!}
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

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($parent_description_category) ? 'description_category.description_category' : 'description_category') .'.update'))
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
                                @include('laravel-modules-core::description_category.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($parent_description_category) ? 'description_category.description_category' : 'description_category') .'.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::model($description_category,[
                                'method'    => 'PATCH',
                                'url'       => isset($parent_description_category)
                                    ? route('admin.description_category.description_category.update', [
                                        'id' => $parent_description_category->id,
                                        config('laravel-description-module.url.description_category') => $description_category->id
                                    ])
                                    : route('admin.description_category.update', [ 'id' => $description_category->id ]),
                                'id'        => 'description_category-edit-info'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::description_category.partials.form', [
                                    'parent'    => isset($parent_description_category) ? $parent_description_category : false,
                                    'model'     => $description_category
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
