@extends(config('laravel-dealer-module.views.dealer.layout'))

@section('title')
    @if(isset($dealer_category))
        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.show', [
            'dealer_category' => $dealer_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans('laravel-dealer-module/admin.dealer.show') !!}
    @endif
@endsection

@section('page-title')
    @if(isset($page_category))
        <h1>
            {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.show', [
                'dealer_category' => $dealer_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.show_description', [
                    'dealer_category' => $dealer_category->name_uc_first,
                    'dealer'          => $dealer->title_uc_first
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans('laravel-dealer-module/admin.dealer.show') !!}
            <small>
                {!! lmcTrans('laravel-dealer-module/admin.dealer.show_description', [
                    'dealer' => $dealer->title_uc_first
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($dealer_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$dealer_category], ['name']) !!}
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
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/dealer/show.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($dealer_category))
            var modelsURL = "{!! lmbRoute('api.dealer_category.models', ['id' => $dealer_category]) !!}";
        @else
            var modelsURL = "{!! lmbRoute('api.dealer_category.models') !!}";
        @endif
        var categoryDetailURL = "{!! lmbRoute('api.dealer_category.detail', ['id' => '###id###']) !!}";
        {{-- /lmbRoutes --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            province_id: { required: "{!! LMCValidation::getMessage('province_id','required') !!}" },
            county_id: { required: "{!! LMCValidation::getMessage('county_id','required') !!}" },
            land_phone: { phone_tr: "{!! LMCValidation::getMessage('land_phone','phone_tr') !!}" },
            mobile_phone: { phone_tr: "{!! LMCValidation::getMessage('mobile_phone','phone_tr') !!}" },
            url: { url: "{!! LMCValidation::getMessage('url','url') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/dealer/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $dealer->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $dealer->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-dealer-module.icons.dealer') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($dealer_category))
                        {!! lmcTrans('laravel-dealer-module/admin.dealer_category.dealer.show', [
                            'dealer_category' => $dealer_category->name_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans('laravel-dealer-module/admin.dealer.show') !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                @if(isset($dealer_category))
                    {!! getOps($dealer, 'show', true, $dealer_category, config('laravel-dealer-module.url.dealer')) !!}
                @else
                    {!! getOps($dealer, 'show', true) !!}
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

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($dealer_category) ? 'dealer_category.dealer' : 'dealer') .'.update'))
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
                                @include('laravel-modules-core::dealer.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($dealer_category) ? 'dealer_category.dealer' : 'dealer') .'.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => isset($dealer_category) ? lmbRoute('admin.dealer_category.dealer.update', [
                                    'id'                                    => $dealer_category->id,
                                    config('laravel-dealer-module.url.dealer')  => $dealer->id
                                ]) : lmbRoute('admin.dealer.update', [ 'id' => $dealer->id ]),
                                'id'        => 'dealer-edit-info'
                            ]) !!}

                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                            {{-- Form Body --}}
                            <div class="form-body">
                                @include('laravel-modules-core::dealer.partials.form')
                                @include('laravel-modules-core::dealer.partials.detail_form')
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
