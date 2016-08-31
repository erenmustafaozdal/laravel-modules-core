{{-- Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2" multiple name="category_id[]" style="width: 100%">
        @if(isset($media))
            @foreach($media->categories as $category)
                <option value="{{ $category->id }}" selected>{{ $category->name_uc_first }}</option>
            @endforeach
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.category_id_help') !!} </span>
@endif
{{-- /Category --}}

{{-- Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media.title') !!}</label>
    {!! Form::text( 'title', isset($media) ? $media->title_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-media-module/admin.fields.media.title')
    ]) !!}
</div>
{{-- /Title --}}

{{-- Description --}}
<div class="form-group" id="description_wrapper">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media.description') !!}</label>
    {!! Form::textarea( 'description', isset($media) && ! is_null($media->description) ? $media->description->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-media-module/admin.fields.media.description'),
        'rows'          => 3,
        'maxlength'     => 255,
        'id'            => 'description'
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.description') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.description') !!} </span>
@endif
{{-- /Description --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($media) ? $media->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media.is_publish_help') !!} </span>
@endif
{{-- /Status --}}