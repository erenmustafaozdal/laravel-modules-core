@inject('permission', 'ErenMustafaOzdal\LaravelUserModule\Services\PermissionService')

<div class="easy-pie-chart tooltips" title="{{ str_replace( [':rate'], [$permission->permissionRate($role->permissions->count())], lmcTrans('laravel-user-module/admin.fields.role.permission_rate') ) }}">
    <div class="number" data-percent="{!! $permission->permissionRate($role->permissions->count()) !!}">
        %<span>{!! $permission->permissionRate($role->permissions->count()) !!}</span>
    </div>
</div>