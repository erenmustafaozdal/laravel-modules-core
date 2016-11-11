<ul class="list-group margin-top-40">

    {{-- Hidden Fixed Menu --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.hidden_fixed') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.hidden_fixed') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/menu/hidden_fixed.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'menu_style', 'hidden_fixed', $design->menu_style === 'hidden_fixed', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Hidden Fixed Menu --}}

    {{-- Soft Fixed Menu --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.soft_fixed') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.soft_fixed') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/menu/soft_fixed.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'menu_style', 'soft_fixed', $design->menu_style === 'soft_fixed', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Soft Fixed Menu --}}

    {{-- Double Fixed Hidden Menu --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.double_fixed_hidden') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.double_fixed_hidden') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/menu/double_fixed_hidden.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'menu_style', 'double_fixed_hidden', $design->menu_style === 'double_fixed_hidden', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Double Fixed Hidden Menu --}}

    {{-- Double Fixed Menu --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.double_fixed') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.double_fixed') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/menu/double_fixed.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'menu_style', 'double_fixed', $design->menu_style === 'double_fixed', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Double Fixed Menu --}}

    {{-- Double Menu --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.double') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.double') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-6 col-sm-6">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/menu/double.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'menu_style', 'double', $design->menu_style === 'double', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

        </div>
    </li>
    {{-- /Double Menu --}}

</ul>