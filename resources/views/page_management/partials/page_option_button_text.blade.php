{{-- Button Text --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_button_text',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( "pages[{$page->id}][options][button_text]", is_null($page->option) ? null : $page->option->options_array->button_text, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_button_text',[
                'menu_page'     => $page->title_uc_first
            ])
        ]) !!}
    </div>
</div>
{{-- /Button Text --}}