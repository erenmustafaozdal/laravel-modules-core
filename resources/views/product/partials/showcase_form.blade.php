{{-- Helpers --}}
<div class="note note-info">
    {!! lmcTrans('laravel-product-module/admin.helpers.product_showcase.type') !!}

    <dl>
        @foreach(config('laravel-product-module.product_showcase.type') as $type)
            <dt>{!! lmcTrans("laravel-product-module/admin.fields.product_showcase.{$type}") !!}</dt>
            <dd>{!! lmcTrans("laravel-product-module/admin.helpers.product_showcase.{$type}") !!}</dd>
        @endforeach
    </dl>
</div>
{{-- /Helpers --}}

@foreach(\App\ProductShowcase::all() as $showcase)

    {{-- Showcase --}}
    <div class="form-group row">

        {{-- Showcase Name --}}
        <div class="col-md-12">
            <label class="control-label">{{ $showcase->name_uc_first }}</label>
        </div>
        {{-- /Showcase Name --}}

        {{-- Showcase Type --}}
        <div class="col-md-6">
            <div class="input-group select2-bootstrap-prepend">
                <span class="input-group-addon">
                    <input type="checkbox" class="showcase-checkbox" {{ isset($product) && $showcase->getProduct($product->id) ? 'checked' : '' }}>
                </span>
                <select class="form-control form-control-solid placeholder-no-fix select2showcase select2me showcase-type"
                        name="showcase_id[{{ $showcase->id }}][type]"
                        style="width: 100%;"
                        {{ isset($product) && $showcase->getProduct($product->id) ? '' : 'disabled' }}
                >
                    <option></option>
                    @foreach(config('laravel-product-module.product_showcase.type') as $type)
                        <option value="{!! $type !!}">
                            {!! lmcTrans("laravel-product-module/admin.fields.product_showcase.{$type}") !!}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- /Showcase Type --}}

        {{-- Showcase Order --}}
        <div class="col-md-6">
            <input type="text"
                   name="showcase_id[{{ $showcase->id }}][order]"
                   class="form-control form-control-solid placeholder-no-fix showcase-order"
                   placeholder="{!! lmcTrans('laravel-product-module/admin.fields.product_showcase.order') !!}"
                   {{ isset($product) && $showcase->getProduct($product->id) ? '' : 'disabled' }}
                    value="{{ isset($product) && $showcase->getProduct($product->id) ? $showcase->getProduct($product->id)->pivot->order : null }}"
            >
        </div>
        {{-- /Showcase Order --}}

    </div>
    {{-- /Showcase --}}

@endforeach