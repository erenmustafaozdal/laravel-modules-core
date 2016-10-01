@if($parent && $parent->config_propagation)
    {{-- Category Configs --}}
    {!! Form::hidden('datatable_filter', $parent->datatable_filter) !!}
    {!! Form::hidden('datatable_tools', $parent->datatable_tools) !!}
    {!! Form::hidden('datatable_fast_add', $parent->datatable_fast_add) !!}
    {!! Form::hidden('datatable_group_action', $parent->datatable_group_action) !!}
    {!! Form::hidden('datatable_detail', $parent->datatable_detail) !!}
    {{-- /Category Configs --}}
@else
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
                <label class="control-label">{!! lmcTrans('admin.fields.datatable_filter') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('admin.helpers.datatable_filter') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_filter', 0) !!}
                {!! Form::checkbox( 'datatable_filter', 1, $model ? $model->datatable_filter : true, [
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
                <label class="control-label">{!! lmcTrans('admin.fields.datatable_tools') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('admin.helpers.datatable_tools') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_tools', 0) !!}
                {!! Form::checkbox( 'datatable_tools', 1, $model ? $model->datatable_tools : true, [
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
                <label class="control-label">{!! lmcTrans('admin.fields.datatable_fast_add') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('admin.helpers.datatable_fast_add') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_fast_add', 0) !!}
                {!! Form::checkbox( 'datatable_fast_add', 1, $model ? $model->datatable_fast_add : true, [
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
                <label class="control-label">{!! lmcTrans('admin.fields.datatable_group_action') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('admin.helpers.datatable_group_action') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_group_action', 0) !!}
                {!! Form::checkbox( 'datatable_group_action', 1, $model ? $model->datatable_group_action : true, [
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
                <label class="control-label">{!! lmcTrans('admin.fields.datatable_detail') !!}</label>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                <span class="help-block"> {!! lmcTrans('admin.helpers.datatable_detail') !!} </span>
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::hidden('datatable_detail', 0) !!}
                {!! Form::checkbox( 'datatable_detail', 1, $model ? $model->datatable_detail : true, [
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
@endif