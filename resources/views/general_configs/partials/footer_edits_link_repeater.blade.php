<div data-repeater-item class="mt-repeater-item">
    <div class="mt-repeater-row">

        {{-- Title --}}
        <div class="form-group">
            <label class="col-md-3 control-label">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.link_title') !!}
            </label>
            <div class="col-md-9">
                {!! Form::text( 'title', isset($menu) ? $menu->title : null, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                    'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.link_title')
                ]) !!}
            </div>
        </div>
        {{-- /Title --}}

        {{-- Link --}}
        <div class="form-group">
            <label class="col-md-3 control-label">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.link') !!}
            </label>
            <div class="col-md-9">
                {!! Form::text( 'link', isset($menu) ? $menu->link : null, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix repeater',
                    'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.link')
                ]) !!}
            </div>
        </div>
        {{-- /Link --}}

        {{-- Repeater Delete --}}
        <a href="javascript:;"
           data-repeater-delete
           class="btn red btn-outline mt-repeater-delete"
        >
            <i class="fa fa-close"></i>
            {!! lmcTrans('admin.ops.destroy') !!}
        </a>
        {{-- /Repeater Delete --}}

    </div>
</div>