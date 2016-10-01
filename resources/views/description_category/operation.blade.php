@extends(config('laravel-description-module.views.description_category.layout'))

@section('title')
    @if(isset($parent_description_category))
        {!! lmcTrans("laravel-description-module/admin.description_category.description_category.{$operation}", [
            'parent_description_category' => $parent_description_category->name_uc_first
        ]) !!}
    @else
        {!! lmcTrans("laravel-description-module/admin.description_category.{$operation}") !!}
    @endif
@endsection

@section('page-title')
    @if(isset($parent_description_category))
        <h1>
            {!! lmcTrans("laravel-description-module/admin.description_category.description_category.{$operation}", [
                'parent_description_category'  => $parent_description_category->name_uc_first
            ]) !!}
            <small>
                {!! lmcTrans("laravel-description-module/admin.description_category.description_category.{$operation}_description", [
                    'parent_description_category'  => $parent_description_category->name_uc_first,
                    'description_category'         => $operation === 'edit' ? $description_category->name_uc_first : null
                ]) !!}
            </small>
        </h1>
    @else
        <h1>
            {!! lmcTrans("laravel-description-module/admin.description_category.{$operation}") !!}
            <small>
                {!! lmcTrans("laravel-description-module/admin.description_category.{$operation}_description", [
                    'description_category'     => $operation === 'edit' ? $description_category->name_uc_first : null
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
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var operationJs = "{!! lmcElixir('assets/pages/scripts/description_category/operation.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/description_category/operation.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-description-module.icons.description_category') !!} font-red"></i>
                <span class="caption-subject font-red">
                    @if(isset($parent_description_category))
                        {!! lmcTrans("laravel-description-module/admin.description_category.description_category.{$operation}", [
                            'parent_description_category' => $parent_description_category->name_uc_first
                        ]) !!}
                    @else
                        {!! lmcTrans("laravel-description-module/admin.description_category.{$operation}") !!}
                    @endif
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            @if($operation === 'edit')
                <div class="actions pull-left">
                    @if(isset($parent_description_category))
                        {!! getOps($description_category, 'edit', false, $parent_description_category, config('laravel-page-module.url.description_category')) !!}
                    @else
                        {!! getOps($description_category, 'edit', false) !!}
                    @endif
                </div>
            @endif
            {{-- /Actions --}}

            {{-- Nav Tabs --}}
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#info" data-toggle="tab" aria-expanded="true">
                        {!! lmcTrans('admin.fields.overview') !!}
                    </a>
                </li>
                @if(! isset($parent_description_category) || ! $parent_description_category->config_propagation)
                    <li>
                        <a href="#photo_configs" data-toggle="tab" aria-expanded="true">
                            {!! lmcTrans('admin.fields.photo_configs') !!}
                        </a>
                    </li>
                    <li>
                        <a href="#extra_columns" data-toggle="tab" aria-expanded="true">
                            {!! lmcTrans('admin.fields.extra_columns') !!}
                        </a>
                    </li>
                @endif
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
                    'url'   => isset($parent_description_category) ? lmbRoute('admin.description_category.description_category.' . ($operation === 'edit' ? 'update' : 'store'), [
                        'id' => $parent_description_category->id,
                        config('laravel-description-module.url.description_category') => $operation === 'edit' ? $description_category->id : null
                    ]) : lmbRoute('admin.description_category.' . ($operation === 'edit' ? 'update' : 'store'),[
                            'id' => $operation === 'edit' ? $description_category->id : null,
                    ]),
                    'class' => 'form'
            ];
            ?>
            @if($operation === 'edit')
                {!! Form::model($description_category,$form) !!}
            @else
                {!! Form::open($form) !!}
            @endif

            @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

            {{-- Form Body --}}
            <div class="form-body">

                {{-- Tab Contents --}}
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('laravel-modules-core::description_category.partials.form', [
                            'parent'    => isset($parent_description_category) ? $parent_description_category : false
                        ])
                    </div>
                    <div class="tab-pane" id="photo_configs">
                        @include('laravel-modules-core::partials.form.photo_config_form', [
                            'parent'    => isset($parent_description_category) ? $parent_description_category : false,
                            'model'     => isset($description_category) ? $description_category : false
                        ])
                    </div>
                    <div class="tab-pane" id="extra_columns">
                        @include('laravel-modules-core::partials.form.extra_column_form', [
                            'parent'    => isset($parent_description_category) ? $parent_description_category : false,
                            'model'     => isset($description_category) ? $description_category : false
                        ])
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
