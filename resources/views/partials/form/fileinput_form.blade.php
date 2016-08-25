<div class="tabbable-line margin-bottom-10">

    {{-- Tabs --}}
    <ul class="nav nav-tabs tabs-reversed">
        <li class="elfinder_wrapper">
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

            {{-- template photo preview before crop --}}
            @if(isset($jcrop) && $jcrop)
                <div class="note note-info margin-bottom-25 hidden" id="jcrop-preview">
                    <div class="row">
                        <div class="col-md-8 responsive-1024">
                            <h4>{!! trans('laravel-modules-core::admin.ops.crop_image') !!}</h4>
                            <img class="img-responsive" src="" id="img-jcrop">
                        </div>
                        <div class="col-md-4 responsive-1024" id="preview-pane-wrapper">
                            <div id="preview-pane">
                                <div class="preview-container" {!! isset($ratio) ? 'style="width:150px; height:' . 150/$ratio . 'px"': '' !!}>
                                    <img class="jcrop-preview" src="" id="img-jcrop-preview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 margin-top-10">
                            <button type="button" class="btn red btn-outline" id="image-crop-cancel">
                                <i class="fa fa-times"></i>
                                {!! trans('laravel-modules-core::admin.ops.cancel') !!}
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            {{-- /template photo preview before crop --}}

            {{-- Fileinput file element --}}
            {!! Form::file($input_name, [
                'id'        => $input_id,
                'multiple'  => isset($multiple) ? $multiple : false
            ]) !!}
            {{-- /Fileinput file element --}}

            {{-- Jcrop Form Elements --}}
            @if(isset($jcrop) && $jcrop)
                {!! Form::hidden('x', null, ['id' => 'x']) !!}
                {!! Form::hidden('y', null, ['id' => 'y']) !!}
                {!! Form::hidden('width', null, ['id' => 'width']) !!}
                {!! Form::hidden('height', null, ['id' => 'height']) !!}
            @endif
            {{-- /Jcrop Form Elements --}}

        </div>
        {{-- /Fileinput Content --}}

        {{-- Elfinder Content --}}
        <div class="tab-pane elfinder_wrapper {!! isset($elfinder) && $elfinder ? '' : 'hidden' !!}" id="elfinder-content-{!! $input_name !!}">

            <label class="control-label">{!! $label !!}</label>
            <span class="help-block">
                {!! trans('laravel-modules-core::admin.helpers.elfinder') !!}
            </span>

            <div class="input-group">
                {!! Form::text($input_name, null, [
                    'id'            => $elfinder_id,
                    'class'         => 'form-control form-control-solid placeholder-no-fix elfinder',
                    'readonly'      => true,
                    'placeholder'   => trans('laravel-modules-core::admin.fields.from_file_manager')
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
        {{-- /Elfinder Content --}}

    </div>
    {{-- /Tab Contents --}}

</div>