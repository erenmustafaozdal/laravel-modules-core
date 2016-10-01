<div data-repeater-item class="mt-repeater-item">

    <div class="form-group row">

        {{-- Thumbnail Slug --}}
        <div class="col-md-5">
            <label class="control-label">{!! lmcTrans('admin.fields.thumbnail_slug') !!}</label>
            {!! Form::text( 'thumbnail_slug', isset($thumbnail) ? $thumbnail->slug : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.thumbnail_slug'),
                'data-rule-alpha_dash'=> 'true',
                'data-msg-alpha_dash' => LMCValidation::getMessage('slug','alpha_dash')
            ]) !!}
        </div>
        {{-- /Thumbnail Slug --}}

        {{-- Thumbnail Width --}}
        <div class="col-md-3">
            <label class="control-label">{!! lmcTrans('admin.fields.thumbnail_width') !!}</label>
            {!! Form::text( 'thumbnail_width', isset($thumbnail) ? $thumbnail->photo_width : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.thumbnail_width'),
                'data-rule-number'=> 'true',
                'data-msg-number' => LMCValidation::getMessage('width','numeric')
            ]) !!}
        </div>
        {{-- /Thumbnail Width --}}

        {{-- Thumbnail Height --}}
        <div class="col-md-3">
            <label class="control-label">{!! lmcTrans('admin.fields.thumbnail_height') !!}</label>
            {!! Form::text( 'thumbnail_height', isset($thumbnail) ? $thumbnail->photo_height : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.thumbnail_height'),
                'data-rule-number'=> 'true',
                'data-msg-number' => LMCValidation::getMessage('height','numeric')
            ]) !!}
        </div>
        {{-- /Thumbnail Height --}}

        {{-- Repeater Delete --}}
        <div class="col-md-1">
            <a href="javascript:;"
               data-repeater-delete
               class="btn red btn-outline mt-repeater-delete tooltips"
               data-container="body"
               data-original-title="{!! lmcTrans('admin.ops.destroy') !!}"
            >
                <i class="fa fa-close"></i>
            </a>
        </div>
        {{-- /Repeater Delete --}}

    </div>

</div>