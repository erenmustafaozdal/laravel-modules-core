<div class="tabbable-line margin-bottom-10" id="file-upload-management">

    {{-- Tabs --}}
    <ul class="nav nav-tabs tabs-reversed">
        <li class="elfinder_wrapper {!! isset($elfinder) && $elfinder ? '' : 'hidden' !!}">
            <a href="#elfinder-content-{!! $input_name !!}"
               data-toggle="tab"
               class="fileinput-tabs"
               data-action="elfinder"
               data-action-id="{!! $input_id !!}"
            >
                {!! trans('laravel-modules-core::admin.fields.from_file_manager') !!}
            </a>
        </li>
        <li class="active">
            <a href="#fileinput-content-{!! $input_name !!}"
               data-toggle="tab"
               class="fileinput-tabs"
               data-action="fileinput"
               data-action-id="{!! $input_id !!}"
            >
                {!! trans('laravel-modules-core::admin.ops.browse') !!}
            </a>
        </li>
    </ul>
    {{-- /Tabs --}}
    
    {{-- Tab Contents --}}
    <div class="tab-content">

        {{-- Fileinput Content --}}
        <div class="tab-pane active" id="fileinput-content-{!! $input_name !!}">

            <label class="control-label">{!! $label !!}</label>
            <span class="help-block">
                {!! trans('laravel-modules-core::admin.helpers.fileinput') !!}
            </span>

            {{-- Fileinput file element --}}
            <div class="form-group">
                <input type="file"
                       name="{!! $input_name !!}[]"
                       id="{!! $input_id !!}"
                       {!! isset($multiple) &&  $multiple ? 'multiple' : '' !!}
                       {!! isset($fileinputDisable) &&  $fileinputDisable ? 'disabled' : '' !!}
                >
            </div>
            {{-- /Fileinput file element --}}

        </div>
        {{-- /Fileinput Content --}}

        {{-- Elfinder Content --}}
        <div class="tab-pane elfinder_wrapper {!! isset($elfinder) && $elfinder ? '' : 'hidden' !!}" id="elfinder-content-{!! $input_name !!}">

            <label class="control-label">{!! $label !!}</label>
            <span class="help-block">
                {!! trans('laravel-modules-core::admin.helpers.elfinder') !!}
            </span>

            <div class="form-group">
                <div class="input-group">
                    {!! Form::text($input_name, null, [
                        'id'            => $elfinder_id,
                        'class'         => 'form-control form-control-solid placeholder-no-fix elfinder',
                        'readonly'      => true,
                        'placeholder'   => trans('laravel-modules-core::admin.fields.from_file_manager'),
                        'disabled'      => isset($elfinderDisable) &&  $elfinderDisable ? true : false
                    ]) !!}
                    <div class="input-group-btn">
                        {{-- File Manager --}}
                        <a href="{!! route('elfinder.popup',[ 'input_id' => 'fileinput']) !!}"
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