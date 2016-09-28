<ul class="list-group margin-top-40">

    {{-- Title --}}
    <li class="list-group-item bg-default bg-font-default">
        <h4>{!! lmcTrans('admin.fields.datatable_configs') !!}</h4>
    </li>
    {{-- /Title --}}

    {{-- Data Table Filter --}}
    <li class="list-group-item">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.datatable_filter') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.datatable_filter') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_filter', 0) !!}
                {!! Form::checkbox( 'datatable_filter', 1, isset($page_category) ? $page_category->datatable_filter : true, [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger'
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Data Table Filter --}}

    {{-- Data Table Tools --}}
    <li class="list-group-item">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.datatable_tools') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.datatable_tools') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_tools', 0) !!}
                {!! Form::checkbox( 'datatable_tools', 1, isset($page_category) ? $page_category->datatable_tools : true, [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger'
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Data Table Tools --}}

    {{-- Data Table Fast Add --}}
    <li class="list-group-item">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.datatable_fast_add') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.datatable_fast_add') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_fast_add', 0) !!}
                {!! Form::checkbox( 'datatable_fast_add', 1, isset($page_category) ? $page_category->datatable_fast_add : true, [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger'
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Data Table Fast Add --}}

    {{-- Data Table Group Action --}}
    <li class="list-group-item">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.datatable_group_action') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.datatable_group_action') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_group_action', 0) !!}
                {!! Form::checkbox( 'datatable_group_action', 1, isset($page_category) ? $page_category->datatable_group_action : true, [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger'
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Data Table Group Action --}}

    {{-- Data Table Detail --}}
    <li class="list-group-item">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.datatable_detail') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.datatable_detail') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_detail', 0) !!}
                {!! Form::checkbox( 'datatable_detail', 1, isset($page_category) ? $page_category->datatable_detail : true, [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger'
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Data Table Detail --}}

</ul>