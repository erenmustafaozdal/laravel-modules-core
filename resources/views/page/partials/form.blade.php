{{-- Page Category --}}
@if($isRelation)
    {!! Form::hidden('category_id', $page_category->id) !!}
@else
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!}</label>
        <select class="form-control form-control-solid placeholder-no-fix select2me" name="category_id" style="width: 100%">
            @if(isset($page))
                <option value="{{ $page->category->id }}" selected>{{ $page->category->name_uc_first }}</option>
            @endif
        </select>

        @if ( ! isset($helpBlockAfter) )
            <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.category_id_help') !!} </span>
        @endif

    </div>
    @if ( isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.category_id_help') !!} </span>
    @endif
@endif
{{-- /Page Category --}}

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.title') !!}</label>
    {!! Form::text( 'title', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.title')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.is_publish_help') !!} </span>
@endif
{{-- /Status --}}