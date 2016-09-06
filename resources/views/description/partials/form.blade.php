{{-- Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2me" name="category_id" style="width: 100%">
        @if($isRelation && isset($description))
            <option value="{{ $description->category->id }}" selected>{{ $description->category->name_uc_first }}</option>
        @elseif($isRelation)
            <option value="{{ $description_category->id }}" selected>{{ $description_category->name_uc_first }}</option>
        @elseif(isset($description))
            <option value="{{ $description->category->id }}" selected>{{ $description->category->name_uc_first }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description.category_id_help') !!} </span>
@endif
{{-- /Category --}}

{{-- Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description.title') !!}</label>
    {!! Form::text( 'title', isset($description) ? $description->title_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-description-module/admin.fields.description.title')
    ]) !!}
</div>
{{-- /Title --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($description) ? $description->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description.is_publish_help') !!} </span>
@endif
{{-- /Status --}}