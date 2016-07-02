@inject('permission', 'ErenMustafaOzdal\LaravelUserModule\Services\PermissionService')

<div class="easy-pie-chart tooltips" title="{{ str_replace( [':rate'], [$permission->permissionRate($model->permission_collect->count())], lmcTrans('laravel-user-module/admin.fields.role.permission_rate') ) }}">
    <div class="number" data-percent="{!! $permission->permissionRate($model->permission_collect->count()) !!}">
        %<span>{!! $permission->permissionRate($model->permission_collect->count()) !!}</span>
    </div>
</div>