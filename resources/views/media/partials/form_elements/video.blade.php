<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media.video') !!}</label>
    {!! Form::text( 'video', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-youtube',
        'placeholder'   => lmcTrans('laravel-media-module/admin.fields.media.video'),
        'id'            => 'video',
        'disabled'      => isset($isDisable) &&  $isDisable ? true : false
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.video') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.video') !!} </span>
@endif