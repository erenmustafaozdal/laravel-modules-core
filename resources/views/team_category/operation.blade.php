@extends(config('laravel-team-module.views.team_category.layout'))

@section('title')
    {!! lmcTrans("laravel-team-module/admin.team_category.{$operation}") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("laravel-team-module/admin.team_category.{$operation}") !!}
        <small>
            {!! lmcTrans("laravel-team-module/admin.team_category.{$operation}_description",
            [
                'team_category'     => $operation === 'edit' ? $team_category->name : null
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
        var operationJs = "{!! lmcElixir('assets/pages/scripts/team_category/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/team_category/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-team-module.icons.team_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans("laravel-team-module/admin.team_category.{$operation}") !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
                <div class="actions pull-left">
                    {!! getOps($team_category, 'edit', false) !!}
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
                    'url'   => lmbRoute('admin.team_category.' . ($operation === 'edit' ? 'update' : 'store'),[
                            'id' => $operation === 'edit' ? $team_category->id : null,
                    ]),
                    'class' => 'form'
            ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($team_category,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">
                @include('laravel-modules-core::team_category.partials.form')
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
