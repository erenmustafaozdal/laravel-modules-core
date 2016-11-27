{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', [
        'id'    => $model->id,
        'form'  => $model->slug,
        'page'  => 'home'
    ]),
    'class' => 'form-horizontal form-bordered',
    'files' => true
]) !!}

{{-- Note --}}
<div class="note note-info">
    {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.image_banner') !!}
</div>
{{-- /Note --}}

<div class="form-body">

    {{-- Current Photo --}}
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('admin.fields.current_photo', [], 1) !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( is_null($model->imageOption) ? config('ezelnet-frontend-module.page_management.default_img_path') . '/creative_slider_bg.jpg' : $model->imageOption->getPhoto([], 'normal', true, 'page_management','section_id'), null, [
                'width'     => 400
            ] ) !!}
        </div>
    </div>
    {{-- /Current Photo --}}

    {{-- Photo --}}
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.background_photo'),
        'input_name'    => 'photo',
        'input_class'   => "photo_{$model->slug_or_copied_slug}",
        'elfinder'      => true,
        'elfinder_id'   => "elfinder_{$model->slug}",
        'multiple'      => false
    ])
    {{-- /Photo --}}

    @include('laravel-modules-core::page_management.showcase_form', [
        'auto_play_hidden'  => true,
        'auto_play'         => null,
        'is_revert_hidden'  => true,
        'is_revert'         => null,
        'order_type_hidden' => true,
        'order_type'        => 'random',
        'item_type_hidden'  => false,
        'item_type'         => null,
        'items_type_hidden' => false,
        'items_type'        => null,
        'options_hidden'    => false
    ])

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}