{{-- Content --}}
@if($isForm)
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.content') !!}</label>
        {!! Form::textarea( 'content', isset($page) ? $page->content : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
            'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.content'),
            'rows'          => 5
        ]) !!}
    </div>
@else
    @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('api.page.update'))
        <div class="note note-info">{!! lmcTrans('laravel-page-module/admin.helpers.page.inline_edit_help') !!}</div>
    @endif
    <div class="tinymce">{!! $page->content or null !!}</div>
@endif
{{-- /Content --}}