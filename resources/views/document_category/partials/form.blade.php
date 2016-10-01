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


@if($parent && $parent->config_propagation)
    {{-- Category Configs --}}
    {!! Form::hidden('has_description', $parent->has_description) !!}
    {!! Form::hidden('has_photo', $parent->has_photo) !!}
    {!! Form::hidden('show_title', $parent->show_title) !!}
    {!! Form::hidden('show_description', $parent->show_description) !!}
    {!! Form::hidden('show_photo', $parent->show_photo) !!}
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
                    {!! Form::checkbox( 'has_description', 1, isset($document_category) ? $document_category->has_description : null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-check"></i>',
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
                    {!! Form::checkbox( 'has_photo', 1, isset($document_category) ? $document_category->has_photo : null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-check"></i>',
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
                    {!! Form::checkbox( 'show_title', 1, isset($document_category) ? $document_category->show_title : null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-check"></i>',
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
                    {!! Form::checkbox( 'show_description', 1, isset($document_category) ? $document_category->show_description : null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-check"></i>',
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Show Description --}}

        {{-- Show Photo --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-document-module/admin.fields.document_category.show_photo') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-document-module/admin.helpers.document_category.show_photo') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_photo', 0) !!}
                    {!! Form::checkbox( 'show_photo', 1, isset($document_category) ? $document_category->show_photo : null, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-check"></i>',
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Show Photo --}}
    </ul>
@endif

{{-- Data Table Configs --}}
@include('laravel-modules-core::partials.form.datatable_config_form', [
    'model'     => isset($document_category) ? $document_category : null,
    'parent'    => isset($parent_document_category) ? $parent_document_category : false
])
{{-- /Data Table Configs --}}

{{-- Other Configs --}}
@include('laravel-modules-core::partials.form.other_config_form', [
    'model'     => isset($document_category) ? $document_category : null,
    'parent'    => isset($parent_document_category) ? $parent_document_category : false
])
{{-- /Other Configs --}}