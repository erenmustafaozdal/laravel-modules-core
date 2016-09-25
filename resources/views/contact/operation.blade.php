@extends(config('laravel-contact-module.views.contact.layout'))

@section('title')
    {!! lmcTrans("laravel-contact-module/admin.contact.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-contact-module/admin.contact.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-contact-module/admin.contact.{$operation}_description", [
                'contact' => $operation === 'edit' ? $contact->title_uc_first : null
            ]) !!}
        </small>
    </h1>
@endsection

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
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var gmapsJs = "{!! lmcElixir('assets/app/gmaps.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/contact/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" },
            province_id: { required: "{!! LMCValidation::getMessage('province_id','required') !!}" },
            county_id: { required: "{!! LMCValidation::getMessage('county_id','required') !!}" },
            'group-number[0][number]': { phone_tr: "{!! LMCValidation::getMessage('number','phone_tr') !!}" },
            'group-email[0][email]': { email: "{!! LMCValidation::getMessage('email','email') !!}" }
        };
        var markerColor = "{!! config('laravel-contact-module.map_marker_color') !!}";
        var apiKey = "{!! config('laravel-contact-module.google_api_key') !!}";
        var defaultZoom = {{ isset($contact) ? $contact->zoom : 0 }};
        var defaultLatitude = "{{ isset($contact) ? $contact->latitude : '' }}";
        var defaultLongitude = "{{ isset($contact) ? $contact->longitude : '' }}";
        var defaultMapTitle = "{{ isset($contact) ? $contact->map_title : '' }}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/contact/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-map.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-contact-module.icons.contact') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-contact-module/admin.contact.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                {!! getOps($contact, 'edit', true) !!}
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
                    <a href="#location" data-toggle="tab" aria-expanded="true">
                        {!! trans('laravel-modules-core::admin.fields.location') !!}
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
                    'url'   => lmbRoute('admin.contact.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $contact->id : null
                    ]),
                    'class' => 'form'
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">

                        @include('laravel-modules-core::contact.partials.form')
                        @include('laravel-modules-core::contact.partials.detail_form')

                    </div>
                    <div class="tab-pane" id="location">
                        @include('laravel-modules-core::contact.partials.location_form')
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
