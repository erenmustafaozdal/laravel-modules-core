@inject('permission', 'ErenMustafaOzdal\LaravelUserModule\Services\PermissionService')

{{-- Element List For Permission --}}
<div class="mt-element-list">
    
    {{-- List Head --}}
    <div class="mt-list-head list-todo red">
        <div class="list-head-title-container">

            <h3 class="list-title">{!! lmcTrans('laravel-user-module/admin.fields.role.permissions') !!}</h3>

            <div class="list-head-count">
                <div class="list-head-count-item">
                    <i class="fa fa-user-secret"></i>
                    {{ str_replace(
                        [':count'],
                        [$permission->permissionCount()],
                        lmcTrans('laravel-user-module/admin.fields.role.total_permission')
                    ) }}
                </div>
            </div>

        </div>
    </div>
    {{-- /List Head --}}
    
    {{-- List Container --}}
    <div class="mt-list-container list-todo">
        <div class="list-todo-line"></div>

        <ul>
            @foreach($permission->groupByController() as $controller)

            <li class="mt-list-item">
                <div class="list-todo-icon bg-white">
                    <i class="fa fa-database"></i>
                </div>
            </li>

            @endforeach
        </ul>

    </div>
    {{-- /List Container --}}
    
</div>
{{-- /Element List For Permission --}}