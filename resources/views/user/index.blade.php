@extends(config('laravel-user-module.views.user.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/admin.user.index') !!}
@endsection

@section('page-title')
    <h1>{!! lmcTrans('laravel-user-module/admin.user.index') !!}
        <small>{!! lmcTrans('laravel-user-module/admin.user.index_description') !!}</small>
    </h1>
@endsection

@section('css')
    @parent
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/datatables.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var userFormLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var datatableJs = "{!! lmcElixir('assets/app/datatable.js') !!}";
        var editorJs = "{!! lmcElixir('assets/app/editor.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var userFormJs = "{!! lmcElixir('assets/pages/scripts/user/user-form.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! route('api.user.index') !!}";
        var apiStoreURL = "{!! route('api.user.store') !!}";
        var apiGroupAction = "{!! route('api.user.group_action') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            first_name: {
                required: "{!! LMCValidation::getMessage('first_name','required') !!}"
            },
            last_name: {
                required: "{!! LMCValidation::getMessage('last_name','required') !!}"
            },
            email: {
                required: "{!! LMCValidation::getMessage('email','required') !!}",
                email: "{!! LMCValidation::getMessage('email','email') !!}"
            },
            password: {
                required: "{!! LMCValidation::getMessage('password','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password','min.string', [':min' => 6]) !!}"
            },
            password_confirmation: {
                required: "{!! LMCValidation::getMessage('password_confirmation','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password_confirmation','min.string', [':min' => 6]) !!}",
                equalTo: "{!! LMCValidation::getMessage('password','confirmed') !!}"
            }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        $script.ready('app_editor', function()
        {
            $script("{!! lmcElixir('assets/pages/scripts/user/index.js') !!}",'index');
        });
        $script.ready(['config','index'], function()
        {
            Index.init();
        });
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-fit portlet-datatable bordered">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-users font-red"></i>
                <span class="caption-subject font-red sbold uppercase">
                    {!! lmcTrans('laravel-user-module/admin.user.index') !!}
                </span>
            </div>
            <div class="actions">
                <a class="btn green btn-outline" data-toggle="modal" href="#editor-modal" data-action="fast-add">
                    {!! trans('laravel-modules-core::admin.ops.fast_add') !!}
                    <i class="fa fa-plus"></i>
                </a>
                <a class="btn green btn-outline" href="{!! route('admin.user.create') !!}">
                    {!! trans('laravel-modules-core::admin.ops.add') !!}
                    <i class="fa fa-plus"></i>
                </a>
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

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="table-container">
                {{-- Table Actions --}}
                <div class="table-actions-wrapper">
                    <span> </span>
                    <select class="table-group-action-input form-control input-inline input-small input-sm">
                        <option value="">{!! trans('laravel-modules-core::admin.ops.select') !!}</option>
                        <option value="activate">{!! trans('laravel-modules-core::admin.ops.activate') !!}</option>
                        <option value="not_activate">{!! trans('laravel-modules-core::admin.ops.not_activate') !!}</option>
                        <option value="destroy">{!! trans('laravel-modules-core::admin.ops.destroy') !!}</option>
                    </select>
                    <button class="btn btn-sm green btn-outline table-group-action-submit">
                        <i class="fa fa-check"></i> {!! trans('laravel-modules-core::admin.ops.submit') !!}</button>
                </div>
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                        <tr role="row" class="heading">
                            <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            <th class="all" width="2%"></th>
                            <th class="all" width="5%"> {!! lmcTrans('laravel-user-module/admin.fields.user.id') !!} </th>
                            <th class="all" width="5%"> {!! lmcTrans('laravel-user-module/admin.fields.user.photo') !!} </th>
                            <th class="all" width="100"> {!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!} </th>
                            <th class="all" width="10%"> {!! lmcTrans('laravel-user-module/admin.fields.user.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>
                        <tr role="row" class="filter">
                            <td></td>
                            <td></td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.id') !!}">
                            </td>
                            <td> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!} - {!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}">
                            </td>
                            <td>
                                <select name="status" class="form-control form-filter input-sm">
                                    <option value="">{!! trans('laravel-modules-core::admin.ops.select') !!}</option>
                                    <option value="1">{!! trans('laravel-modules-core::admin.fields.user.active') !!}</option>
                                    <option value="0">{!! trans('laravel-modules-core::admin.fields.user.not_active') !!}</option>
                                </select>
                            </td>
                            <td>
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="created_at_from" placeholder="{!! trans('laravel-modules-core::admin.ops.date_from') !!}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="created_at_to" placeholder="{!! trans('laravel-modules-core::admin.ops.date_to') !!}">
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
                                        {!! trans('laravel-modules-core::admin.ops.search') !!}
                                    </button>
                                </div>
                                <button class="btn btn-sm red btn-outline filter-cancel">
                                    <i class="fa fa-times"></i>
                                    {!! trans('laravel-modules-core::admin.ops.reset') !!}
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
                                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}</label>
                                <input type="text" name="first_name" class="form-control" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}</label>
                                <input type="text" name="last_name" class="form-control" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}</label>
                                <input type="text" name="email" class="form-control" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.password') !!}</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.password') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.password_comfirmation') !!}</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.password_comfirmation') !!}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.status') !!}</label>
                                <div class="clearfix"></div>
                                <input type="checkbox" class="make-switch" id="is_active" name="is_active" 
                                       data-on-text="{!! lmcTrans('laravel-user-module/admin.fields.user.active') !!}"
                                       data-on-color="success"
                                       data-off-text="{!! lmcTrans('laravel-user-module/admin.fields.user.not_active') !!}"
                                       data-off-color="danger"
                                >
                            </div>
                            <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.is_active_help') !!} </span>
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
