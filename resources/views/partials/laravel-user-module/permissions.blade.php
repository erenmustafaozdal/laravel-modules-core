@inject('permission', 'ErenMustafaOzdal\LaravelModulesBase\Services\PermissionService')

{{-- Permission List --}}
<div class="mt-element-list">

    {{-- List Head --}}
    <div class="mt-list-head list-default green">
        <div class="list-head-title-container">
            <h3 class="list-title">{!! lmcTrans('laravel-user-module/admin.fields.role.permissions') !!}</h3>
            <div class="list-head-count">
                <div class="list-head-count-item">
                    <i class="fa fa-user-secret"></i>
                    {!! lmcTrans('laravel-user-module/admin.fields.role.total_permission', [
                        'module'    => $permission->counts['module'],
                        'route'     => $permission->counts['route']
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
    {{-- /List Head --}}

    {{-- Lixt Container --}}
    <div class="mt-list-container list-default ext-1 group">

        <div class="mt-list-title">
            {!! lmcTrans('laravel-user-module/admin.fields.role.permission_all_on_off') !!}
            <a class="btn green btn-outline pull-right btn-xs" id="all-permission" href="javascript:;">
                <i class="fa fa-check"></i>
            </a>
        </div>
        
        {{-- Lists --}}
        @foreach($permission->routes as $module => $routes)
        <a class="list-toggle-container" data-toggle="collapse" href="#{{ $module }}" aria-expanded="false">
            <div class="list-toggle"> {{ $routes['title'] }}
                <?php $count = 0; foreach($routes['routes'] as $route => $infos){ if(hasPermission($route)) $count++; } ?>
                <span class="badge badge-default pull-right bg-white font-dark bold">{{ $count }}</span>
            </div>
        </a>
        <div class="panel-collapse collapse" id="{{ $module }}">
            
            {{-- Routes --}}
            <ul>

                {{-- Toplu atama butonu --}}
                <li class="mt-list-item bg-grey-cararra">

                    {{-- Checkbox Form --}}
                    <div class="list-datetime">
                        {!! Form::checkbox( '', 1, 0, [
                            'class'         => 'make-switch group-permission',
                            'data-on-text'  => '<i class="fa fa-check"></i>',
                            'data-on-color' => 'success',
                            'data-off-text' => '<i class="fa fa-times"></i>',
                            'data-off-color'=> 'danger',
                        ]) !!}
                    </div>
                    {{-- /Checkbox Form --}}

                    {{-- Title and Description --}}
                    <div class="list-item-content parent">
                        <h3>
                            <a href="javascript:;">
                                {!! lmcTrans('laravel-user-module/admin.fields.role.permission_group_on') !!} /
                                {!! lmcTrans('laravel-user-module/admin.fields.role.permission_group_off') !!}
                            </a>
                        </h3>
                    </div>
                    {{-- /Title and Description --}}

                </li>
                {{-- /Toplu atama butonu --}}

            @foreach($routes['routes'] as $route => $infos)

                {{-- Route List Item --}}
                @if(hasPermission($route))
                <li class="mt-list-item">

                    {{-- Checkbox Form --}}
                    <div class="list-datetime">
                        {!! Form::hidden("permissions[{$route}]", 0) !!}
                        {!! Form::checkbox( "permissions[{$route}]", 1, isset($permissions[$route]), [
                            'class'         => 'make-switch  item-permission',
                            'data-on-text'  => '<i class="fa fa-check"></i>',
                            'data-on-color' => 'success',
                            'data-off-text' => '<i class="fa fa-times"></i>',
                            'data-off-color'=> 'danger',
                        ]) !!}
                    </div>
                    {{-- /Checkbox Form --}}

                    {{-- Title and Description --}}
                    <div class="list-item-content parent">
                        <h3>
                            <a href="javascript:;">{!! $infos['title'] !!}</a>
                        </h3>
                        <p>{!! $infos['description'] !!}</p>
                    </div>
                    {{-- /Title and Description --}}

                </li>
                @endif
                {{-- /Route List Item --}}

            @endforeach

            </ul>
            {{-- /Routes --}}

        </div>
        @endforeach
        {{-- /Lists --}}

    </div>
    {{-- /Lixt Container --}}

</div>
{{-- /Permission List --}}