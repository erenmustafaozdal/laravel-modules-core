{{-- Item Count --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_item_count',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::select( "pages[{$page->id}][options][item_count]", $counts, is_null($page->option) || empty($page->option->options_array) ? array_keys($counts)[0] : $page->option->options_array->item_count, [
            'class'         => 'form-control input-xsmall'
        ]) !!}
    </div>
</div>
{{-- /Item Count --}}