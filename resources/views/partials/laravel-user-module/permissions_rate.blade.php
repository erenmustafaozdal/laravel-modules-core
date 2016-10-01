@inject('permission', 'ErenMustafaOzdal\LaravelModulesBase\Services\PermissionService')

<div class="easy-pie-chart tooltips" title="{{ lmcTrans('laravel-user-module/admin.fields.role.permission_rate', [ 'rate' => $model->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) ]) }}">
    <div class="number" data-percent="{!! $model->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) !!}">
        %<span>{!! $model->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) !!}</span>
    </div>
</div>