{{-- Current Logo --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_logo') !!}
    </label>
    <div class="col-md-9">
        {!! Html::image( $design->logo_url, null, [
            'height'    => 60
        ] ) !!}
    </div>
</div>
{{-- /Current Logo --}}

{{-- Logo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.logo'),
    'input_name'    => 'logo[logo]',
    'input_class'   => "logo",
    'elfinder'      => true,
    'elfinder_id'   => "elfinder_logo",
    'multiple'      => false,
    'columns'       => true
])
{{-- /Logo --}}

{{-- Current Favicon --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_favicon') !!}
    </label>
    <div class="col-md-9">
        {!! Html::image( $design->big_favicon_url, null, [
            'height'    => 60
        ] ) !!}
    </div>
</div>
{{-- /Current Favicon --}}

{{-- Favicon --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.favicon'),
    'input_name'    => 'favicon[favicon]',
    'input_class'   => "favicon",
    'elfinder'      => true,
    'elfinder_id'   => "elfinder_favicon",
    'multiple'      => false,
    'columns'       => true
])
{{-- /Favicon --}}