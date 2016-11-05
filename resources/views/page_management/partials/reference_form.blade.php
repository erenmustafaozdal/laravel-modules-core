{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_title') !!}</label>
    <div class="col-md-9">
        {!! Form::text( 'title', is_null($page->sections->first()) ? null : $page->sections->first()->title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_title')
        ]) !!}
    </div>
</div>
{{-- /Title --}}