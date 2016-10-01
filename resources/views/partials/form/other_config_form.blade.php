@if($parent && $parent->config_propagation)
    {{-- Category Configs --}}
    {!! Form::hidden('description_is_editor', $parent->description_is_editor) !!}
    {!! Form::hidden('config_propagation', $parent->config_propagation) !!}
    {{-- /Category Configs --}}
@else
    <ul class="list-group margin-top-40">

        {{-- Title --}}
        <li class="list-group-item bg-default bg-font-default">
            <h4>{!! lmcTrans('admin.fields.other_configs') !!}</h4>
        </li>
        {{-- /Title --}}

        {{-- Description Is Editor --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('admin.fields.description_is_editor') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('admin.helpers.description_is_editor') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('description_is_editor', 0) !!}
                    {!! Form::checkbox( 'description_is_editor', 1, $model ? $model->description_is_editor : true, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-times"></i>',
                        'data-off-color'=> 'danger'
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Description Is Editor --}}

        {{-- Config Propagation --}}
        <li class="list-group-item">
            <div class="row">

                {{-- Label --}}
                <div class="col-md-4 col-sm-4">
                    <label class="control-label">{!! lmcTrans('admin.fields.config_propagation') !!}</label>
                </div>
                {{-- /Label --}}

                {{-- Help Block --}}
                <div class="col-md-6 col-sm-6">
                    <span class="help-block"> {!! lmcTrans('admin.helpers.config_propagation') !!} </span>
                </div>
                {{-- /Help Block --}}

                {{-- Input --}}
                <div class="col-md-2 col-sm-2">
                    {!! Form::hidden('config_propagation', 0) !!}
                    {!! Form::checkbox( 'config_propagation', 1, $model ? $model->config_propagation : true, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-times"></i>',
                        'data-off-color'=> 'danger'
                    ]) !!}
                </div>
                {{-- /Input --}}

            </div>
        </li>
        {{-- /Config Propagation --}}

    </ul>
@endif