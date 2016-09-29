@if($parent)
{{-- Parent Category --}}
{!! Form::hidden('parent', $parent->id) !!}
{{-- /Parent Category --}}
@endif

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-document-module/admin.fields.document_category.name')
    ]) !!}
</div>
{{-- /Name --}}


@if($parent || isset($document_category))
    {!! Form::hidden('has_description', $parent ? $parent->has_description : $document_category->has_description) !!}
    {!! Form::hidden('has_photo', $parent ? $parent->has_photo : $document_category->has_photo) !!}
    {!! Form::hidden('show_title', $parent ? $parent->show_title : $document_category->show_title) !!}
    {!! Form::hidden('show_description', $parent ? $parent->show_description : $document_category->show_description) !!}
    {!! Form::hidden('show_photo', $parent ? $parent->show_photo : $document_category->show_photo) !!}
@else
    <ul class="list-group margin-top-40">

        {{-- Title --}}
        <li class="list-group-item bg-default bg-font-default">
            <h4>{!! lmcTrans('laravel-document-module/admin.fields.document_category.documents_setting') !!}</h4>
        </li>
        {{-- /Title --}}

        {{-- Has Description --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.has_description') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.has_description') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('has_description', 0) !!}
                    {!! Form::checkbox( 'has_description', 1, null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
                        'data-on-color' => 'success',
                        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Has Description --}}

        {{-- Has Photo --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.has_photo') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.has_photo') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('has_photo', 0) !!}
                    {!! Form::checkbox( 'has_description', 1, null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
                        'data-on-color' => 'success',
                        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Has Photo --}}

        {{-- Show Title --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_title') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_title') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_title', 0) !!}
                    {!! Form::checkbox( 'has_description', 1, null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
                        'data-on-color' => 'success',
                        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Show Title --}}

        {{-- Show Description --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_description') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_description') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_description', 0) !!}
                    {!! Form::checkbox( 'has_description', 1, null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
                        'data-on-color' => 'success',
                        'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Show Description --}}
    </ul>

    {{-- Show Photo --}}
    <div class="form-group last">
        <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_photo') !!}</label>
        <div class="clearfix"></div>
        {!! Form::hidden('show_photo', 0) !!}
        {!! Form::checkbox( 'show_photo', 1, null, [
            'class'         => 'make-switch',
            'data-on-text'  => trans('laravel-modules-core::admin.ops.yes'),
            'data-on-color' => 'success',
            'data-off-text' => trans('laravel-modules-core::admin.ops.no'),
            'data-off-color'=> 'danger',
        ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_photo') !!} </span>
    </div>
    {{-- /Has Photo --}}
    
    {{-- Data Table Configs --}}
    @include('laravel-modules-core::partials.form.datatable_config_form', [
        'model'     => isset($document_category) ? $document_category : null
    ])
    {{-- /Data Table Configs --}}
@endif