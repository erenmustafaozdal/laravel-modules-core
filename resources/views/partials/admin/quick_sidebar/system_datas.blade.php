@if(hasPermission([
    'admin.general_configs.resetSystemDatas',
    'admin.general_configs.loadDemoDatas',
]))
{{-- Demo Datas Title --}}
<h3 class="list-heading">
    {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.system_datas') !!}
</h3>
<ul class="feeds list-items">
    <li>
        <div class="alert alert-danger" style="margin-bottom:0;">
            {!! lmcTrans('ezelnet-frontend-module/admin.helpers.general_configs.system_datas') !!}
        </div>
    </li>
</ul>
{{-- /Demo Datas Title --}}

{{-- Demo Datas List --}}
<ul class="list-items borderless margin-bottom-40">

    @if(hasPermission('admin.general_configs.resetSystemDatas'))
    <li>
        {!! Form::button( '<i class="icon-trash"></i> <span class="hidden-xs">' . lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.reset_system_datas') . '</span>', [
            'class'         => 'btn red',
            'type'          => 'button',
            'data-toggle'   => 'modal',
            'data-target'   => '#reset-system-datas'
        ]) !!}
    </li>
    @endif

    @if(hasPermission('admin.general_configs.loadDemoDatas'))
    <li>
        {!! Form::button( '<i class="icon-reload"></i> <span class="hidden-xs">' . lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.load_demo_datas') . '</span>', [
            'class'         => 'btn blue',
            'type'          => 'button',
            'data-toggle'   => 'modal',
            'data-target'   => '#load-demo-datas'
        ]) !!}
    </li>
    @endif

</ul>
{{-- /Demo Datas List --}}
@endif