@extends(config('ezelnet-frontend-module.views.page_management.layout'))

@section('title')
    {!! lmcTrans('ezelnet-frontend-module/admin.page_management.news') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('ezelnet-frontend-module/admin.page_management.news') !!}
        <small>
            {!! lmcTrans('ezelnet-frontend-module/admin.page_management.news_description') !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
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
                    {!! lmcTrans('ezelnet-frontend-module/admin.page_management.news') !!}
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
            @if( ! $pages->isEmpty())
                {!! Form::open([
                    'method'=> 'POST',
                    'url'   => lmbRoute('admin.page_management.pageOptionUpdate',[
                        'page'  => 'news',
                    ]),
                    'class' => 'form-horizontal form-bordered'
                ]) !!}

                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

                {{-- Form Body --}}
                <div class="form-body">

                    @foreach($pages as $page)
                        @include('laravel-modules-core::page_management.partials.page_option_title')
                        @include('laravel-modules-core::page_management.partials.page_option_button_text')
                        @include('laravel-modules-core::page_management.partials.page_option_item_count',[
                            'counts'    => config('ezelnet-frontend-module.page_item_count.blog')
                        ])
                    @endforeach

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
