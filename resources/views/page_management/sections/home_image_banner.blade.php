@include('laravel-modules-core::partials.common.current_photos', [
    'model'             => $model,
    'relation'          => 'imageOptions',
    'relationType'      => 'hasMany',
    'modelSlug'         => 'page_management',   // for ModelDataTrait->getPhoto() function
    'parentRelation'    => 'section_id', // for ModelDataTrait->getPhoto() function
    'inPanel'           => false,
    'buttons' => [
        'link' => [
            'href'      => 'link',
            'color'     => 'purple',
            'title'     => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link'),
            'icon'      => 'fa fa-link'
        ]
    ]
])

<div class="clearfix"></div>
<hr>

{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', [
        'id'    => $model->id,
        'form'  => $model->slug
    ]),
    'class' => 'form-horizontal form-bordered',
    'files' => true
]) !!}

<div class="form-body">

    <div class="{{--mt-repeater--}} margin-bottom-40">


        {{-- Photo --}}
        @include('laravel-modules-core::partials.form.fileinput_form', [
            'label'         => lmcTrans('admin.fields.photo', [], 1),
            'input_name'    => 'first[photo]',
            'input_class'   => "photo_home_image_banner_first",
            'elfinder'      => true,
            'elfinder_id'   => "elfinder_{$model->slug}-first",
            'multiple'      => false,
            'tab_href'      => "{$model->slug}-first",
            'elfinderDisable'=> true
        ])
        {{-- /Photo --}}

        {{-- Link --}}
        <div class="form-group">
            <label class="col-md-3 control-label">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link') !!}
            </label>
            <div class="col-md-9">
                {!! Form::text( 'first[link]', isset($image) ? $image->link : null, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                    'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link'),
                    'data-rule-link'=> 'true',
                    'data-msg-link' => LMCValidation::getMessage('link','url')
                ]) !!}
                <span class="help-block">
                    {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.link') !!}
                </span>
            </div>
        </div>
        {{-- /Link --}}

        <hr>

        {{-- Photo --}}
        @include('laravel-modules-core::partials.form.fileinput_form', [
            'label'         => lmcTrans('admin.fields.photo', [], 1),
            'input_name'    => 'second[photo]',
            'input_class'   => "photo_home_image_banner_second",
            'elfinder'      => true,
            'elfinder_id'   => "elfinder_{$model->slug}-second",
            'multiple'      => false,
            'tab_href'      => "{$model->slug}-second",
            'elfinderDisable'=> true
        ])
        {{-- /Photo --}}

        {{-- Link --}}
        <div class="form-group">
            <label class="col-md-3 control-label">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link') !!}
            </label>
            <div class="col-md-9">
                {!! Form::text( 'second[link]', isset($image) ? $image->link : null, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                    'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link'),
                    'data-rule-link'=> 'true',
                    'data-msg-link' => LMCValidation::getMessage('link','url')
                ]) !!}
                <span class="help-block">
                    {!! lmcTrans('ezelnet-frontend-module/admin.helpers.page_management.link') !!}
                </span>
            </div>
        </div>
        {{-- /Link --}}





        {{--<div data-repeater-list="group-{{ $model->slug }}">--}}

            {{--@for($i = 0; $i < 2;  $i++)--}}
                {{--@include('laravel-modules-core::page_management.sections.image_linker', ['count' => $i])--}}
            {{--@endfor--}}

        {{--</div>--}}
        {{--<a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">--}}
            {{--<i class="fa fa-plus"></i> {!! lmcTrans('admin.ops.add') !!}--}}
        {{--</a>--}}
    </div>

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}