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
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var datatableJs = "{!! lmcElixir('assets/app/datatable.js') !!}";
        var editorJs = "{!! lmcElixir('assets/app/editor.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var formJs = "{!! lmcElixir('assets/pages/scripts/user/user-form.js') !!}";
        var indexJs = "{!! lmcElixir('assets/pages/scripts/user/index.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var ajaxURL = "{!! lmbRoute('api.user.index') !!}";
        var apiStoreURL = "{!! lmbRoute('api.user.store') !!}";
        var apiGroupAction = "{!! lmbRoute('api.user.group') !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            first_name: { required: "{!! LMCValidation::getMessage('first_name','required') !!}" },
            last_name: { required: "{!! LMCValidation::getMessage('last_name','required') !!}" },
            email: { required: "{!! LMCValidation::getMessage('email','required') !!}", email: "{!! LMCValidation::getMessage('email','email') !!}" },
            password: { required: "{!! LMCValidation::getMessage('password','required') !!}", minlength: "{!! LMCValidation::getMessage('password','min.string', ['min' => 6]) !!}" },
            password_confirmation: { required: "{!! LMCValidation::getMessage('password_confirmation','required') !!}", minlength: "{!! LMCValidation::getMessage('password_confirmation','min.string', ['min' => 6]) !!}", equalTo: "{!! LMCValidation::getMessage('password','confirmed') !!}" }
        };
        {{-- /languages --}}

        {{-- scripts --}}
        var datatableIsResponsive = {!! config('laravel-modules-core.options.data_table.is_responsive') ? 'true' : 'false' !!};
        var groupActionSupport = {!! config('laravel-modules-core.options.user.datatable_group_action') ? 'true' : 'false' !!};
        var rowDetailSupport = {!! config('laravel-modules-core.options.user.datatable_detail') ? 'true' : 'false' !!};
        var datatableFilterSupport = {!! config('laravel-modules-core.options.user.datatable_filter') ? 'true' : 'false' !!};
        {{-- /scripts --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/user/index.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-index.js') !!}"></script>
@endsection

@section('content')
    {{-- Table Portlet --}}
    <div class="portlet light portlet-datatable bordered portlet-fit">
        {{-- Table Portlet Title and Actions --}}
        <div class="portlet-title">
            <div class="caption">
                <i class="{!! config('laravel-user-module.icons.user') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-user-module/admin.user.index') !!}
                </span>
            </div>
            @include('laravel-modules-core::partials.common.indexActions', [
                'module' => 'user',
                'fast_add'  => config('laravel-modules-core.options.user.datatable_fast_add'),
                'add'       => true,
                'tools'     => config('laravel-modules-core.options.user.datatable_tools')
            ])
        </div>
        {{-- /Table Portlet Title and Actions --}}

        {{-- Table Portlet Body --}}
        <div class="portlet-body">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="table-container">
                {{-- Table Actions --}}
                @if(config('laravel-modules-core.options.user.datatable_group_action'))
                    @include('laravel-modules-core::partials.common.indexTableActions', [
                        'actions'   => ['activate','not_activate','destroy']
                    ])
                @endif
                {{-- /Table Actions --}}

                {{-- DataTable --}}
                <table class="table table-striped table-bordered table-hover table-checkable lmcDataTable">
                    <thead>
                        <tr role="row" class="heading">
                            {{-- Datatable Group Action Column --}}
                            @if(config('laravel-modules-core.options.user.datatable_group_action'))
                                <th class="all" width="2%"> <input type="checkbox" class="group-checkable"> </th>
                            @endif
                            {{-- /Datatable Group Action Column --}}

                            {{-- Datatable Row Detail Column --}}
                            @if(config('laravel-modules-core.options.user.datatable_detail'))
                                <th class="all" width="2%"></th>
                            @endif
                            {{-- /Datatable Row Detail Column --}}

                            <th class="all" width="5%"> {!! trans('laravel-modules-core::admin.fields.id') !!} </th>
                            <th class="all" width="5%"> {!! lmcTrans('laravel-user-module/admin.fields.user.photo') !!} </th>
                            <th class="all" width="100"> {!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.status') !!} </th>
                            <th class="all" width="20%"> {!! trans('laravel-modules-core::admin.fields.created_at') !!} </th>
                            <th class="all" width="10%"> {!! trans('laravel-modules-core::admin.ops.action') !!} </th>
                        </tr>

                        {{-- Datatable Filter --}}
                        @if(config('laravel-modules-core.options.user.datatable_filter'))
                            <tr role="row" class="filter">
                                {{-- Datatable Group Action Column --}}
                                @if(config('laravel-modules-core.options.user.datatable_group_action'))
                                    <td></td>
                                @endif
                                {{-- /Datatable Group Action Column --}}

                                {{-- Datatable Row Detail Column --}}
                                @if(config('laravel-modules-core.options.user.datatable_detail'))
                                    <td></td>
                                @endif
                                {{-- /Datatable Row Detail Column --}}

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="id" placeholder="{!! trans('laravel-modules-core::admin.fields.id') !!}">
                                </td>
                                <td> </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="first_name" placeholder="{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!} - {!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}">
                                </td>
                                <td>
                                    <select name="status" class="form-control form-filter input-sm">
                                        <option value="">{!! trans('laravel-modules-core::admin.ops.select') !!}</option>
                                        <option value="1">{!! trans('laravel-modules-core::admin.ops.active') !!}</option>
                                        <option value="0">{!! trans('laravel-modules-core::admin.ops.not_active') !!}</option>
                                    </select>
                                </td>
                                <td>
                                    @include('laravel-modules-core::partials.common.datatables.filterDate')
                                </td>
                                <td>
                                    @include('laravel-modules-core::partials.common.datatables.filterActions')
                                </td>
                            </tr>
                        @endif
                        {{-- /Datatable Filter --}}

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
    @include('laravel-modules-core::partials.common.datatables.modal', [
        'includes' => [
            'user.partials.edit_info_form'          => [ 'helpBlockAfter'    => true ],
            'user.partials.change_password_form'    => [ 'helpBlockAfter'    => true ],
        ]
    ])
    {{-- /Create and Edit modal --}}
@endsection
