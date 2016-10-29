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

</div>

@include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
{!! Form::close() !!}