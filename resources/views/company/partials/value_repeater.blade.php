<div data-repeater-item class="mt-repeater-item margin-bottom-40">

    {{-- Value Title --}}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.value_title') !!}</label>
        {!! Form::text( 'value_title', isset($value) ? $value->title : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix value_title',
            'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.value_title')
        ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-company-module/admin.helpers.company.value_title') !!} </span>
    </div>
    {{-- /Value Title --}}

    {{-- Value --}}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-company-module/admin.fields.company.value') !!}</label>
        {!! Form::textarea( 'value', isset($value) ? $value->value : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix tinymce value',
            'placeholder'   => lmcTrans('laravel-company-module/admin.fields.company.value'),
            'rows'          => 5
        ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-company-module/admin.helpers.company.value') !!} </span>
    </div>
    {{-- /Value --}}

    {{-- Repeater Delete --}}
    <a href="javascript:;" data-repeater-delete class="btn red btn-outline mt-repeater-delete">
        <i class="fa fa-close"></i>  {!! lmcTrans('laravel-company-module/admin.fields.company.remove_value') !!}
    </a>
    {{-- /Repeater Delete --}}

</div>