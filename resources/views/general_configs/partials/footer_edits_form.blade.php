{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.footer_title') !!}
    </label>
    <div class="col-md-9">
        {!! Form::text( 'title', $footer->title, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.footer_title')
        ]) !!}
    </div>
</div>
{{-- /Title --}}

{{-- Has Social Media --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.has_social_media') !!}
    </label>
    <div class="col-md-9">
        {!! Form::hidden('has_social_media',0) !!}
        {!! Form::checkbox( 'has_social_media', 1, $footer->has_social_media, [
            'class'         => 'make-switch',
            'data-on-text'  => '<i class="fa fa-check"></i>',
            'data-on-color' => 'success',
            'data-off-text' => '<i class="fa fa-times"></i>',
            'data-off-color'=> 'danger',
        ]) !!}
    </div>
</div>
{{-- /Has Social Media --}}

<h3>{!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.footer_content') !!}</h3>

<div class="tabbable-line">

    {{-- Tabs --}}
    <ul class="nav nav-tabs tabs-reversed">
        <li {{ $footer->menus->isEmpty() && ! is_null($footer->description) ? '' : 'class=active' }}>
            <a href="#links_{{ $footer->slug }}" data-toggle="tab" data-tab="links" class="tab_footer">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.links') !!}
            </a>
        </li>
        <li {{ is_null($footer->description) ? '' : 'class=active' }}>
            <a href="#description_{{ $footer->slug }}" data-toggle="tab" data-tab="description" class="tab_footer">
                {!! lmcTrans('ezelnet-frontend-module/admin.fields.general_configs.description') !!}
            </a>
        </li>
    </ul>
    {{-- /Tabs --}}

    {{-- Tab Content --}}
    <div class="tab-content">

        {{-- Links --}}
        <div class="tab-pane links {{ $footer->menus->isEmpty() && ! is_null($footer->description) ? '' : 'active' }}"
            id="links_{{ $footer->slug }}"
        >
            <div class="mt-repeater">
                <div data-repeater-list="menus">

                    @forelse ( $footer->menus as $menu )
                        @include('laravel-modules-core::general_configs.partials.footer_edits_link_repeater')
                    @empty
                        @include('laravel-modules-core::general_configs.partials.footer_edits_link_repeater')
                    @endforelse

                </div>

                <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
                    <i class="fa fa-plus"></i> {!! lmcTrans('admin.ops.add') !!}
                </a>
            </div>
        </div>
        {{-- /Links --}}

        {{-- Description --}}
        <div class="tab-pane description {{ is_null($footer->description) ? '' : 'active' }}"
             id="description_{{ $footer->slug }}"
        >
            {!! Form::textarea( 'description', is_null($footer->description) ? null : $footer->description->description, [
                'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
                'placeholder'   => lmcTrans('laravel-product-module/admin.fields.product.short_description'),
                'rows'          => 5,
                'maxlength'     => 255
            ]) !!}
        </div>
        {{-- /Description --}}

    </div>
    {{-- /Tab Content --}}

</div>