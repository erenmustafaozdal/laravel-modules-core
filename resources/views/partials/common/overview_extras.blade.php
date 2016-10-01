<h4>{!! lmcTrans('admin.fields.extra_columns') !!}</h4>

{{-- Extra Columns --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.extra_columns') !!}
    </label>
    <div class="col-sm-10">
        <table class="child-table table table-striped table-bordered table-advance table-hover">

            {{-- Table Head --}}
            <thead>
            <tr>
                <th>{!! lmcTrans('admin.fields.extra_name') !!}</th>
                <th>{!! lmcTrans('admin.fields.extra_type') !!}</th>
            </tr>
            </thead>
            {{-- /Table Head --}}

            {{-- Table Body --}}
            <tbody>
            @foreach($model->extras as $extra)
                <tr>
                    <td class="highlight"> <div class="warning"> </div> {{ $extra->name_uc_first }}</td>
                    <td> {!! lmcTrans("admin.fields.{$extra->type}") !!} </td>
                </tr>
            @endforeach
            </tbody>
            {{-- /Table Body --}}

        </table>
    </div>
</div>
{{-- /Extra Columns --}}

