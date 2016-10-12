{{-- Title --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.title') !!}</label>
    {!! Form::text( 'title', isset($menu) ? $menu->title : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-menu-module/admin.fields.menu.title')
    ]) !!}
</div>
{{-- /Title --}}

{{-- Link --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.link') !!}</label>
    {!! Form::text( 'link', isset($menu) ? $menu->link : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-menu-module/admin.fields.menu.link')
    ]) !!}
    <span class="help-block"> {!! lmcTrans('laravel-menu-module/admin.helpers.menu.link') !!} </span>
</div>
{{-- /Link --}}

{{-- Type --}}
@if ( ! isset($menu) || $menu->isRoot())
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.type') !!}</label>
    <div class="input-group">
        <div class="icheck-inline">

            @foreach(config('laravel-menu-module.types') as $type)
            <label>
                {!! Form::radio( 'type', $type, (isset($menu) && $menu->type === $type) || (!isset($menu)&& $type === 'normal') ? true : null, [
                    'class'         => 'icheck',
                    'data-radio'    => 'iradio_line-grey',
                    'data-label'    => lmcTrans("laravel-menu-module/admin.fields.menu.{$type}_menu")
                ]) !!}
            </label>
            @endforeach

        </div>
    </div>
    <span class="help-block"> {!! lmcTrans('laravel-menu-module/admin.helpers.menu.type') !!} </span>
</div>
@else
{!! Form::hidden('type','normal') !!}
@endif
{{-- /Type --}}


@if ( ! isset($menu) || $menu->isRoot())
    {{-- Color --}}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.color') !!}</label>
        <select class="bs-select form-control" data-show-subtext="true" name="color">
            <option value="" {{ (isset($menu) && is_null($menu->colorClass)) || !isset($menu) ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.default') !!}">
                {!! lmcTrans('admin.fields.dark_blue') !!}
            </option>
            <option value="primary" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'primary' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.dark_blue') !!} <span class='label lable-sm label-primary' style='background: #037ac5;'>{!! lmcTrans('admin.fields.dark_blue') !!} </span>">
                {!! lmcTrans('admin.fields.dark_blue') !!}
            </option>
            <option value="info" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'info' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.blue') !!} <span class='label lable-sm label-info' style='background: #0098ca;'>{!! lmcTrans('admin.fields.blue') !!} </span>">
                {!! lmcTrans('admin.fields.blue') !!}
            </option>
            <option value="success" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'success' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.green') !!} <span class='label lable-sm label-success' style='background: #738d00;'>{!! lmcTrans('admin.fields.green') !!} </span>">
                {!! lmcTrans('admin.fields.green') !!}
            </option>
            <option value="warning" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'warning' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.yellow') !!} <span class='label lable-sm label-warning' style='background: #f89406;'>{!! lmcTrans('admin.fields.yellow') !!} </span>">
                {!! lmcTrans('admin.fields.yellow') !!}
            </option>
            <option value="danger" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'danger' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.red') !!} <span class='label lable-sm label-danger' style='background: #c10841;'>{!! lmcTrans('admin.fields.red') !!} </span>">
                {!! lmcTrans('admin.fields.red') !!}
            </option>
        </select>
    </div>
    {{-- /Color --}}

    {{-- Tooltip --}}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.tooltip') !!}</label>
        {!! Form::text( 'tooltip', isset($menu) && !is_null($menu->tooltip) ? $menu->tooltip->tooltip : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
            'placeholder'   => lmcTrans('laravel-menu-module/admin.fields.menu.tooltip'),
            'maxlength'     => 6
        ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-menu-module/admin.helpers.menu.tooltip') !!} </span>
    </div>
    {{-- /Tooltip --}}

    {{-- Column Number --}}
    <div id="menu-column-number" class="form-group {{ isset($menu) && $menu->is_mega_menu ? '' : 'hidden' }}">
        <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.column_number') !!}</label>
        <select class="bs-select form-control" name="column_number">
            <option value="2" {{ isset($menu) && !is_null($menu->columnNumber) && $menu->columnNumber->column_number == 2 ? 'selected' : '' }}> 2 {!! lmcTrans('admin.fields.column') !!} </option>
            <option value="3" {{ isset($menu) && !is_null($menu->columnNumber) && $menu->columnNumber->column_number == 3 ? 'selected' : '' }}> 3 {!! lmcTrans('admin.fields.column') !!} </option>
        </select>
    </div>
    {{-- /Column Number --}}
    
    {{-- Photo --}}
    <div id="menu-photo" class="form-group {{ isset($menu) && $menu->is_mega_menu && $menu->columnNumber->column_number == 2 ? '' : 'hidden' }}">
        @include('laravel-modules-core::partials.form.fileinput_form', [
            'label'         => lmcTrans('laravel-menu-module/admin.fields.menu.photo'),
            'input_name'    => 'photo',
            'input_id'      => 'photo',
            'elfinder'      => true,
            'elfinder_id'   => 'elfinder-photo',
            'multiple'      => false
        ])
    </div>
    {{-- /Photo --}}

@endif


@if(isset($menu) && $menu->type === 'normal' && $menu->getRoot()->type === 'mega')

    <div id="menu-label" class="form-group row {{ isset($menu) && $menu->is_mega_menu ? '' : 'hidden' }}">

        {{-- Label --}}
        <div class="col-md-6">
            <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.label') !!}</label>
            {!! Form::text( 'label', isset($menu) && !is_null($menu->label) ? $menu->label->label : null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-menu-module/admin.fields.menu.label')
            ]) !!}
            <span class="help-block"> {!! lmcTrans('laravel-menu-module/admin.helpers.menu.label') !!} </span>
        </div>
        {{-- /Label --}}

        {{-- Label Color --}}
        <div class="col-md-6">
            <label class="control-label">{!! lmcTrans('laravel-menu-module/admin.fields.menu.label_color') !!}</label>
            <select class="bs-select form-control" data-show-subtext="true" name="label_color">
                <option value="primary" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'primary' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.dark_blue') !!} <span class='label lable-sm label-primary' style='background: #037ac5;'>{!! lmcTrans('admin.fields.dark_blue') !!} </span>">
                    {!! lmcTrans('admin.fields.dark_blue') !!}
                </option>
                <option value="info" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'info' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.blue') !!} <span class='label lable-sm label-info' style='background: #0098ca;'>{!! lmcTrans('admin.fields.blue') !!} </span>">
                    {!! lmcTrans('admin.fields.blue') !!}
                </option>
                <option value="success" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'success' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.green') !!} <span class='label lable-sm label-success' style='background: #738d00;'>{!! lmcTrans('admin.fields.green') !!} </span>">
                    {!! lmcTrans('admin.fields.green') !!}
                </option>
                <option value="warning" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'warning' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.yellow') !!} <span class='label lable-sm label-warning' style='background: #f89406;'>{!! lmcTrans('admin.fields.yellow') !!} </span>">
                    {!! lmcTrans('admin.fields.yellow') !!}
                </option>
                <option value="danger" {{ isset($menu) && !is_null($menu->colorClass) && $menu->colorClass->color_class == 'danger' ? 'selected' : '' }} data-content="{!! lmcTrans('admin.fields.red') !!} <span class='label lable-sm label-danger' style='background: #c10841;'>{!! lmcTrans('admin.fields.red') !!} </span>">
                    {!! lmcTrans('admin.fields.red') !!}
                </option>
            </select>
        </div>
        {{-- /Label Color --}}

    </div>

@endif