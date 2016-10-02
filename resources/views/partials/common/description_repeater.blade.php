<div data-repeater-item class="mt-repeater-item margin-bottom-40">

    {{-- Value Title --}}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('admin.fields.title') !!}</label>
        {!! Form::text( 'description_title', isset($description) ? $description->title : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('admin.fields.title')
        ]) !!}
    </div>
    {{-- /Value Title --}}

    {{-- Value --}}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('admin.fields.description') !!}</label>
        {!! Form::textarea( 'description_description', isset($description) ? $description->description : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
            'placeholder'   => lmcTrans('admin.fields.description'),
            'rows'          => 5
        ]) !!}
    </div>
    {{-- /Value --}}

    {{-- Status --}}
    <div class="form-group">
        <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
        <select class="form-control form-control-solid placeholder-no-fix" name="description_is_publish">
            <option value="1" {{ (isset($description) && $description->is_publish) || ! isset($description) ? 'selected' : '' }}> {!! lmcTrans('admin.ops.publish') !!} </option>
            <option value="0" {{ isset($description) && ! $description->is_publish ? 'selected' : '' }}> {!! lmcTrans('admin.ops.not_publish') !!} </option>
        </select>
        <span class="help-block"> {!! lmcTrans('admin.helpers.is_publish') !!} </span>
    </div>
    {{-- /Status --}}

    {{-- Repeater Delete --}}
    <a href="javascript:;" data-repeater-delete class="btn red btn-outline mt-repeater-delete">
        <i class="fa fa-close"></i>  {!! lmcTrans('admin.fields.remove_value') !!}
    </a>
    {{-- /Repeater Delete --}}

</div>