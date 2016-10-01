<h4>{!! lmcTrans('admin.fields.datatable_configs') !!}</h4>

{{-- Data Table Filter --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.datatable_filter') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->datatable_filter)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Data Table Filter --}}

{{-- Data Table Tools --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.datatable_tools') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->datatable_tools)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Data Table Tools --}}

{{-- Data Table Fast Add --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.datatable_fast_add') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->datatable_fast_add)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Data Table Fast Add --}}

{{-- Data Table Group Action --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.datatable_group_action') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->datatable_group_action)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Data Table Group Action --}}

{{-- Data Table Detail --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.datatable_detail') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->datatable_detail)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Data Table Detail --}}