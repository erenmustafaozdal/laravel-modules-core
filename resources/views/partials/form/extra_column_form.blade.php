@if($parent && $parent->config_propagation)
    {{-- Category Configs --}}
    @for($i = 0; $i < $parent->extras->count(); $i++)
        {!! Form::hidden("group-extra[{$i}][extra_name]", $parent->extras->get($i)->name) !!}
        {!! Form::hidden("group-extra[{$i}][extra_type]", $parent->extras->get($i)->type) !!}
    @endfor
    {{-- /Category Configs --}}
@else

    {{-- Extra Columns --}}
    <div class="mt-repeater margin-top-40">

        {{-- Repeater Group --}}
        <div data-repeater-list="group-extra">

            @forelse ( $model ? $model->extras : [] as $extra )
                @include('laravel-modules-core::partials.form.extra_column_repeater')
            @empty
                @include('laravel-modules-core::partials.form.extra_column_repeater')
            @endforelse

        </div>
        {{-- /Repeater Group --}}

        {{-- Add Value --}}
        <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
            <i class="fa fa-plus"></i> {!! lmcTrans('admin.fields.add_value') !!}
        </a>
        {{-- /Add Value --}}

    </div>
    {{-- /Extra Columns --}}

@endif