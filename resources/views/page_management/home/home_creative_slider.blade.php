{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', ['id' => $model->id]),
    'class' => 'form-horizontal form-bordered'
]) !!}

{{-- Note --}}
<div class="note note-info">
    {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.image_banner') !!}
</div>
{{-- /Note --}}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">

    {{-- Current Photo --}}
    <div class="form-group">
        <label class="control-label">
            {!! lmcTrans('admin.fields.current_photo', [], 1) !!}
        </label>
        <div>
            {!! Html::image( is_null($model->imageOption) ? config('ezelnet-frontend-module.page_management.default_img_path') . '/creative_slider_bg.jpg' : $model->imageOption->getPhoto([], 'normal', false, 'section','section_id'), null, [
                'width'     => 400
            ] ) !!}
        </div>
    </div>
    {{-- /Current Photo --}}

    {{-- Photo --}}
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.background_photo'),
        'input_name'    => 'photo',
        'input_class'   => "photo_{$model->slug}",
        'elfinder'      => true,
        'elfinder_id'   => "elfinder_{$model->slug}",
        'multiple'      => false
    ])
    {{-- /Photo --}}

    @include('laravel-modules-core::page_management.items_type', [
        'item_type_hidden'  => false,
        'item_type'         => null,
        'items_type_hidden' => false,
        'items_type'        => null,
    ])

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}