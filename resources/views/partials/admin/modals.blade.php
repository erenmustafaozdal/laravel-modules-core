{{-- Reset System Datas Modal --}}
@if(hasPermission('admin.general_configs.resetSystemDatas'))
    <div id="reset-system-datas"
         class="modal fade"
         role="dialog"
         aria-labelledby="reset-system-datas"
         tabindex="-1"
         role="dialog"
         aria-hidden="true"
    >
        <div class="modal-dialog modal-lg" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.reset_system_datas') !!}</h4>
                </div>
                <div class="modal-body">

                    {{-- Helper --}}
                    <div class="alert alert-danger">
                        {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.reset_system_datas') !!}
                    </div>
                    {{-- /Helper --}}
                    
                    {{-- Şifre Formu --}}
                    {!! Form::open([
                        'method'=> 'POST',
                        'url'   => lmbRoute('admin.general_configs.resetSystemDatas'),
                        'class' => 'form',
                        'id'    => 'reset-system-datas-form'
                    ]) !!}
                    <div class="form-group">
                        {!! Form::password( 'password', [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.password'),
                            'id'            => 'password'
                        ]) !!}
                    </div>
                    {!! Form::close() !!}
                    {{-- /Şifre Formu --}}
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red btn-outline" data-dismiss="modal">
                        {!! trans('laravel-modules-core::admin.ops.cancel') !!}
                    </button>
                    <button type="button" class="btn blue btn-outline editor-action" onclick="$('form#reset-system-datas-form').submit();">
                        {!! trans('laravel-modules-core::admin.ops.reset') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- /Reset System Datas Modal --}}



{{-- Load Demo Datas Modal --}}
@if(hasPermission('admin.general_configs.loadDemoDatas'))
    <div id="load-demo-datas"
         class="modal fade"
         role="dialog"
         aria-labelledby="load-demo-datas"
         tabindex="-1"
         role="dialog"
         aria-hidden="true"
    >
        <div class="modal-dialog modal-lg" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.load_demo_datas') !!}</h4>
                </div>
                <div class="modal-body">

                    {{-- Helper --}}
                    <div class="alert alert-danger">
                        {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.load_demo_datas') !!}
                    </div>
                    {{-- /Helper --}}

                    {{-- Şifre Formu --}}
                    {!! Form::open([
                        'method'=> 'POST',
                        'url'   => lmbRoute('admin.general_configs.loadDemoDatas'),
                        'class' => 'form',
                        'id'    => 'load-demo-datas-form'
                    ]) !!}
                    <div class="form-group">
                        {!! Form::password( 'password', [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-user-module/admin.fields.user.password'),
                            'id'            => 'password'
                        ]) !!}
                    </div>
                    {!! Form::close() !!}
                    {{-- /Şifre Formu --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red btn-outline" data-dismiss="modal">
                        {!! trans('laravel-modules-core::admin.ops.cancel') !!}
                    </button>
                    <button type="button" class="btn blue btn-outline editor-action" onclick="$('form#load-demo-datas-form').submit();">
                        {!! trans('laravel-modules-core::admin.ops.reload') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- /Load Demo Datas Modal --}}