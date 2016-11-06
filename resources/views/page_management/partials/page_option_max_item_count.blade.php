{{-- Item Count --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_item_count',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::select( "pages[{$page->id}][options][max_item_count]", [
            4       => 4,
            'all'   => lmcTrans('admin.ops.all')
        ], is_null($page->option) || empty($page->option->options_array) ? 4 : $page->option->options_array->max_item_count, [
            'class'         => 'form-control input-small'
        ]) !!}
    </div>
</div>
{{-- /Item Count --}}