@extends(config('laravel-menu-module.views.menu.layout'))

@section('title')
    {!! lmcTrans("laravel-menu-module/admin.menu.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-menu-module/admin.menu.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-menu-module/admin.menu.{$operation}_description",
            [
                'menu'     => $operation === 'edit' ? $menu->title_uc_first : null
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
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/menu/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            title: { required: "{!! LMCValidation::getMessage('title','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/menu/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    <div class="row">

        {{-- Model Urls --}}
        <div class="col-md-3 col-sm-4">
            <div class="portlet light bordered">

                {{-- Portlet Title --}}
                <div class="portlet-title">
                    {{-- Caption --}}
                    <div class="caption margin-right-10">
                        <i class="fa fa-bars font-red"></i>
                        <span class="caption-subject font-red">
                            {!! lmcTrans("admin.fields.modules") !!}
                        </span>
                    </div>
                    {{-- /Caption --}}

                    {{-- Inputs --}}
                    <div class="inputs">
                        <div class="portlet-input input-inline input-small">
                            <div class="input-icon right">
                                <i class="icon-magnifier"></i>
                                {!! Form::text('search', null, [
                                    'class'         => 'form-control',
                                    'placeholder'   => lmcTrans('admin.ops.search'),
                                    'id'            => 'module-search'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    {{-- /Inputs --}}
                </div>
                {{-- /Portlet Title --}}

                {{-- Portlet Body --}}
                <div class="portlet-body">
                    @include('laravel-modules-core::menu.partials.menu_modules')
                </div>
                {{-- /Portlet Body --}}

            </div>
        </div>
        {{-- /Model Urls --}}

        {{-- Menu Operation --}}
        <div class="col-md-9 col-sm-8">
            <div class="portlet light bordered">
                {{-- Portlet Title and Actions --}}
                <div class="portlet-title">
                    {{-- Caption --}}
                    <div class="caption margin-right-10">
                        <i class="{!! config('laravel-menu-module.icons.menu') !!} font-red"></i>
                        <span class="caption-subject font-red">
                            {!! lmcTrans("laravel-menu-module/admin.menu.{$operation}") !!}
                        </span>
                    </div>
                    {{-- /Caption --}}

                    {{-- Actions --}}
                    @if($operation === 'edit')
                        <div class="actions pull-left">
                            {!! getOps($menu, 'edit', false) !!}
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
                        'url'   => lmbRoute('admin.menu.' . ($operation === 'edit' ? 'update' : 'store'),[
                                'id' => $operation === 'edit' ? $menu->id : null,
                        ]),
                        'class' => 'form'
                    ];
                    ?>
                    {!! Form::open($form) !!}

                    @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                    {{-- Form Body --}}
                    <div class="form-body">
                        @include('laravel-modules-core::menu.partials.form')
                    </div>
                    {{-- /Form Body --}}

                    @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                    {!! Form::close() !!}
                    {{-- /Operation Form --}}

                </div>
                {{-- /Portlet Body --}}
            </div>
        </div>
        {{-- /Menu Operation --}}

    </div>
@endsection
