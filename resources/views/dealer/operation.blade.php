@extends(config('laravel-dealer-module.views.dealer.layout'))

@section('title')
    @if(isset($dealer_category))
        {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer.{$operation}", [
            'dealer_category' => $dealer_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans("laravel-dealer-module/admin.dealer.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($dealer_category))
        <h1>
            {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer.{$operation}", [
                'dealer_category' => $dealer_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer.{$operation}_description", [
                    'dealer_category' => $dealer_category->name_uc_first,
                    'dealer'          => $operation === 'edit' ? $dealer->title_uc_first : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-dealer-module/admin.dealer.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-dealer-module/admin.dealer.{$operation}_description", [
                    'dealer' => $operation === 'edit' ? $dealer->title_uc_first : null
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/dealer/operation.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        @if(isset($dealer_category))
            var modelsURL = "{!! lmbRoute('api.dealer_category.models', ['id' => $dealer_category]) !!}";
        @else
            var modelsURL = "{!! lmbRoute('api.dealer_category.models') !!}";
        @endif
        {{-- /routes --}}

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
    <script src="{!! lmcElixir('assets/pages/js/loaders/dealer/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-dealer-module.icons.dealer') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($dealer_category))
                        {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer.{$operation}", [
                            'dealer_category' => $dealer_category->name_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-dealer-module/admin.dealer.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
            <div class="actions pull-left">
                @if(isset($dealer_category))
                    {!! getOps($dealer, 'edit', true, $dealer_category, config('laravel-dealer-module.url.dealer')) !!}
                @else
                    {!! getOps($dealer, 'edit', true) !!}
                @endif
            </div>
            @endif
            {{-- /Actions --}}
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
                    'url'   => isset($dealer_category) ? lmbRoute('admin.dealer_category.dealer.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id'                                    => $dealer_category->id,
                        config('laravel-dealer-module.url.dealer')  => $operation === 'edit' ? $dealer->id : null
                    ]) : lmbRoute('admin.dealer.' . ($operation === 'edit' ? 'update' : 'store'), [
                            'id' => $operation === 'edit' ? $dealer->id : null
                    ]),
                    'class' => 'form'
                ];
            ?>
            {!! Form::open($form) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                @include('laravel-modules-core::dealer.partials.form')
                @include('laravel-modules-core::dealer.partials.detail_form')

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
