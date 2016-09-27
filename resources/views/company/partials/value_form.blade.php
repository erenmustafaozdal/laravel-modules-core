{{-- Values --}}
<div class="mt-repeater">
    
    {{-- Repeater Group --}}
    <div data-repeater-list="group-value">

        @forelse ( ! is_null($company) ? $company->values : [] as $value )
            @include('laravel-modules-core::company.partials.value_repeater')
        @empty
            @include('laravel-modules-core::company.partials.value_repeater')
        @endforelse

    </div>
    {{-- /Repeater Group --}}

    {{-- Add Value --}}
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-company-module/admin.fields.company.add_value') !!}
    </a>
    {{-- /Add Value --}}

</div>
{{-- /Values --}}