{{-- Toggler Button --}}
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
{{-- /Toggler Button --}}

{{-- Sidebar --}}
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="true">
    <div class="page-quick-sidebar">

        {{-- Tabs --}}
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#fast_management" data-toggle="tab">
                    {!! lmcTrans('admin.fields.fast_management') !!}
                </a>
            </li>
            <li>
                <a href="javascript:;" data-target="#general_options" data-toggle="tab">
                    {!! lmcTrans('admin.fields.general_options') !!}
                </a>
            </li>
        </ul>
        {{-- /Tabs --}}

        <div class="tab-content">
            
            {{-- Fast Management --}}
            <div class="tab-pane active page-quick-sidebar-chat" id="fast_management">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <ul class="media-list list-items">

                        {{-- Menu --}}
                        @foreach($fastMenus as $menu)
                            @if($auth_user->is_super_admin || Sentinel::hasAccess($menu->permission))
                            <li class="media">
                                <a href="{{ $menu->link }}">
                                    <i class="{{ $menu->icon }}"></i>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $menu->title }}</h4>
                                    </div>
                                </a>
                            </li>
                            @endif
                        @endforeach
                        {{-- /Menu --}}

                    </ul>
                </div>
            </div>
            {{-- /Fast Management --}}

            {{-- General Options --}}
            <div class="tab-pane page-quick-sidebar-settings" id="general_options">
                <div class="page-quick-sidebar-settings-list">

                    {!! Form::open([
                        'method'=> 'POST',
                        'url'   => lmbRoute('admin.general_configs.generalOptionsUpdate'),
                        'class' => 'form-horizontal form-bordered'
                    ]) !!}

                    {{-- Coming Soon --}}
                    <h3 class="list-heading">{!! lmcTrans('admin.fields.coming_soon') !!}</h3>
                    {{-- /Coming Soon --}}

                    <ul class="list-items borderless">

                        <li>
                            {!! lmcTrans('admin.fields.coming_soon_is_active') !!}
                            {!! Form::hidden('options[coming_soon][is_active]',0) !!}
                            {!! Form::checkbox( 'options[coming_soon][is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->is_active, [
                                'class'         => 'make-switch',
                                'data-on-text'  => '<i class="fa fa-check"></i>',
                                'data-on-color' => 'success',
                                'data-off-text' => '<i class="fa fa-times"></i>',
                                'data-off-color'=> 'danger',
                                'data-size'     => 'small'
                            ]) !!}
                        </li>
                        <li>
                            {!! Form::text( 'options[coming_soon][title]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->title : null, [
                                'class'         => 'form-control input-sm form-control-solid placeholder-no-fix',
                                'placeholder'   => lmcTrans('admin.fields.coming_soon_title'),
                                'maxlength'     => 255
                            ]) !!}
                        </li>
                        <li>
                            {!! Form::textarea( 'options[coming_soon][message]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->message : null, [
                                'class'         => 'form-control input-sm form-control-solid placeholder-no-fix',
                                'placeholder'   => lmcTrans('admin.fields.coming_soon_message'),
                                'rows'          => 2,
                                'maxlength'     => 255
                            ]) !!}
                        </li>
                        <li>
                            <div class="input-group date date-time-picker">
                                {!! Form::text( 'options[coming_soon][date]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->coming_soon_date : null, [
                                    'class'         => 'form-control',
                                    'placeholder'   => lmcTrans('admin.fields.coming_soon_date'),
                                    'maxlength'     => 255,
                                    'readonly'      => true
                                ]) !!}
                                <span class="input-group-btn">
                                    <button class="btn green date-set" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </li>
                        <li>
                            {!! lmcTrans('admin.fields.coming_soon_social_is_active') !!}
                            {!! Form::hidden('options[coming_soon][social_is_active]',0) !!}
                            {!! Form::checkbox( 'options[coming_soon][social_is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->social_is_active, [
                                'class'         => 'make-switch',
                                'data-on-text'  => '<i class="fa fa-check"></i>',
                                'data-on-color' => 'success',
                                'data-off-text' => '<i class="fa fa-times"></i>',
                                'data-off-color'=> 'danger',
                                'data-size'     => 'small'
                            ]) !!}
                        </li>
                        <li>
                            {!! Form::text( 'options[coming_soon][social_message]', isset($generalOptions->options_array->coming_soon) ? $generalOptions->options_array->coming_soon->social_message : null, [
                                'class'         => 'form-control input-sm form-control-solid placeholder-no-fix',
                                'placeholder'   => lmcTrans('admin.fields.coming_soon_social_message'),
                                'maxlength'     => 255
                            ]) !!}
                        </li>
                        <li>
                            {!! lmcTrans('admin.fields.coming_soon_phone_is_active') !!}
                            {!! Form::hidden('options[coming_soon][phone_is_active]',0) !!}
                            {!! Form::checkbox( 'options[coming_soon][phone_is_active]', 1, isset($generalOptions->options_array->coming_soon) && $generalOptions->options_array->coming_soon->phone_is_active, [
                                'class'         => 'make-switch',
                                'data-on-text'  => '<i class="fa fa-check"></i>',
                                'data-on-color' => 'success',
                                'data-off-text' => '<i class="fa fa-times"></i>',
                                'data-off-color'=> 'danger',
                                'data-size'     => 'small'
                            ]) !!}
                        </li>
                    </ul>
                    <div class="inner-content">
                        {!! Form::button( '<i class="icon-settings"></i> <span class="hidden-xs">' . trans('laravel-modules-core::admin.ops.save') . '</span>', [
                            'class' => 'btn green',
                            'type' => 'submit'
                        ]) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            {{-- /General Options --}}
            
        </div>
    </div>
</div>
{{-- /Sidebar --}}
