@extends(config('laravel-contact-module.views.contact.layout'))

@section('title')
    {!! lmcTrans('laravel-contact-module/admin.contact.show') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('laravel-contact-module/admin.contact.show') !!}
        <small>
            {!! lmcTrans('laravel-contact-module/admin.contact.show_description', [
                'contact' => $contact->title_uc_first
            ]) !!}
        </small>
    </h1>
@endsection

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
        var gmapsJs = "{!! lmcElixir('assets/app/gmaps.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/contact/show.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            province_id: { required: "{!! LMCValidation::getMessage('province_id','required') !!}" },
            county_id: { required: "{!! LMCValidation::getMessage('county_id','required') !!}" }
        };
        var apiKey = "{!! config('laravel-contact-module.google_api_key') !!}";
        var defaultZoom = {{ isset($contact) ? $contact->zoom : 0 }};
        var defaultLatitude = "{{ isset($contact) ? $contact->latitude : '' }}";
        var defaultLongitude = "{{ isset($contact) ? $contact->longitude : '' }}";
        var defaultMapTitle = "{{ isset($contact) ? $contact->map_title : '' }}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/contact/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-map.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $contact->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $contact->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-contact-module.icons.contact') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-contact-module/admin.contact.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($contact, 'show', true) !!}
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
                            <a data-toggle="tab" href="#detail">
                                <i class="fa fa-info-circle"></i>
                                {!! trans('laravel-modules-core::admin.fields.detail') !!}
                            </a>
                            <span class="after"> </span>
                        </li>

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.contact.update'))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                        </li>
                        @endif

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.contact.update'))
                        <li>
                            <a data-toggle="tab" href="#location">
                                <i class="fa fa-map-marker"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_map') !!}
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
                                @include('laravel-modules-core::contact.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Detail --}}
                        <div id="detail" class="tab-pane">
                            <div class="profile-info">
                                @include('laravel-modules-core::contact.partials.detail')
                            </div>
                        </div>
                        {{-- /Detail --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.contact.update'))
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.contact.update', [ 'id' => $contact->id, 'form' => 'general' ]),
                                'id'        => 'contact-edit-info'
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::contact.partials.form')
                                @include('laravel-modules-core::contact.partials.detail_form')
                            </div>
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        @endif
                        {{-- /Edit Info --}}

                        {{-- Edit Map --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.contact.update'))
                        <div id="location" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.contact.update', [ 'id' => $contact->id ])
                            ]) !!}
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                            <div class="form-body">
                                @include('laravel-modules-core::contact.partials.location_form')
                            </div>
                            @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        @endif
                        {{-- /Edit Map --}}

                    </div>
                </div>
                {{-- /Profile Content --}}

            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
