<div data-repeater-item class="mt-repeater-item">
    <div class="mt-repeater-row">

        {{-- Photo --}}
        @include('laravel-modules-core::partials.form.fileinput_form', [
            'label'         => lmcTrans('admin.fields.photo', [], 1),
            'input_name'    => 'photo',
            'input_class'   => "photo_{$model->slug}",
            'elfinder'      => true,
            'elfinder_id'   => "elfinder_{$model->slug}---{$count}",
            'multiple'      => false,
            'tab_href'      => "{$model->slug}---{$count}",
            'elfinderDisable'=> true
        ])
        {{-- /Photo --}}

        {{-- Link --}}
        <div class="form-group">
            <label class="col-md-3 control-label">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.link') !!}
            </label>
            <div class="col-md-9">
                {!! Form::text( 'link', isset($image) ? $image->link : null, [
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

        {{-- Repeater Delete --}}
        {{--<a href="javascript:;" data-repeater-delete class="btn red btn-outline mt-repeater-delete disabled">--}}
            {{--<i class="fa fa-close"></i>  {!! lmcTrans('admin.fields.remove_value') !!}--}}
        {{--</a>--}}
        {{-- /Repeater Delete --}}

    </div>

</div>