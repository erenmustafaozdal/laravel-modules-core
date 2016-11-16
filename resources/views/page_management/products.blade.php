@extends(config('ezelnet-frontend-module.views.page_management.layout'))

@section('title')
    {!! lmcTrans('ezelnet-frontend-module/admin.page_management.products') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('ezelnet-frontend-module/admin.page_management.products') !!}
        <small>
            {!! lmcTrans('ezelnet-frontend-module/admin.page_management.products_description') !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Bootstrap Select --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') !!}
    {{-- /Bootstrap Select --}}
@endsection

@section('script')
    @parent
    <script src="{!! lmcElixir('assets/pages/js/loaders/page_management/usefulLinks.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered">
        {{-- Portlet Title and Actions --}}
        <div class="portlet-title tabbable-line">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="icon-pencil font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('ezelnet-frontend-module/admin.page_management.products') !!}
                </span>
            </div>
            {{-- /Caption --}}
        </div>
        {{-- /Portlet Title and Actions --}}

        {{-- Portlet Body --}}
        <div class="portlet-body form">

            {{-- Helpers --}}
            <div class="note note-info">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.page_options') !!}
            </div>
            {{-- /Helpers --}}

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            {{-- Operation Form --}}
            @if( ! $categories->isEmpty() || ! $brands->isEmpty() || ! $showcase->isEmpty())
                {!! Form::open([
                    'method'=> 'POST',
                    'url'   => lmbRoute('admin.page_management.pageOptionUpdate',[
                        'page'  => 'products',
                    ]),
                    'class' => 'form-horizontal form-bordered'
                ]) !!}

                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                {{-- Form Body --}}
                <div class="form-body">

                    {{-- Tab Drop --}}
                    <div class="tabbable tabbable-tabdrop">
                        <ul class="nav nav-tabs">

                            {{-- Showcase --}}
                            <?php $i=0; ?>
                            @foreach($showcase as $page)
                            <li {!! $i === 0 ? 'class=active' : '' !!}>
                                <a href="#page{{ $page->id }}" data-toggle="tab">{{ $page->title_uc_first }}</a>
                            </li>
                            <?php $i++; ?>
                            @endforeach
                            {{-- /Showcase --}}

                            {{-- Categories --}}
                            @foreach($categories as $page)
                            <li {!! $i === 0 ? 'class=active' : '' !!}>
                                <a href="#page{{ $page->id }}" data-toggle="tab">{{ $page->title_uc_first }}</a>
                            </li>
                            <?php $i++; ?>
                            @endforeach
                            {{-- /Categories --}}

                            {{-- Brands --}}
                            @foreach($brands as $page)
                            <li {!! $i === 0 ? 'class=active' : '' !!}>
                                <a href="#page{{ $page->id }}" data-toggle="tab">{{ $page->title_uc_first }}</a>
                            </li>
                            <?php $i++; ?>
                            @endforeach
                            {{-- /Brands --}}

                        </ul>
                        <div class="tab-content">

                            {{-- Showcase --}}
                            <?php $i=0; ?>
                            @foreach($showcase as $page)
                            <div class="tab-pane {!! $i === 0 ? 'active' : '' !!}" id="page{{ $page->id }}">
                                @include('laravel-modules-core::page_management.partials.page_option_title')
                                @include('laravel-modules-core::page_management.partials.page_option_category_title')
                                @include('laravel-modules-core::page_management.partials.page_option_brand_title')
                                @include('laravel-modules-core::page_management.partials.page_option_brand_is_active')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_title')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_is_active')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_item_count')
                                @include('laravel-modules-core::page_management.partials.page_option_item_count',[
                                    'counts'    => config('ezelnet-frontend-module.page_item_count.product')
                                ])
                                @include('laravel-modules-core::page_management.partials.page_option_item_visible')
                                @include('laravel-modules-core::page_management.partials.page_option_revert_is_active')
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            {{-- /Showcase --}}

                            {{-- Categories --}}
                            @foreach($categories as $page)
                            <div class="tab-pane {!! $i === 0 ? 'active' : '' !!}" id="page{{ $page->id }}">
                                @include('laravel-modules-core::page_management.partials.page_option_title')
                                @include('laravel-modules-core::page_management.partials.page_option_category_title')
                                @include('laravel-modules-core::page_management.partials.page_option_brand_title')
                                @include('laravel-modules-core::page_management.partials.page_option_brand_is_active')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_title')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_is_active')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_item_count')
                                @include('laravel-modules-core::page_management.partials.page_option_item_count',[
                                    'counts'    => config('ezelnet-frontend-module.page_item_count.product')
                                ])
                                @include('laravel-modules-core::page_management.partials.page_option_item_visible')
                                @include('laravel-modules-core::page_management.partials.page_option_revert_is_active')
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            {{-- /Categories --}}

                            {{-- Brands --}}
                            @foreach($brands as $page)
                            <div class="tab-pane {!! $i === 0 ? 'active' : '' !!}" id="page{{ $page->id }}">
                                @include('laravel-modules-core::page_management.partials.page_option_title')
                                @include('laravel-modules-core::page_management.partials.page_option_category_title')
                                @include('laravel-modules-core::page_management.partials.page_option_brand_title')
                                @include('laravel-modules-core::page_management.partials.page_option_brand_is_active')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_title')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_is_active')
                                @include('laravel-modules-core::page_management.partials.page_option_chance_item_count')
                                @include('laravel-modules-core::page_management.partials.page_option_item_count',[
                                    'counts'    => config('ezelnet-frontend-module.page_item_count.product')
                                ])
                                @include('laravel-modules-core::page_management.partials.page_option_item_visible')
                                @include('laravel-modules-core::page_management.partials.page_option_revert_is_active')
                            </div>
                            <?php $i++; ?>
                            @endforeach
                            {{-- /Brands --}}

                        </div>
                    </div>
                    {{-- /Tab Drop --}}

                </div>
                {{-- /Form Body --}}

                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])

                {!! Form::close() !!}
            @endif
            {{-- /Operation Form --}}

        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
