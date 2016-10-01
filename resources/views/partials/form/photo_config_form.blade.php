@if($parent && $parent->config_propagation)
    {{-- Category Configs --}}
    {!! Form::hidden('photo_width', $parent->photo_width) !!}
    {!! Form::hidden('photo_height', $parent->photo_height) !!}
    @for($i = 0; $i < $parent->thumbnails->count(); $i++)
        {!! Form::hidden("group-thumbnail[{$i}][thumbnail_slug]", $parent->thumbnails->get($i)->slug) !!}
        {!! Form::hidden("group-thumbnail[{$i}][thumbnail_width]", $parent->thumbnails->get($i)->width) !!}
        {!! Form::hidden("group-thumbnail[{$i}][thumbnail_height]", $parent->thumbnails->get($i)->height) !!}
    @endfor
    {{-- /Category Configs --}}
@else

    {{-- Aspect Ratio --}}
    <div class="form-group row">

        <div class="col-md-6">
            <label class="control-label"> {!! lmcTrans('admin.fields.aspect_ration_width') !!} </label>
            {!! Form::text( 'photo_width', $model ? $model->photo_width : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.aspect_ration_width'),
                'data-rule-number'=> 'true',
                'data-msg-number' => LMCValidation::getMessage('width','numeric')
            ]) !!}
        </div>

        <div class="col-md-6">
            <label class="control-label"> {!! lmcTrans('admin.fields.aspect_ration_height') !!} </label>
            {!! Form::text( 'photo_height', $model ? $model->photo_height : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.aspect_ration_height'),
                'data-rule-number'=> 'true',
                'data-msg-number' => LMCValidation::getMessage('height','numeric')
            ]) !!}
        </div>

    </div>
    {{-- /Aspect Ratio --}}

    {{-- Photo Thumbnails --}}
    <div class="mt-repeater margin-top-40">

        {{-- Repeater Group --}}
        <div data-repeater-list="group-thumbnail">

            @forelse ( $model ? $model->thumbnails : [] as $thumbnail )
                @include('laravel-modules-core::partials.form.photo_config_repeater')
            @empty
                @include('laravel-modules-core::partials.form.photo_config_repeater')
            @endforelse

        </div>
        {{-- /Repeater Group --}}

        {{-- Add Value --}}
        <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
            <i class="fa fa-plus"></i> {!! lmcTrans('admin.fields.add_value') !!}
        </a>
        {{-- /Add Value --}}

    </div>
    {{-- /Photo Thumbnails --}}

@endif