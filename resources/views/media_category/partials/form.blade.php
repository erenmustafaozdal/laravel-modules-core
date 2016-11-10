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
@if(($parent && $parent->config_propagation) || isset($media_category) || $medias->count() > 0)
    {!! Form::hidden('type', $parent && $parent->config_propagation
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

{{-- Gallery Type --}}
@if(
    (isset($media_category) && $media_category->type === 'video')
    || ($parent && $parent->type === 'video')
)
    {!! Form::hidden('gallery_type','classical') !!}
@else
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media_category.gallery_type') !!}</label>
        <select class="form-control form-control-solid placeholder-no-fix select2me" name="gallery_type" style="width: 100%">
            <option value="">{!! lmcTrans('admin.ops.select') !!}</option>
            @foreach(config('laravel-media-module.gallery_types') as $key => $type)
                <option value="{!! $key !!}" {{ isset($media_category) && $media_category->gallery_type === $key ? 'selected' : ''}}>{!! $type !!}</option>
            @endforeach
        </select>
        <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media_category.gallery_type') !!} </span>
    </div>
@endif
{{-- /Gallery Type --}}

{{-- Configs --}}
@if(($parent && $parent->config_propagation))
    {{-- Category Configs --}}
    {!! Form::hidden('has_description', $parent->has_description) !!}
    {{-- /Category Configs --}}
@else
    <ul class="list-group margin-top-40">

        {{-- Title --}}
        <li class="list-group-item bg-default bg-font-default">
            <h4>{!! lmcTrans('admin.fields.category_configs') !!}</h4>
        </li>
        {{-- /Title --}}

        {{-- Has Description --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-media-module/admin.fields.media_category.has_description') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-media-module/admin.helpers.media_category.has_description') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('has_description', 0) !!}
                    {!! Form::checkbox( 'has_description', 1, isset($media_category) ? $media_category->has_description : null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-times"></i>',
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Has Description --}}

    </ul>
@endif
{{-- /Configs --}}

{{-- Data Table Configs --}}
@include('laravel-modules-core::partials.form.datatable_config_form', [
    'model'     => isset($media_category) ? $media_category : null,
    'parent'    => isset($parent_media_category) ? $parent_media_category : false
])
{{-- /Data Table Configs --}}

{{-- Other Configs --}}
@include('laravel-modules-core::partials.form.other_config_form', [
    'model'     => isset($media_category) ? $media_category : null,
    'parent'    => isset($parent_media_category) ? $parent_media_category : false
])
{{-- /Other Configs --}}