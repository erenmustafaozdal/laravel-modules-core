{{-- Site First Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_first_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'site_first_color', ! $design->site_first_color ? null : $design->site_first_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_first_color')
        ]) !!}
    </div>
</div>
{{-- /Site First Color --}}

{{-- Site Second Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_second_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'site_second_color', ! $design->site_second_color ? null : $design->site_second_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_second_color')
        ]) !!}
    </div>
</div>
{{-- /Site Second Color --}}

{{-- Site Complement Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_complement_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'site_complement_color', ! $design->site_complement_color ? null : $design->site_complement_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_complement_color')
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.site_complement_color') !!} </span>
    </div>
</div>
{{-- /Site Complement Color --}}

{{-- Hover Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.hover_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'hover_color', ! $design->hover_color ? null : $design->hover_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.hover_color')
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.hover_color') !!} </span>
    </div>
</div>
{{-- /Hover Color --}}