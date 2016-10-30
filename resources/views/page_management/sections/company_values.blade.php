{!! Form::open([
    'method'=> 'POST',
    'url'   => lmbRoute('admin.page_management.updateSection', [
        'id'    => $model->id,
        'form'  => $section->slug,
        'page'  => 'company'
    ]),
    'class' => 'form-horizontal form-bordered'
]) !!}

@include('laravel-modules-core::partials.form.actions', ['type' => 'top'])

<div class="form-body">

    {{-- Title --}}
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.title') !!}
        </label>
        <div class="col-md-9">
            {!! Form::text( 'title', isset($model) ? $model->title : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.title')
            ]) !!}
        </div>
    </div>
    {{-- /Title --}}

    {{-- Is Active --}}
    <div class="form-group">
        <label class="col-md-3 control-label">
            {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.is_active') !!}
        </label>
        <div class="col-md-9">
            {!! Form::hidden('is_active', 0) !!}
            {!! Form::checkbox( 'is_active', 1, $model->is_active, [
                'class'         => 'make-switch',
                'data-on-text'  => '<i class="fa fa-check"></i>',
                'data-on-color' => 'success',
                'data-off-text' => '<i class="fa fa-times"></i>',
                'data-off-color'=> 'danger',
            ]) !!}
        </div>
    </div>
    {{-- /Is Active --}}

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}