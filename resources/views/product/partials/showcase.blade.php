{{-- Showcase --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-product-module/admin.fields.product.showcases') !!}</h3>
    </div>
    <div class="panel-body">
        
        <table class="child-table table table-striped table-bordered table-advance table-hover">
            
            {{-- Table Head --}}
            <thead>
                <tr>
                    <th>{!! lmcTrans('laravel-product-module/admin.fields.product_showcase.name') !!}</th>
                    <th>{!! lmcTrans('laravel-product-module/admin.fields.product_showcase.order') !!}</th>
                </tr>
            </thead>
            {{-- /Table Head --}}

            {{-- Table Body --}}
            <tbody>
            @foreach($product->showcases as $showcase)
                <tr>
                    <td class="highlight"> <div class="warning"> </div> {{ $showcase->name_uc_first }}</td>
                    <td> {{ $showcase->pivot->order }}</td>
                </tr>
            @endforeach
            </tbody>
            {{-- /Table Body --}}
            
        </table>
        
    </div>
</div>
{{-- /Showcase --}}