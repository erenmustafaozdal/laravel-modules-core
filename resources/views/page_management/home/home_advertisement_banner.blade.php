{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', ['id' => $model->id]),
    'class' => 'form-horizontal form-bordered'
]) !!}

{{-- Note --}}
<div class="note note-info">
    {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.advertisement_banner') !!}
</div>
{{-- /Note --}}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">

    {{-- Photo --}}
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.ad_big_image'),
        'input_name'    => 'big[photo]',
        'input_class'   => "photo_home_advertisement_banner_big",
        'elfinder'      => true,
        'elfinder_id'   => "elfinder_{$model->slug}_big",
        'multiple'      => false,
        'tab_href'      => "{$model->slug}-big"
    ])
    {{-- /Photo --}}

    {{-- Link --}}
    <div class="form-group margin-bottom-40">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link') !!}
        </label>
        <div class="col-md-9">
            {!! Form::text( 'big[link]', ! is_null($model->imageOption) ? $model->imageOption->link : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link')
            ]) !!}
            <span class="help-block">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.link') !!}
            </span>
        </div>
    </div>
    {{-- /Link --}}

    {{-- Photo --}}
    @include('laravel-modules-core::partials.form.fileinput_form', [
        'label'         => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.ad_small_image'),
        'input_name'    => 'small[photo]',
        'input_class'   => "photo_home_advertisement_banner_small",
        'elfinder'      => true,
        'elfinder_id'   => "elfinder_{$model->slug}_small",
        'multiple'      => false,
        'tab_href'      => "{$model->slug}-small"
    ])
    {{-- /Photo --}}

    {{-- Link --}}
    <div class="form-group margin-bottom-40">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link') !!}
        </label>
        <div class="col-md-9">
            {!! Form::text( 'small[link]', ! is_null($model->imageOption) ? $model->imageOptions->link : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link')
            ]) !!}
            <span class="help-block">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.link') !!}
            </span>
        </div>
    </div>
    {{-- /Link --}}

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}