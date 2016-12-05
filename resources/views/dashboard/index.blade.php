@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.dashboard.index") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.dashboard.index") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.dashboard.index_description") !!}
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

    {{-- Error Messages --}}
    @include('laravel-modules-core::partials.error_message')
    {{-- /Error Messages --}}

    {!! Html::image('vendor/laravel-modules-core/assets/frontend/img/dashboard/dashboard.png',null,[
        'class' => 'img-responsive'
    ]) !!}
@endsection
