{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.name') !!}</label>
    {!! Form::text( 'name', isset($contact) ? $contact->name_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.name')
    ]) !!}
</div>
{{-- /Name --}}

@include('laravel-modules-core::partials.form.address', [
    'model'     => isset($contact) ? $contact : null,
    'model_slug'=> 'contact'
])

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($contact) ? $contact->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-contact-module/admin.helpers.contact.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-contact-module/admin.helpers.contact.is_publish_help') !!} </span>
@endif
{{-- /Status --}}