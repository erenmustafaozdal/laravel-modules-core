{{-- Category Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_brand_title',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( "pages[{$page->id}][options][brand_title]", is_null($page->option) && !isset($page->option->options_array->brand_title) ? null : $page->option->options_array->brand_title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_brand_title_holder')
        ]) !!}
    </div>
</div>
{{-- /Category Title --}}