@inject('permission', 'ErenMustafaOzdal\LaravelUserModule\Services\PermissionService')

<div class="easy-pie-chart tooltips" title="{{ str_replace( [':rate'], [Sentinel::getUser()->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count())], lmcTrans('laravel-user-module/admin.fields.role.permission_rate') ) }}">
    <div class="number" data-percent="{!! Sentinel::getUser()->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) !!}">
        %<span>{!! Sentinel::getUser()->is_super_admin ? 100 : $permission->permissionRate($model->permission_collect->count()) !!}</span>
    </div>
</div>