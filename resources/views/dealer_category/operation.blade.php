@extends(config('laravel-dealer-module.views.dealer_category.layout'))

@section('title')
    @if(isset($parent_dealer_category))
        {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer_category.{$operation}", [
            'parent_dealer_category' => $parent_dealer_category->name
        ]) !!}
    @else
        {!! lmcTrans("laravel-dealer-module/admin.dealer_category.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_dealer_category))
        <h1>
            {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer_category.{$operation}", [
                'parent_dealer_category'  => $parent_dealer_category->name
            ]) !!}
            <small>
                {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer_category.{$operation}_description", [
                    'parent_dealer_category'  => $parent_dealer_category->name,
                    'dealer_category'         => $operation === 'edit' ? $dealer_category->name : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-dealer-module/admin.dealer_category.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-dealer-module/admin.dealer_category.{$operation}_description",
                [
                    'dealer_category'     => $operation === 'edit' ? $dealer_category->name : null
                ]) !!}
            </small>
        </h1>
    @endif
@endsection

@if(isset($parent_dealer_category))
@section('breadcrumb')
    {!! LMCBreadcrumb::getBreadcrumb([$parent_dealer_category], ['name']) !!}
@endsection
@endif

@section('css')
    @parent
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/dealer_category/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/dealer_category/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-dealer-module.icons.dealer_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_dealer_category))
                        {!! lmcTrans("laravel-dealer-module/admin.dealer_category.dealer_category.{$operation}", [
                            'parent_dealer_category' => $parent_dealer_category->name
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-dealer-module/admin.dealer_category.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
                <div class="actions pull-left">
                    @if(isset($parent_dealer_category))
                        {!! getOps($dealer_category, 'edit', false, $parent_dealer_category, config('laravel-page-module.url.dealer_category')) !!}
                    @else
                        {!! getOps($dealer_category, 'edit', false) !!}
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
                    'url'   => isset($parent_dealer_category) ? route('admin.dealer_category.dealer_category.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $parent_dealer_category->id,
                        config('laravel-dealer-module.url.dealer_category') => $operation === 'edit' ? $dealer_category->id : null
                    ]) : route('admin.dealer_category.' . ($operation === 'edit' ? 'update' : 'store'),[
                            'id' => $operation === 'edit' ? $dealer_category->id : null,
                    ]),
                    'class' => 'form'
            ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($dealer_category,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::dealer_category.partials.form', [
                    'parent'    => isset($parent_dealer_category) ? $parent_dealer_category : false
                ])
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
