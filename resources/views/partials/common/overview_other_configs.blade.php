<h4>{!! lmcTrans('admin.fields.other_configs') !!}</h4>

{{-- Description Is Editor --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.description_is_editor') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->description_is_editor)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Description Is Editor --}}

{{-- Config Propagation --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.config_propagation') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static">
            @if ($model->config_propagation)
                <span class="font-green"> {!! lmcTrans('admin.ops.yes') !!} </span>
            @else
                <span class="font-red"> {!! lmcTrans('admin.ops.no') !!} </span>
            @endif
        </p>
    </div>
</div>
{{-- /Config Propagation --}}