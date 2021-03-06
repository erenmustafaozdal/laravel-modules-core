@extends(config('laravel-product-module.views.product_showcase.layout'))

@section('title')
    {!! lmcTrans("laravel-product-module/admin.product_showcase.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-product-module/admin.product_showcase.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-product-module/admin.product_showcase.{$operation}_description", [
                'product' => $operation === 'edit' ? $product_showcase->name_uc_first : null
            ]) !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/product_showcase/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product_showcase/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-product-module.icons.product_showcase') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-product-module/admin.product_showcase.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
                <div class="actions pull-left">
                    {!! getOps($product_showcase, 'edit', false) !!}
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
            {!! Form::open([
                'method'=> $operation === 'edit' ? 'PATCH' : 'POST',
                'url'   => lmbRoute('admin.product_showcase.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $operation === 'edit' ? $product_showcase->id : null
                ]),
                'class' => 'form',
                'files' => true
            ]) !!}

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                @include('laravel-modules-core::product_showcase.partials.form')

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
