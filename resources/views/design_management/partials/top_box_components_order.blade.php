<div class="row">

    {{-- Components List --}}
    <div class="col-md-4 col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.components') !!}
            </div>
            <div id="top_box_components" class="panel-body top_box_components">

                @foreach($components->where('location',null) as $component)
                    @include('laravel-modules-core::design_management.partials.top_box_component')
                @endforeach

            </div>
        </div>
    </div>
    {{-- /Components List --}}

    {{-- Left Column --}}
    <div class="col-md-4 col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.top_box_left') !!}
            </div>
            <div id="top_box_left" class="panel-body top_box_components">

                @foreach($components->where('location','left') as $component)
                    @include('laravel-modules-core::design_management.partials.top_box_component')
                @endforeach

            </div>
        </div>
    </div>
    {{-- /Left Column --}}

    {{-- Right Column --}}
    <div class="col-md-4 col-sm-4">
        <div class=" panel panel-default">
            <div class="panel-heading">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.top_box_right') !!}
            </div>
            <div id="top_box_right" class="panel-body top_box_components">

                @foreach($components->where('location','right') as $component)
                    @include('laravel-modules-core::design_management.partials.top_box_component')
                @endforeach

            </div>
        </div>
    </div>
    {{-- /Right Column --}}

</div>