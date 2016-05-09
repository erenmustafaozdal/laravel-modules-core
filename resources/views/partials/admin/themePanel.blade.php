<div class="btn-group btn-theme-panel">
    <a href="javascript:;"
       class="btn dropdown-toggle tooltips"
       data-toggle="dropdown"
       data-container="body"
       data-placement="bottom"
       data-original-title="{!! trans('laravel-modules-core::admin.toolbar.title') !!}"
    >
        <i class="icon-settings"></i>
    </a>
    <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <h3>{!! trans('laravel-modules-core::admin.toolbar.theme.title') !!}</h3>
                <ul class="theme-colors">
                    <li class="theme-color theme-color-default" data-theme="default">
                        <span class="theme-color-view"></span>
                        <span class="theme-color-name">{!! trans('laravel-modules-core::admin.toolbar.theme.dark_header') !!}</span>
                    </li>
                    <li class="theme-color theme-color-light active" data-theme="light">
                        <span class="theme-color-view"></span>
                        <span class="theme-color-name">{!! trans('laravel-modules-core::admin.toolbar.theme.light_header') !!}</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                <h3>{!! trans('laravel-modules-core::admin.toolbar.layout.title') !!}</h3>
                <ul class="theme-settings">
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.layout_label') !!}
                        <select class="layout-option form-control input-small input-sm">
                            <option value="fluid"
                                    {!! Cache::get('theme_tool')['layout'] === 'fluid' ? 'selected="selected"' : '' !!}
                            >{!! trans('laravel-modules-core::admin.toolbar.layout.layout_fluid') !!}</option>
                            <option value="boxed"
                                    {!! Cache::get('theme_tool')['layout'] === 'boxed' ? 'selected="selected"' : '' !!}
                            >{!! trans('laravel-modules-core::admin.toolbar.layout.layout_boxed') !!}</option>
                        </select>
                    </li>
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.header_label') !!}
                        <select class="page-header-option form-control input-small input-sm">
                            <option value="fixed"
                                    {!! Cache::get('theme_tool')['header'] === 'fixed' ? 'selected="selected"' : '' !!}
                            >{!! trans('laravel-modules-core::admin.toolbar.layout.header_fixed') !!}</option>
                            <option value="default"
                                    {!! Cache::get('theme_tool')['header'] === 'default' ? 'selected="selected"' : '' !!}
                            >{!! trans('laravel-modules-core::admin.toolbar.layout.header_default') !!}</option>
                        </select>
                    </li>
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.dropdown_label') !!}
                        <select class="page-header-top-dropdown-style-option form-control input-small input-sm">
                            <option value="light"
                                    {!! Cache::get('theme_tool')['headerTopDropdown'] === 'light' ? 'selected="selected"' : '' !!}
                            >{!! trans('laravel-modules-core::admin.toolbar.layout.dropdown_light') !!}</option>
                            <option value="dark"
                                    {!! Cache::get('theme_tool')['headerTopDropdown'] === 'dark' ? 'selected="selected"' : '' !!}
                            >{!! trans('laravel-modules-core::admin.toolbar.layout.dropdown_dark') !!}</option>
                        </select>
                    </li>
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_mode_label') !!}
                        <select class="sidebar-option form-control input-small input-sm">
                            <option value="fixed">{!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_mode_fixed') !!}</option>
                            <option value="default" selected="selected">{!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_mode_default') !!}</option>
                        </select>
                    </li>
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_menu_label') !!}
                        <select class="sidebar-menu-option form-control input-small input-sm">
                            <option value="accordion" selected="selected">{!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_menu_accordion') !!}</option>
                            <option value="hover">{!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_menu_hover') !!}</option>
                        </select>
                    </li>
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_position_label') !!}
                        <select class="sidebar-pos-option form-control input-small input-sm">
                            <option value="left" selected="selected">{!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_position_left') !!}</option>
                            <option value="right">{!! trans('laravel-modules-core::admin.toolbar.layout.sidebar_position_right') !!}</option>
                        </select>
                    </li>
                    <li> {!! trans('laravel-modules-core::admin.toolbar.layout.footer_label') !!}
                        <select class="page-footer-option form-control input-small input-sm">
                            <option value="fixed">{!! trans('laravel-modules-core::admin.toolbar.layout.footer_fixed') !!}</option>
                            <option value="default" selected="selected">{!! trans('laravel-modules-core::admin.toolbar.layout.footer_default') !!}</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
