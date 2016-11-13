{{-- First Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'first_color', !is_null($main) ? $main->first_color : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_color')
        ]) !!}
    </div>
</div>
{{-- /First Color --}}