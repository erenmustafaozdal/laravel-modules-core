{{-- Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.title') !!}</label>
    {!! Form::text( 'title', isset($menu) ? $menu->title : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-menu-module/admin.fields.menu.title')
    ]) !!}
</div>
{{-- /Title --}}