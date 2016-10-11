<?php $modules = app()->make(config('laravel-menu-module.services.menu_module')); ?>

<div class="panel-group accordion" id="menu-modules">
    @foreach($modules->getModules() as $module)
        {{-- Accordion --}}
        <div class="panel panel-default">

            {{-- Heading --}}
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle accordion-toggle-styled collapsed"
                       data-toggle="collapse"
                       data-parent="#menu-modules"
                       href="#module-{{ $module['module'] }}"
                    >
                        {!! $module['title'] !!}
                    </a>
                </h4>
            </div>
            {{-- /Heading --}}

            {{-- Body --}}
            <div id="module-{{ $module['module'] }}" class="panel-collapse collapse">

                <ul class="list-group">

                    {{-- Helper --}}
                    @if(isset($module['helper']))
                    <li class="list-group-item bg-blue-sharp bg-font-blue-sharp">
                        {!! $module['helper'] !!}
                    </li>
                    @endif
                    {{-- /Helper --}}

                    @foreach($module['datas'] as $model)
                        <li class="list-group-item search-open">
                            <div class="form-group">
                                <label class="control-label"> {{ is_null($model->menu_name) ? $module['title'] : $model->menu_name }} </label>
                                <div class="input-group">
                                    {!! Form::text( 'title', $model->route, [
                                        'class'         => 'form-control form-control-solid placeholder-no-fix',
                                        'readonly'      => true,
                                        'id'            => $model->module
                                    ]) !!}
                                    <span class="input-group-btn">
                                        <a href="javascript:;"
                                           class="btn blue btn-outline mt-clipboard tooltips"
                                           data-clipboard-action="copy"
                                           data-clipboard-target="#{{ $model->module }}"
                                           data-container="body"
                                           data-original-title="{!! lmcTrans('admin.ops.copy') !!}"
                                        >
                                            <i class="fa fa-clone"></i></a>
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
            {{-- /Body --}}

        </div>
        {{-- /Accordion --}}
    @endforeach
</div>