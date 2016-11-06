{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_form_is_active',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        {!! Form::checkbox( "pages[{$page->id}][options][form_is_active]", 1, !is_null($page->option) && !empty($page->option->options_array) && $page->option->options_array->form_is_active, [
            'class'         => 'make-switch',
            'data-on-text'  => '<i class="fa fa-check"></i>',
            'data-on-color' => 'success',
            'data-off-text' => '<i class="fa fa-times"></i>',
            'data-off-color'=> 'danger',
        ]) !!}
    </div>
</div>
{{-- /Title --}}