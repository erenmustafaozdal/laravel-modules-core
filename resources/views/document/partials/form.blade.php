{{-- Document Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2" name="category_id" style="width: 100%">
        @if($isRelation && isset($document))
            <option value="{{ $document->category->id }}" selected>{{ $document->category->name }}</option>
        @elseif(isset($document))
            <option value="{{ $document_category->id }}" selected>{{ $document_category->name }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document.category_id_help') !!} </span>
@endif
{{-- /Document Category --}}

{{-- Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document.title') !!}</label>
    {!! Form::text( 'title', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-document-module/admin.fields.document.title')
    ]) !!}
</div>
{{-- /Title --}}

{{-- Document --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('laravel-document-module/admin.fields.document.document'),
    'input_name'    => 'document',
    'input_id'      => 'document',
    'jcrop'         => false,
    'ratio'         => false,
    'elfinder_id'   => 'elfinder-document'
])
{{-- /Document --}}

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
        <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document.is_publish_help') !!} </span>
@endif
{{-- /Status --}}