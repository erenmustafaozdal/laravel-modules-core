<ul class="list-group margin-top-40">

    {{-- Business --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.business') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.business') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-3 col-sm-4">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/site/business.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'site_style', 'business', $design->site_style === 'business', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

            {{-- Banner Edit Button --}}
            <div class="col-md32 col-sm-2">
                <a href="{{ $design->site_style === 'business' ? lmbRoute('admin.business.index') : 'javascript:;' }}"
                   class="btn purple btn-outline {{ $design->site_style === 'business' ? '' : 'disabled' }}">
                    <i class="fa fa-pencil"></i>
                    <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.edit_banner') !!} </span>
                </a>
            </div>
            {{-- /Banner Edit Button --}}

        </div>
    </li>
    {{-- /Business --}}

    {{-- Boxed --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.boxed') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.boxed') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-3 col-sm-4">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/site/boxed.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'site_style', 'boxed', $design->site_style === 'boxed', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

            {{-- Banner Edit Button --}}
            <div class="col-md32 col-sm-2">
                <a href="{{ $design->site_style === 'boxed' ? lmbRoute('admin.boxed.index') : 'javascript:;' }}"
                   class="btn purple btn-outline {{ $design->site_style === 'boxed' ? '' : 'disabled' }}">
                    <i class="fa fa-pencil"></i>
                    <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.edit_banner') !!} </span>
                </a>
            </div>
            {{-- /Banner Edit Button --}}

        </div>
    </li>
    {{-- /Boxed --}}

    {{-- Creative --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.creative') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.creative') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-3 col-sm-4">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/site/creative.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'site_style', 'creative', $design->site_style === 'creative', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

            {{-- Banner Edit Button --}}
            <div class="col-md32 col-sm-2">
                <a href="{{ $design->site_style === 'creative' ? lmbRoute('admin.creative.index') : 'javascript:;' }}"
                   class="btn purple btn-outline {{ $design->site_style === 'creative' ? '' : 'disabled' }}">
                    <i class="fa fa-pencil"></i>
                    <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.edit_banner') !!} </span>
                </a>
            </div>
            {{-- /Banner Edit Button --}}

        </div>
    </li>
    {{-- /Creative --}}

    {{-- Display --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.display') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.display') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-3 col-sm-4">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/site/display.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'site_style', 'display', $design->site_style === 'display', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

            {{-- Banner Edit Button --}}
            <div class="col-md32 col-sm-2">
                <a href="{{ $design->site_style === 'display' ? lmbRoute('admin.display.index') : 'javascript:;' }}"
                   class="btn purple btn-outline {{ $design->site_style === 'display' ? '' : 'disabled' }}">
                    <i class="fa fa-pencil"></i>
                    <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.edit_banner') !!} </span>
                </a>
            </div>
            {{-- /Banner Edit Button --}}

        </div>
    </li>
    {{-- /Display --}}

    {{-- Metro --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.metro') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.metro') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-3 col-sm-4">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/site/metro.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'site_style', 'metro', $design->site_style === 'metro', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

            {{-- Banner Edit Button --}}
            <div class="col-md-3 col-sm-3">
                <a href="{{ $design->site_style === 'metro' ? lmbRoute('admin.metro.edit') : 'javascript:;' }}"
                   class="btn purple btn-outline {{ $design->site_style === 'metro' ? '' : 'disabled' }}">
                    <i class="fa fa-pencil"></i>
                    <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.edit_banner') !!} </span>
                </a>
            </div>
            {{-- /Banner Edit Button --}}

        </div>
    </li>
    {{-- /Metro --}}

    {{-- Slider --}}
    <li class="list-group-item bg-grey-steel bg-font-grey-steel">
        <div class="row">

            {{-- Label --}}
            <div class="col-md-4 col-sm-4">
                <label class="control-label">{!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.slider') !!}</label>
                <small class="help-block"> {!! lmcTrans('ezelnet-frontend-module/admin.helpers.design_management.slider') !!} </small>
            </div>
            {{-- /Label --}}

            {{-- Help Block --}}
            <div class="col-md-3 col-sm-3">
                {!! Html::image('/vendor/laravel-modules-core/assets/global/img/design_management/site/slider.jpg',null,[
                    'class' => 'img-responsive'
                ]) !!}
            </div>
            {{-- /Help Block --}}

            {{-- Input --}}
            <div class="col-md-2 col-sm-2">
                {!! Form::radio( 'site_style', 'slider', $design->site_style === 'slider', [
                    'class'         => 'make-switch',
                    'data-on-text'  => '<i class="fa fa-check"></i>',
                    'data-on-color' => 'success',
                    'data-off-text' => '<i class="fa fa-times"></i>',
                    'data-off-color'=> 'danger',
                ]) !!}
            </div>
            {{-- /Input --}}

            {{-- Banner Edit Button --}}
            <div class="col-md32 col-sm-2">
                <a href="{{ $design->site_style === 'slider' ? lmbRoute('admin.slider.index') : 'javascript:;' }}"
                   class="btn purple btn-outline {{ $design->site_style === 'slider' ? '' : 'disabled' }}">
                    <i class="fa fa-pencil"></i>
                    <span class="hidden-xs"> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.edit_banner') !!} </span>
                </a>
            </div>
            {{-- /Banner Edit Button --}}

        </div>
    </li>
    {{-- /Slider --}}

</ul>