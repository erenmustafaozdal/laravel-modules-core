@extends(config('laravel-page-module.views.page_category.layout'))

@section('title')
    {!! lmcTrans('laravel-page-module/admin.page_category.show') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-page-module/admin.page_category.show') !!}
        <small>{!! lmcTrans('laravel-page-module/admin.page_category.show_description',[ 'page_category' => $page_category->name_uc_first ])  !!}</small>
    </h1>
@endsection

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
        var showJs = "{!! lmcElixir('assets/pages/scripts/page_category/show.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/page_category/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered portlet-fit">
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-page-module.icons.page_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-page-module/admin.page_category.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($page_category,'show') !!}
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

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page_category.update'))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                            <span class="after"> </span>
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

                                {{-- Summary --}}
                                <h1 class="font-blue sbold uppercase">{{ $page_category->name_uc_first }}</h1>
                                {{-- /Summary --}}

                                {{-- Information on Form --}}
                                <form class="form-horizontal" role="form" action="#">
                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $page_category->name_uc_first }} </p>
                                        </div>
                                    </div>
                                    {{-- /Name --}}

                                    {{-- Created At --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $page_category->created_at }} </p>
                                        </div>
                                    </div>
                                    {{-- /Created At --}}

                                    {{-- Updated At --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">
                                            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
                                        </label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"> {{ $page_category->updated_at }} </p>
                                        </div>
                                    </div>
                                    {{-- /Updated At --}}
                                </form>
                                {{-- /Information on Form --}}

                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.page_category.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::model($page_category,[
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.page_category.update', ['id' => $page_category->id]),
                                'id'        => 'page_category-edit-info'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::page_category.partials.form')
                                @include('laravel-modules-core::page_category.partials.detail_form')
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
