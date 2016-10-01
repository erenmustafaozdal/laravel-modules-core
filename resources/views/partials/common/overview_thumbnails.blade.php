<h4>{!! lmcTrans('admin.fields.photo_configs') !!}</h4>

{{-- Photo Width --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.aspect_ration_width') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static"> {!! $model->photo_width_px !!} </p>
    </div>
</div>
{{-- /Photo Width --}}

{{-- Photo Height --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.aspect_ration_height') !!}
    </label>
    <div class="col-sm-10">
        <p class="form-control-static"> {!! $model->photo_height_px !!} </p>
    </div>
</div>
{{-- /Photo Height --}}

{{-- Thumbnails --}}
<div class="form-group">
    <label class="col-sm-2 control-label">
        {!! lmcTrans('admin.fields.thumbnails') !!}
    </label>
    <div class="col-sm-10">
        <table class="child-table table table-striped table-bordered table-advance table-hover">

            {{-- Table Head --}}
            <thead>
            <tr>
                <th>{!! lmcTrans('admin.fields.thumbnail_slug') !!}</th>
                <th>{!! lmcTrans('admin.fields.thumbnail_width') !!}</th>
                <th>{!! lmcTrans('admin.fields.thumbnail_height') !!}</th>
            </tr>
            </thead>
            {{-- /Table Head --}}

            {{-- Table Body --}}
            <tbody>
            @foreach($model->thumbnails as $thumbnail)
                <tr>
                    <td class="highlight"> <div class="warning"> </div> {{ $thumbnail->slug }}</td>
                    <td> {!! $thumbnail->photo_width_px !!}</td>
                    <td> {!! $thumbnail->photo_height_px !!}</td>
                </tr>
            @endforeach
            </tbody>
            {{-- /Table Body --}}

        </table>
    </div>
</div>
{{-- /Thumbnails --}}

