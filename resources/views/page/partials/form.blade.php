{{-- Page Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2" name="category_id" style="width: 100%">
        @if( ! isset($select2) )
            <option value="">{!! trans('laravel-modules-core::admin.ops.select') !!}</option>
            @foreach(\App\PageCategory::all('id','name') as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        @else
            <option value="{{ $page->category->id }}" selected>{{ $page->category->name }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-page-module/admin.helpers.page.category_id_help') !!} </span>
@endif
{{-- /Page Category --}}

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.title') !!}</label>
    {!! Form::text( 'title', isset($page) ? $page->title : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.title')
    ]) !!}
</div>
{{-- /Name --}}

{{-- Slug --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.slug') !!}</label>
    {!! Form::text( 'slug', isset($page) ? $page->slug : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.slug')
    ]) !!}

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block">
            {!! lmcTrans('laravel-page-module/admin.helpers.page.slug') !!}
        </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block">
        {!! lmcTrans('laravel-page-module/admin.helpers.page.slug') !!}
    </span>
@endif
{{-- /Slug --}}

{{-- Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-page-module/admin.fields.page.description') !!}</label>
    {!! Form::textarea( 'description', isset($page) ? $page->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-page-module/admin.fields.page.description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}
</div>
{{-- /Description --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    {!! Form::checkbox( 'is_publish', 1, isset($page) ? $page->is_publish : null, [
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