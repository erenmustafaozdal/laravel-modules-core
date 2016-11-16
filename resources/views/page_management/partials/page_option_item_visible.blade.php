{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_item_visible',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        <div class="icheck-inline">
            <label>
                <input type="checkbox"
                       name="pages[{{ $page->id }}][options][item_visible][]"
                       value="name"
                       class="icheck"
                       data-checkbox="icheckbox_line-grey"
                       data-label="{!! lmcTrans('laravel-product-module/admin.fields.product.name') !!}"
                       {{ is_null($page->option) || !isset($page->option->options_array->item_visible) || !in_array('name',$page->option->options_array->item_visible) ? '' : 'checked' }}
                >
            </label>
            <label>
                <input type="checkbox"
                       name="pages[{{ $page->id }}][options][item_visible][]"
                       value="code"
                       class="icheck"
                       data-checkbox="icheckbox_line-grey"
                       data-label="{!! lmcTrans('laravel-product-module/admin.fields.product.code') !!}"
                        {{ is_null($page->option) || !isset($page->option->options_array->item_visible) || !in_array('code',$page->option->options_array->item_visible) ? '' : 'checked' }}
                >
            </label>
            <label>
                <input type="checkbox"
                       name="pages[{{ $page->id }}][options][item_visible][]"
                       value="amount"
                       class="icheck"
                       data-checkbox="icheckbox_line-grey"
                       data-label="{!! lmcTrans('laravel-product-module/admin.fields.product.amount') !!}"
                        {{ is_null($page->option) || !isset($page->option->options_array->item_visible) || !in_array('amount',$page->option->options_array->item_visible) ? '' : 'checked' }}
                >
            </label>
        </div>
    </div>
</div>
{{-- /Title --}}