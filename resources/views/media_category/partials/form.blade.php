@if($parent)
{{-- Parent Category --}}
{!! Form::hidden('parent', $parent->id) !!}
{{-- /Parent Category --}}
@endif

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-media-module/admin.fields.media_category.name')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Type --}}
@if($parent || isset($media_category) || $medias->count() > 0)
    {!! Form::hidden('type', $parent
    ? $parent->type
    : (
        isset($media_category) ? $media_category->type
        : (
            $medias->groupBy('type')->count() > 1 ? 'mixed' : $medias->groupBy('type')->keys()->all()[0]
        ))
    ) !!}
@else
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media_category.type') !!}</label>
        <select class="form-control form-control-solid placeholder-no-fix select2me" name="type" style="width: 100%">
            <option value="">{!! lmcTrans('admin.ops.select') !!}</option>
            @foreach(config('laravel-media-module.media_types') as $type)
                <option value="{!! $type !!}">{!! lmcTrans('laravel-media-module/admin.fields.media_category.' . $type) !!}</option>
            @endforeach
        </select>
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media_category.type') !!} </span>
    </div>
@endif
{{-- /Type --}}