{{-- Item Count --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_direction',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::select( "pages[{$page->id}][options][direction]", config('ezelnet-frontend-module.page_direction'), is_null($page->option) || empty($page->option->options_array) ? null : $page->option->options_array->direction, [
            'class'         => 'form-control input-small'
        ]) !!}
    </div>
</div>
{{-- /Item Count --}}