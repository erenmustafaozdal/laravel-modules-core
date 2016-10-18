@if($parent)
{{-- Parent Category --}}
{!! Form::hidden('parent', $parent->id) !!}
{{-- /Parent Category --}}
@endif

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.name') !!}</label>
    {!! Form::text( 'name', null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-description-module/admin.fields.description_category.name')
    ]) !!}
</div>
{{-- /Name --}}


@if($parent && $parent->config_propagation)
    {{-- Category Configs --}}
    {!! Form::hidden('has_description', $parent->has_description) !!}
    {!! Form::hidden('has_photo', $parent->has_photo) !!}
    {!! Form::hidden('has_link', $parent->has_link) !!}
    {!! Form::hidden('show_title', $parent->show_title) !!}
    {!! Form::hidden('show_description', $parent->show_description) !!}
    {!! Form::hidden('show_photo', $parent->show_photo) !!}
    {!! Form::hidden('show_link', $parent->show_link) !!}
    {!! Form::hidden('is_multiple_photo', $parent->is_multiple_photo) !!}
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
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.has_description') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.has_description') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('has_description', 0) !!}
                    {!! Form::checkbox( 'has_description', 1, isset($description_category) ? $description_category->has_description : null, [
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

        {{-- Has Photo --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.has_photo') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.has_photo') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('has_photo', 0) !!}
                    {!! Form::checkbox( 'has_photo', 1, isset($description_category) ? $description_category->has_photo : null, [
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
        {{-- /Has Photo --}}

        {{-- Has Link --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.has_link') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.has_link') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('has_link', 0) !!}
                    {!! Form::checkbox( 'has_link', 1, isset($description_category) ? $description_category->has_link : null, [
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
        {{-- /Has Link --}}

        {{-- Show Title --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_title') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_title') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_title', 0) !!}
                    {!! Form::checkbox( 'show_title', 1, isset($description_category) ? $description_category->show_title : null, [
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
        {{-- /Show Title --}}

        {{-- Show Description --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_description') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_description') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_description', 0) !!}
                    {!! Form::checkbox( 'show_description', 1, isset($description_category) ? $description_category->show_description : null, [
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
        {{-- /Show Description --}}

        {{-- Show Photo --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_photo') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_photo') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_photo', 0) !!}
                    {!! Form::checkbox( 'show_photo', 1, isset($description_category) ? $description_category->show_photo : null, [
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
        {{-- /Show Photo --}}

        {{-- Show Link --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.show_link') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.show_link') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('show_link', 0) !!}
                    {!! Form::checkbox( 'show_link', 1, isset($description_category) ? $description_category->show_link : null, [
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
        {{-- /Show Link --}}

        {{-- Is Multiple Photo --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('laravel-description-module/admin.fields.description_category.is_multiple_photo') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('laravel-description-module/admin.helpers.description_category.is_multiple_photo') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('is_multiple_photo', 0) !!}
                    {!! Form::checkbox( 'is_multiple_photo', 1, isset($description_category) ? $description_category->is_multiple_photo : null, [
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
        {{-- /Is Multiple Photo --}}

    </ul>
@endif

{{-- Data Table Configs --}}
@include('laravel-modules-core::partials.form.datatable_config_form', [
    'model'     => isset($description_category) ? $description_category : null,
    'parent'    => isset($parent_description_category) ? $parent_description_category : false
])
{{-- /Data Table Configs --}}

{{-- Other Configs --}}
@include('laravel-modules-core::partials.form.other_config_form', [
    'model'     => isset($description_category) ? $description_category : null,
    'parent'    => isset($parent_description_category) ? $parent_description_category : false
])
{{-- /Other Configs --}}