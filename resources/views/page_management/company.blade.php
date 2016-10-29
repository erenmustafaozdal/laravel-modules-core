@extends(config('ezelnet-frontend-module.views.page_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.page_management.company") !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans("ezelnet-frontend-module/admin.page_management.company") !!}
        <small>
            {!! lmcTrans("ezelnet-frontend-module/admin.page_management.company_description") !!}
        </small>
    </h1>
@endsection

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
        {{-- /js file path --}}

        {{-- routes --}}
        var saveSortableURL = "{!! lmbRoute('admin.page_management.saveSortable') !!}";
        {{-- /routes --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/page_management/company.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
@endsection

@section('content')
    {{-- Sortable Content --}}
    <div id="sortable_portlets">
        
        {{-- Sortable Buttons --}}
        @include('laravel-modules-core::page_management.sortable_buttons')
        {{-- /Sortable Buttons --}}

        {{-- Note --}}
        <div class="note note-info">
            {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.root') !!}
        </div>
        {{-- /Note --}}
        
        <div class="sortable">

            @foreach($page->sections as $section)
                @include('laravel-modules-core::page_management.sortable_portlet')
            @endforeach

        </div>
    </div>
    {{-- /Sortable Content --}}
@endsection
