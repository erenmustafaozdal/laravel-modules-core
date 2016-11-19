@extends(config('laravel-product-module.views.product_brand.layout'))

@section('title')
    {!! lmcTrans('laravel-product-module/admin.product_brand.show') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('laravel-product-module/admin.product_brand.show') !!}
        <small>
            {!! lmcTrans('laravel-product-module/admin.product_brand.show_description', [
                'product_brand' => $product_brand->name
            ]) !!}
        </small>
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
        var showJs = "{!! lmcElixir('assets/pages/scripts/product_brand/show.js') !!}";
        {{-- /js file path --}}

        {{-- languages --}}
        var messagesOfRules = {
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/product_brand/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-product-module.icons.product_brand') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-product-module/admin.product_brand.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($product_brand, 'show', false) !!}
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

                        @if (hasPermission('admin.product_brand.update'))
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
                                @include('laravel-modules-core::product_brand.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Edit Info --}}
                        @if (hasPermission('admin.product_brand.update'))
                            <div id="edit_info" class="tab-pane form">
                                {!! Form::model($product_brand,[
                                    'method'    => 'PATCH',
                                    'url'       => lmbRoute('admin.product_brand.update', [ 'id' => $product_brand->id ]),
                                    'id'        => 'product_brand-edit-info'
                                ]) !!}

                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                                {{-- Form Body --}}
                                <div class="form-body">
                                    @include('laravel-modules-core::product_brand.partials.form')
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