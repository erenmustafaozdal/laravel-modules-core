<div class="actions">

    @if ($fast_add)
    <a class="btn green btn-outline" data-toggle="modal" href="#editor-modal" data-action="fast-add">
        <i class="fa fa-plus"></i>
        <span class="hidden-xs"> {!! trans('laravel-modules-core::admin.ops.fast_add') !!} </span>
    </a>
    @endif

    @if ($add)
    <a class="btn green btn-outline" href="{!! is_array($module) ? lmbRoute("admin.{$module['route']}.create", ['id' => $module['id']]) : lmbRoute("admin.{$module}.create") !!}">
        <i class="fa fa-plus-square"></i>
        <span class="hidden-xs"> {!! trans('laravel-modules-core::admin.ops.add') !!} </span>
    </a>
    @endif

    @if ($tools)
    <div class="btn-group">
        <a class="btn red btn-outline" href="javascript:;" data-toggle="dropdown">
            <i class="fa fa-share"></i>
            <span class="hidden-xs"> {!! trans('laravel-modules-core::admin.ops.tools') !!} </span>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu pull-right" id="lmcDataTableTools">
            <li>
                <a href="javascript:;" data-action="0" class="tool-action tooltips" title="{!! trans('laravel-modules-core::admin.ops.shortcut.print') !!}">
                    <i class="icon-printer"></i>
                    {!! trans('laravel-modules-core::admin.ops.print') !!}
                </a>
            </li>
            <li>
                <a href="javascript:;" data-action="1" class="tool-action tooltips" title="{!! trans('laravel-modules-core::admin.ops.shortcut.copy') !!}">
                    <i class="icon-layers"></i>
                    {!! trans('laravel-modules-core::admin.ops.copy') !!}
                </a>
            </li>
            <li>
                <a href="javascript:;" data-action="2" class="tool-action tooltips" title="{!! trans('laravel-modules-core::admin.ops.shortcut.pdf') !!}">
                    <i class="icon-notebook"></i>
                    {!! trans('laravel-modules-core::admin.ops.pdf') !!}
                </a>
            </li>
            <li>
                <a href="javascript:;" data-action="3" class="tool-action tooltips" title="{!! trans('laravel-modules-core::admin.ops.shortcut.excel') !!}">
                    <i class="icon-doc"></i>
                    {!! trans('laravel-modules-core::admin.ops.excel') !!}
                </a>
            </li>
            <li>
                <a href="javascript:;" data-action="4" class="tool-action tooltips" title="{!! trans('laravel-modules-core::admin.ops.shortcut.csv') !!}">
                    <i class="icon-doc"></i>
                    {!! trans('laravel-modules-core::admin.ops.csv') !!}
                </a>
            </li>
            <li class="divider"> </li>
            <li>
                <a href="javascript:;" data-action="5" class="tool-action tooltips" title="{!! trans('laravel-modules-core::admin.ops.shortcut.reload') !!}">
                    <i class="icon-refresh"></i>
                    {!! trans('laravel-modules-core::admin.ops.reload') !!}
                </a>
            </li>
            </li>
        </ul>
    </div>
    @endif
</div>