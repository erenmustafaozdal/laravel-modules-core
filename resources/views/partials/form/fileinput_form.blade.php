<div class="tabbable-line margin-bottom-10" id="file-upload-management">

    {{-- Tabs --}}
    <ul class="nav nav-tabs tabs-reversed">
        <li class="elfinder_wrapper {!! isset($elfinder) && $elfinder ? '' : 'hidden' !!}">
            <a href="#elfinder-content-{!! isset($tab_href) ? $tab_href : (isset($input_id) ? $input_id : $input_class) !!}"
               data-toggle="tab"
               class="fileinput-tabs"
               data-action="elfinder"
               data-action-id="{!! isset($input_id) ? $input_id : $input_class !!}"
            >
                {!! trans('laravel-modules-core::admin.fields.from_file_manager') !!}
            </a>
        </li>
        <li class="active">
            <a href="#fileinput-content-{!! isset($tab_href) ? $tab_href : (isset($input_id) ? $input_id : $input_class) !!}"
               data-toggle="tab"
               class="fileinput-tabs"
               data-action="fileinput"
               data-action-id="{!! isset($input_id) ? $input_id : $input_class !!}"
            >
                {!! trans('laravel-modules-core::admin.ops.browse') !!}
            </a>
        </li>
    </ul>
    {{-- /Tabs --}}
    
    {{-- Tab Contents --}}
    <div class="tab-content">

        {{-- Fileinput Content --}}
        <div class="tab-pane active" id="fileinput-content-{!! isset($tab_href) ? $tab_href : (isset($input_id) ? $input_id : $input_class) !!}">

            <label class="control-label">{!! $label !!}</label>
            <span class="help-block">
                {!! trans('laravel-modules-core::admin.helpers.fileinput') !!}
            </span>

            {{-- Fileinput file element --}}
            <div class="form-group">
                <input type="file"
                       name="{!! $input_name !!}[]"
                       {!! isset($input_id) ? 'id=' . $input_id : 'class=' . $input_class !!}
                       {!! isset($multiple) &&  $multiple ? 'multiple' : '' !!}
                       {!! isset($fileinputDisable) &&  $fileinputDisable ? 'disabled' : '' !!}
                >
            </div>
            {{-- /Fileinput file element --}}

        </div>
        {{-- /Fileinput Content --}}

        {{-- Elfinder Content --}}
        <div class="tab-pane elfinder_wrapper {!! isset($elfinder) && $elfinder ? '' : 'hidden' !!}" id="elfinder-content-{!! isset($tab_href) ? $tab_href : (isset($input_id) ? $input_id : $input_class) !!}">

            <label class="control-label">{!! $label !!}</label>
            <span class="help-block">
                {!! trans('laravel-modules-core::admin.helpers.elfinder') !!}
            </span>

            <div class="form-group">
                <div class="input-group">
                    <input type="text"
                           name="{!! $input_name !!}"
                           class="form-control form-control-solid placeholder-no-fix elfinder"
                           id="{!! $elfinder_id !!}"
                           readonly
                           placeholder="{!! trans('laravel-modules-core::admin.fields.from_file_manager') !!}"
                           {!! isset($elfinderDisable) &&  $elfinderDisable ? 'disabled' : '' !!}
                    >
                    <div class="input-group-btn">
                        {{-- File Manager --}}
                        <a href="{!! lmbRoute('elfinder.popup',[ 'input_id' => 'fileinput']) !!}"
                           class="tooltips btn blue btn-outline popup_selector"
                           data-original-title="{!! trans('laravel-modules-core::admin.fields.from_file_manager') !!}"
                           data-container="body"
                           data-placement="bottom"
                           data-inputid="{!! $elfinder_id !!}"
                        >
                            <i class="fa fa-folder-open"></i>
                            <span class="hidden-xs">{!! trans('laravel-modules-core::admin.fields.file_manager') !!}</span>
                        </a>
                        {{-- /File Manager --}}
                    </div>
                </div>
            </div>

        </div>
        {{-- /Elfinder Content --}}

    </div>
    {{-- /Tab Contents --}}

</div>