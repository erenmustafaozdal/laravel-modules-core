{{-- Item Count --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_chance_item_count',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::number( "pages[{$page->id}][options][chance_item_count]", is_null($page->option) || empty($page->option->options_array) ? null : $page->option->options_array->chance_item_count, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_chance_item_count_holder')
        ]) !!}
    </div>
</div>
{{-- /Item Count --}}