@foreach($model->extras as $extra)
    @if(getModelSlug($model) == 'description' && $extra->type != 'date')
    <div class="form-group">
        <label class="col-sm-2 control-label"> {{ $extra->name_uc_first }} </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $extra->pivot->value }} </p>
        </div>
    </div>
    @endif
@endforeach