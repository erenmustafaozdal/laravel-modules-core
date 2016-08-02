@inject('permission', 'ErenMustafaOzdal\LaravelUserModule\Services\PermissionService')

<div class="easy-pie-chart tooltips" title="{{ lmcTrans('laravel-user-module/admin.fields.role.permission_rate', [ 'rate' => Sentinel::getUser()->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) ]) }}">
    <div class="number" data-percent="{!! Sentinel::getUser()->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) !!}">
        %<span>{!! Sentinel::getUser()->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) !!}</span>
    </div>
</div>