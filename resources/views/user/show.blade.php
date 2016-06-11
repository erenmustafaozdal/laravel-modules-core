@extends(config('laravel-user-module.views.user.layout'))

@section('title')
    {!! trans('laravel-modules-core::laravel-user-module/admin.user.show') !!}
@endsection

@section('page-title')
    <h1>{!! trans('laravel-modules-core::laravel-user-module/admin.user.show') !!}
        <small>{!! str_replace([':user'], [$user->fullname], trans('laravel-modules-core::laravel-user-module/admin.user.show_description'))  !!}</small>
    </h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-fit portlet-datatable bordered">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-users font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! trans('laravel-modules-core::laravel-user-module/admin.user.index') !!}
                </span>
            </div>
            <div class="actions">
                <div class="btn-group">
                    <a class="btn green btn-outline" data-toggle="modal" href="#editor-modal" data-action="fast-add">
                        {!! trans('laravel-modules-core::admin.ops.fast_add') !!}
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a class="btn green btn-outline" href="{!! route('admin.user.create') !!}">
                        {!! trans('laravel-modules-core::admin.ops.add') !!}
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
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
            </div>
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body">
            <div class="table-container">
                {{-- Table Actions --}}
                <div class="table-actions-wrapper">
                    <span> </span>
                    <select class="table-group-action-input form-control input-inline input-small input-sm">
                        <option value="">{!! trans('laravel-modules-core::laravel-user-module/admin.ops.select') !!}</option>
                        <option value="activate">{!! trans('laravel-modules-core::laravel-user-module/admin.ops.activate') !!}</option>
                        <option value="not_activate">{!! trans('laravel-modules-core::laravel-user-module/admin.ops.not_activate') !!}</option>
                        <option value="destroy">{!! trans('laravel-modules-core::laravel-user-module/admin.ops.destroy') !!}</option>
                    </select>
                    <button class="btn btn-sm green btn-outline table-group-action-submit">
                        <i class="fa fa-check"></i> {!! trans('laravel-modules-core::laravel-user-module/admin.ops.submit') !!}</button>
                </div>
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                        <tr role="row" class="heading">
                            <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            <th class="all" width="2%"></th>
                            <th class="all" width="5%"> {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.id') !!} </th>
                            <th class="all" width="5%"> {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.photo') !!} </th>
                            <th class="all" width="100"> {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.first_name') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::laravel-user-module/admin.ops.action') !!} </th>
                        </tr>
                        <tr role="row" class="filter">
                            <td></td>
                            <td></td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.id') !!}">
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.first_name') !!} - {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.last_name') !!}">
                            </td>
                            <td>
                                <select name="status" class="form-control form-filter input-sm">
                                    <option value="">{!! trans('laravel-modules-core::laravel-user-module/admin.ops.select') !!}</option>
                                    <option value="1">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.active') !!}</option>
                                    <option value="0">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.not_active') !!}</option>
                                </select>
                            </td>
                            <td>
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="created_at_from" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.ops.date_from') !!}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="created_at_to" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.ops.date_to') !!}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                </div>
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                        <i class="fa fa-search"></i>
                                        {!! trans('laravel-modules-core::laravel-user-module/admin.ops.search') !!}
                                    </button>
                                </div>
                                <button class="btn btn-sm red btn-outline filter-cancel">
                                    <i class="fa fa-times"></i>
                                    {!! trans('laravel-modules-core::laravel-user-module/admin.ops.reset') !!}
                                </button>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {{-- /DataTable --}}
            </div>
        </div>
        {{-- /Table Portlet Body --}}
    </div>
    {{-- /Table Portlet --}}
    
    {{-- Create and Edit modal --}}
    <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">{!! trans('laravel-modules-core::admin.ops.fast_add') !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        {{-- form elements --}}
                        <form class="form">
                            <div class="form-group">
                                <label class="control-label">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.first_name') !!}</label>
                                <input type="text" name="first_name" class="form-control" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.first_name') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.last_name') !!}</label>
                                <input type="text" name="last_name" class="form-control" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.last_name') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.email') !!}</label>
                                <input type="text" name="email" class="form-control" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.email') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.password') !!}</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.password') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.password_comfirmation') !!}</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.password_comfirmation') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.status') !!}</label>
                                <div class="clearfix"></div>
                                <input type="checkbox" class="make-switch" id="is_active" name="is_active" 
                                       data-on-text="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.active') !!}"
                                       data-on-color="success"
                                       data-off-text="{!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.not_active') !!}"
                                       data-off-color="danger"
                                >
                                <span class="help-block"> {!! trans('laravel-modules-core::laravel-user-module/admin.fields.user.is_active_help') !!} </span>
                            </div>
                        </form>
                        {{-- /form elements --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red btn-outline" data-dismiss="modal">{!! trans('laravel-modules-core::admin.ops.cancel') !!}</button>
                    <button type="button" class="btn blue btn-outline editor-action">{!! trans('laravel-modules-core::admin.ops.fast_add') !!}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- /Create and Edit modal --}}
@endsection
