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
            @foreach($permission->groupByController() as $namespace => $routes)
            <li class="mt-list-item">
                <div class="list-todo-icon bg-white">
                    <i class="{!! trans($namespace . '.icon') !!}"></i>
                </div>

                <div class="list-todo-item grey">
                    <a class="list-toggle-container font-white" data-toggle="collapse" href="#{!! $routes->first()['controller'] !!}" aria-expanded="false">
                        <div class="list-toggle">
                            <div class="list-toggle-title bold">{!! trans($namespace . '.title') !!}</div>
                            <div class="badge badge-default pull-right bold">{!! $routes->count() !!}</div>
                        </div>
                    </a>
                    <div class="task-list panel-collapse collapse" id="{!! $routes->first()['controller'] !!}" aria-expanded="true">
                        
                        {{-- İzin Rotoları --}}
                        <ul>
                            @foreach($routes as $route)
                                <li class="task-list-item done">
                                    <div class="task-icon">
                                        <a href="javascript:;">
                                            <i class="{!! trans($namespace . '.icon') !!}"></i>
                                        </a>
                                    </div>
                                    <div class="task-status">
                                        {!! Form::checkbox( 'permissions[]', 1, 0, [
                                            'class'         => 'make-switch',
                                            'data-on-text'  => lmcTrans('laravel-user-module/admin.fields.role.permission_on'),
                                            'data-on-color' => 'success',
                                            'data-off-text' => lmcTrans('laravel-user-module/admin.fields.role.permission_off'),
                                            'data-off-color'=> 'danger',
                                        ]) !!}
                                    </div>
                                    <div class="task-content">
                                        <h4 class="bold">
                                            <a href="javascript:;">{!! trans($namespace . '.' . str_replace('.','_',$route['sub_route'])) !!}</a>
                                        </h4>
                                        <p>{!! trans($namespace . '.' . str_replace('.','_',$route['sub_route']) . '_desc') !!} </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{-- /İzin Rotoları --}}
                        
                    </div>
                </div>
            </li>

            @endforeach
        </ul>

    </div>
    {{-- /List Container --}}
    
</div>
{{-- /Element List For Permission --}}