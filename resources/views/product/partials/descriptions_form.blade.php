{{-- Values --}}
<div class="mt-repeater">

    {{-- Repeater Group --}}
    <div data-repeater-list="group-description">

        @forelse ( isset($product) ? $product->descriptions : [] as $description )
            @include('laravel-modules-core::partials.common.description_repeater')
        @empty
            @include('laravel-modules-core::partials.common.description_repeater')
        @endforelse

    </div>
    {{-- /Repeater Group --}}

    {{-- Add Value --}}
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('admin.fields.add_value') !!}
    </a>
    {{-- /Add Value --}}

</div>
{{-- /Values --}}