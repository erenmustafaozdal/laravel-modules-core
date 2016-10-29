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

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">

    <div class="mt-repeater margin-bottom-40">
        <div data-repeater-list="group-{{ $model->slug }}">

            @for($i = 0; $i < 2;  $i++)
                @include('laravel-modules-core::page_management.sections.image_linker', ['count' => $i])
            @endfor

        </div>
        <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
            <i class="fa fa-plus"></i> {!! lmcTrans('admin.ops.add') !!}
        </a>
    </div>

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}