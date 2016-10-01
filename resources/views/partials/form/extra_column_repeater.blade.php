<div data-repeater-item class="mt-repeater-item">

    <div class="form-group row">

        {{-- Column Name --}}
        <div class="col-md-6">
            <label class="control-label">{!! lmcTrans('admin.fields.extra_name') !!}</label>
            {!! Form::text( 'extra_name', isset($extra) ? $extra->name : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('admin.fields.extra_name'),
                'data-rule-alpha_dash'=> 'true',
                'data-msg-alpha_dash' => LMCValidation::getMessage('slug','alpha_dash')
            ]) !!}
        </div>
        {{-- /Column Name --}}

        {{-- Extra Type --}}
        <div class="col-md-5">
            <label class="control-label">{!! lmcTrans('admin.fields.extra_type') !!}</label>
            <select class="form-control form-control-solid placeholder-no-fix"
                    name="extra_type"
                    style="width: 100%;"
            >
                <option selected value="">{!! lmcTrans('admin.ops.select') !!}</option>
                @foreach(config('laravel-modules-base.column_types') as $type)
                    <option value="{!! $type !!}" {{ isset($extra) && $extra->type === $type ? 'selected' : '' }}>
                        {!! lmcTrans("admin.fields.{$type}") !!}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- /Extra Type --}}

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