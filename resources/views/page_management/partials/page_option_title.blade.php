{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_title',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( "pages[{$page->id}][title]", is_null($page->option) ? null : $page->option->title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_title',[
                'menu_page'     => $page->title_uc_first
            ])
        ]) !!}
    </div>
</div>
{{-- /Title --}}