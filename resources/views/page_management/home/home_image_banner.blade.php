{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', ['id' => $model->id]),
    'class' => 'form-horizontal form-bordered'
]) !!}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">

    <div class="mt-repeater margin-bottom-40">
        <div data-repeater-list="group-{{ $model->slug }}">

            <?php $k = 0; ?>
            @forelse ( $model->imageOptions as $image )
                @include('laravel-modules-core::page_management.home.image_linker', ['count' => $k])
                <?php $k++; ?>
            @empty
                @for($i = 0; $i < 2;  $i++)
                    @include('laravel-modules-core::page_management.home.image_linker', ['count' => $i])
                @endfor
            @endforelse

        </div>
        <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
            <i class="fa fa-plus"></i> {!! lmcTrans('admin.ops.add') !!}
        </a>
    </div>

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}