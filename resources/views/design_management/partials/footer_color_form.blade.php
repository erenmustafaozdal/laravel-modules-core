{{-- First Footer Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_footer_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'first_footer_color', ! $design->first_footer_color ? null : $design->first_footer_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_footer_color')
        ]) !!}
    </div>
</div>
{{-- /First Footer Color --}}

{{-- Second Footer Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_footer_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'second_footer_color', ! $design->second_footer_color ? null : $design->second_footer_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_footer_color')
        ]) !!}
    </div>
</div>
{{-- /Second Footer Color --}}

{{-- Footer Title Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.footer_title_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'footer_title_color', ! $design->footer_title_color ? null : $design->footer_title_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.footer_title_color')
        ]) !!}
    </div>
</div>
{{-- /Footer Title Color --}}

{{-- Footer Text Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.footer_text_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'footer_text_color', ! $design->footer_text_color ? null : $design->footer_text_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.footer_text_color')
        ]) !!}
    </div>
</div>
{{-- /Footer Text Color --}}

{{-- Ezelnet Link Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.ezelnet_link_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'ezelnet_link_color', ! $design->ezelnet_link_color ? null : $design->ezelnet_link_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.ezelnet_link_color')
        ]) !!}
    </div>
</div>
{{-- /Ezelnet Link Color --}}

{{-- Go Up Color --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.go_up_color') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'go_up_color', ! $design->go_up_color ? null : $design->go_up_color, [
            'class'         => 'form-control form-control-solid placeholder-no-fix color-picker',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.go_up_color')
        ]) !!}
    </div>
</div>
{{-- /Go Up Color --}}