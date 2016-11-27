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
    {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.advertisement_banner') !!}
</div>
{{-- /Note --}}

<div class="form-body">

    {{-- Current Photo --}}
    @if(! is_null($model->imageOption))
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('admin.fields.current_photo', [], 1) !!}
        </label>
        <div class="col-md-9">
            {!! Html::image( $model->imageOption()->typeImage('big')->first()->getPhoto([], 'normal', true, 'page_management','section_id'), null, [
                'height'    => 150
            ] ) !!}
        </div>
    </div>
    @endif
    {{-- /Current Photo --}}

    {{-- Photo --}}
    {!! Form::hidden('big[photo_type]','big') !!}
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
            {!! Form::text( 'big[link]', ! is_null($model->imageOption()->typeImage('big')->first()) ? $model->imageOption()->typeImage('big')->first()->link : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link')
            ]) !!}
            <span class="help-block">
                {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.link') !!}
            </span>
        </div>
    </div>
    {{-- /Link --}}





    {{-- Current Photo --}}
    @if(! is_null($model->imageOption))
        <div class="form-group">
            <label class="col-md-3 control-label">
                {!! lmcTrans('admin.fields.current_photo', [], 1) !!}
            </label>
            <div class="col-md-9">
                {!! Html::image( $model->imageOption()->typeImage('small')->first()->getPhoto([], 'normal', true, 'page_management','section_id'), null, [
                    'height'    => 150
                ] ) !!}
            </div>
        </div>
    @endif
    {{-- /Current Photo --}}

    {{-- Photo --}}
    {!! Form::hidden('small[photo_type]','small') !!}
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
            {!! Form::text( 'small[link]', ! is_null($model->imageOption()->typeImage('small')->first()) ? $model->imageOption()->typeImage('small')->first()->link : null, [
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