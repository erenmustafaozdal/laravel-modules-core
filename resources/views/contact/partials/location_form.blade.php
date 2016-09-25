{{-- Helpers --}}
<div class="note note-info">{!! lmcTrans('laravel-contact-module/admin.helpers.contact.location') !!}</div>
{{-- /Helpers --}}

{{-- Map Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.map_title') !!}</label>
    {!! Form::text( 'map_title', isset($contact) ? $contact->map_title : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.map_title')
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-contact-module/admin.helpers.contact.map_title') !!} </span>
</div>
{{-- /Map Title --}}

{{-- Map Search --}}
<div class="form-group margin-top-40">
    <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.search_location') !!}</label>
    <select id="search_location" class="form-control form-control-solid placeholder-no-fix" style="width: 100%"></select>
    <span class="help-block"> {!! lmcTrans('laravel-contact-module/admin.helpers.contact.search_location') !!} </span>
</div>
{{-- /Map Search --}}

{{-- Map --}}
<div class="form-group">
    <div id="map"></div>
    {!! Form::hidden('latitude') !!}
    {!! Form::hidden('longitude') !!}
    {!! Form::hidden('zoom') !!}
</div>
{{-- /Map --}}