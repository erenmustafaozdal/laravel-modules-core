<a name="{{ $section->slug }}"></a>
<div id="{{ $section->id }}" class="portlet portlet-sortable light bordered {{ ! $section->is_active ? 'bg-inverse portlet-sortable-disabled' : '' }}">

    {{-- Title --}}
    <div class="portlet-title">

        {{-- Caption --}}
        <div class="caption margin-right-10">
            <i class="fa fa-puzzle-piece font-red"></i>
            <span class="caption-subject font-red"> {{ $section->name_uc_first }} </span>
        </div>
        {{-- /Caption --}}
        
        {{-- Action --}}
        <div class="actions">
            <div class="inputs">
                
                {{-- Title --}}
                <div class="portlet-input input-inline input-medium">
                    {!! Form::text('section_title', $section->title,[
                        'class'         => 'form-control form-control-solid placeholder-no-fix section-title',
                        'placeholder'   => lmcTrans('ezelnet-frontend-module/admin.fields.page_management.title')
                    ]) !!}
                </div>
                {{-- /Title --}}
                
                {{-- Activate --}}
                <div class="portlet-input input-inline">
                    {!! Form::checkbox( 'section_is_active', 1, $section->is_active, [
                        'class'         => 'make-switch switch-is-active',
                        'data-on-text'  => trans('laravel-modules-core::admin.ops.active'),
                        'data-on-color' => 'success',
                        'data-off-text' => trans('laravel-modules-core::admin.ops.not_active'),
                        'data-off-color'=> 'danger',
                    ]) !!}
                </div>
                {{-- /Activate --}}
                
                {{-- Copy --}}
                @if(in_array($section->slug, config('ezelnet-frontend-module.copied_sections')))
                    <div class="portlet-input input-inline">
                        {!! Form::open([
                            'method'=> 'POST',
                            'url'   => lmbRoute('admin.page_management.copySection', [
                                'id'    => $section->id,
                                'form'  => $section->slug
                            ]),
                            'id'    => "copy_section_{$section->slug}"
                        ]) !!}
                        {!! Form::button( '<i class="fa fa-clone"></i> <span class="hidden-xs">' . lmcTrans('admin.ops.copy') . '</span>', [
                            'class' => 'btn purple btn-outline',
                            'type' => 'submit',
                            'onclick'   => 'bootbox.confirm("' . lmcTrans('admin.ops.copy_confirmation') . '", function(r) { if(r) $("form#copy_section_' . $section->slug . '").submit(); }); return false;'
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
                @endif
                {{-- /Copy --}}

                {{-- Remove --}}
                @if($section->copied_id > 0)
                    <div class="portlet-input input-inline">
                        {!! Form::open([
                            'method'=> 'POST',
                            'url'   => lmbRoute('admin.page_management.removeSection', [
                                'id'    => $section->id,
                                'form'  => $section->slug
                            ]),
                            'id'    => "destroy_section_{$section->slug}"
                        ]) !!}
                        {!! Form::button( '<i class="fa fa-times"></i> <span class="hidden-xs">' . lmcTrans('admin.ops.destroy') . '</span>', [
                            'class'     => 'btn red btn-outline',
                            'type'      => 'submit',
                            'onclick'   => 'bootbox.confirm("' . lmcTrans('admin.ops.destroy_confirmation') . '", function(r) { if(r) $("form#destroy_section_' . $section->slug . '").submit(); }); return false;'
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
                @endif
                {{-- /Remove --}}
                
            </div>
        </div>
        {{-- /Action --}}

    </div>
    {{-- /Title --}}
    
    {{-- Body --}}
    <div class="portlet-body form">

        {{-- Error Messages --}}
        @if (Request::get('section') === $section->slug)
            @include('laravel-modules-core::partials.error_message')
        @endif
        {{-- /Error Messages --}}

        @if($section->getDescendants()->count() === 0)
            @include('laravel-modules-core::page_management.section_accordion', [
                'model'     => $section
            ])
        @else
            <div class="row">
                @foreach($section->getDescendants() as $subSection)
                    <div class="col-md-{{ 12/$section->getDescendants()->count() }}">
                        @include('laravel-modules-core::page_management.section_accordion', [
                            'model'     => $subSection
                        ])
                    </div>
                @endforeach
            </div>
        @endif

    </div>
    {{-- /Body --}}

</div>