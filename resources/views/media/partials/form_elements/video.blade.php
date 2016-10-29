<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media.video') !!}</label>
    <input type="text"
           class="form-control form-control-solid placeholder-no-fix"
           placeholder="{!! lmcTrans('laravel-media-module/admin.fields.media.video') !!}"
           id="video"
           name="video"
           {!! isset($isDisable) &&  $isDisable ? 'disabled' : '' !!}
    >
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.video') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.video') !!} </span>
@endif