<h4>{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.seo_title') !!}</h4>
{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'title', is_null($seo) ? null : $seo->title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.title'),
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.title') !!} </span>
    </div>
</div>
{{-- /Title --}}

{{-- Meta Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.meta_title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'meta_title', is_null($seo) ? null : $seo->meta_title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.meta_title'),
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.meta_title') !!} </span>
    </div>
</div>
{{-- /Meta Title --}}

{{-- Meta Description --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.meta_description') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'meta_description', is_null($seo) ? null : $seo->meta_description, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.meta_description'),
            'rows'          => 3,
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.meta_description') !!} </span>
    </div>
</div>
{{-- /Meta Description --}}

{{-- Meta Keywords --}}
<div class="form-group margin-bottom-25">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.meta_keywords') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'meta_keywords', is_null($seo) ? null : $seo->meta_keywords, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.meta_keywords'),
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.meta_keywords') !!} </span>
    </div>
</div>
{{-- /Meta Keywords --}}


<h4>{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.facebook_title') !!}</h4>
{{-- OG Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'og_title', is_null($seo) ? null : $seo->og_title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_title'),
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.og_title') !!} </span>
    </div>
</div>
{{-- /OG Title --}}

{{-- OG Description --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_description') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'og_description', is_null($seo) ? null : $seo->og_description, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_description'),
            'rows'          => 3,
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.og_description') !!} </span>
    </div>
</div>
{{-- /OG Description --}}

{{-- OG URL --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_url') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'og_url', is_null($seo) ? null : $seo->og_url, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_url'),
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.og_url') !!} </span>
    </div>
</div>
{{-- /OG URL --}}

{{-- OG Site Name --}}
<div class="form-group margin-bottom-25">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_site_name') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'og_site_name', is_null($seo) ? null : $seo->og_site_name, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.og_site_name'),
            'maxlength'     => 255
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.og_site_name') !!} </span>
    </div>
</div>
{{-- /OG Site Name --}}


<h4>{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.analytics_title') !!}</h4>
{{-- First Analytics --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.first_analytics') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'first_analytics', is_null($seo) ? null : $seo->first_analytics, [
            'class'         => 'code-editor',
        ]) !!}
    </div>
</div>
{{-- /First Analytics --}}

{{-- Second Analytics --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.second_analytics') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'second_analytics', is_null($seo) ? null : $seo->second_analytics, [
            'class'         => 'code-editor',
        ]) !!}
    </div>
</div>
{{-- /Second Analytics --}}

{{-- Third Analytics --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.third_analytics') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'third_analytics', is_null($seo) ? null : $seo->third_analytics, [
            'class'         => 'code-editor',
        ]) !!}
    </div>
</div>
{{-- /Third Analytics --}}

{{-- Tag Manager --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.tag_manager') !!}</label>
    <div class="col-md-9">
        {!! Form::textarea( 'tag_manager', is_null($seo) ? null : $seo->tag_manager, [
            'class'         => 'code-editor',
        ]) !!}
    </div>
</div>
{{-- /Tag Manager --}}