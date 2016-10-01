@foreach($document->extras as $extra)
    <div class="form-group">
        <label class="col-sm-2 control-label"> {{ $extra->name_uc_first }} </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $extra->pivot->value }} </p>
        </div>
    </div>
@endforeach