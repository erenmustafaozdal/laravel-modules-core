{{-- Item Count --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_gallery_type',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::select( "pages[{$page->id}][options][gallery_type]", ['' => lmcTrans('admin.ops.select')] + config('laravel-media-module.gallery_types'), is_null($page->option) || empty($page->option->options_array) ? null : $page->option->options_array->gallery_type, [
            'class'         => 'form-control input-small'
        ]) !!}
        <span class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.gallery_type') !!} </span>
    </div>
</div>
{{-- /Item Count --}}