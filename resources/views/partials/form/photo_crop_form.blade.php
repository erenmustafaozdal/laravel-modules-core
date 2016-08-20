<label class="control-label">{!! $label !!}</label>
{{-- template photo preview before crop --}}
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
{{-- /template photo preview before crop --}}

{{-- Fileinput file element --}}
{!! Form::file('photo', ['id' => 'photo']) !!}
{{-- /Fileinput file element --}}

{{-- Jcrop Form Elements --}}
{!! Form::hidden('x', null, ['id' => 'x']) !!}
{!! Form::hidden('y', null, ['id' => 'y']) !!}
{!! Form::hidden('width', null, ['id' => 'width']) !!}
{!! Form::hidden('height', null, ['id' => 'height']) !!}
{{-- /Jcrop Form Elements --}}

