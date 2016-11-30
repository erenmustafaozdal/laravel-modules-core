{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'title', isset($model) ? $model->title : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.title'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Title --}}

{{-- Description --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'description', isset($model) ? $model->description : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.description'),
            'rows'          => 3,
            'maxlength'     => 600
        ]) !!}
    </div>
</div>
{{-- /Description --}}

{{-- Link --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.link') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'link', isset($model) ? $model->link : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.link'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Link --}}

{{-- Button Text --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.button_text') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'button_text', isset($model) ? $model->button_text : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.design_management.button_text'),
            'maxlength'     => 255
        ]) !!}
    </div>
</div>
{{-- /Button Text --}}