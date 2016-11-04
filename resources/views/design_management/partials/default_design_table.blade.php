<div class="table-scrollable table-scrollable-borderless">
<table class="table table-hover table-light">

    {{-- Head --}}
    <thead>
    <tr>
        <th>  </th>
        <th> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.default_colors') !!} </th>
        <th> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.current_colors') !!} </th>
    </tr>
    </thead>
    {{-- /Head --}}

    {{-- Body --}}
    <tbody>

    {{-- Site First Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_first_color') !!} </td>
        <td>
            {!! Form::hidden( 'site_first_color', ! $default->site_first_color ? null : $default->site_first_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'site_first_color', ! $design->site_first_color ? null : $design->site_first_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Site First Color --}}

    {{-- Site Second Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_second_color') !!} </td>
        <td>
            {!! Form::hidden( 'site_second_color', ! $default->site_second_color ? null : $default->site_second_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'site_second_color', ! $design->site_second_color ? null : $design->site_second_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Site Second Color --}}

    {{-- Site Complement Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.site_complement_color') !!} </td>
        <td>
            {!! Form::hidden( 'site_complement_color', ! $default->site_complement_color ? null : $default->site_complement_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'site_complement_color', ! $design->site_complement_color ? null : $design->site_complement_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Site Complement Color --}}

    {{-- Hover Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.hover_color') !!} </td>
        <td>
            {!! Form::hidden( 'hover_color', ! $default->hover_color ? null : $default->hover_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'hover_color', ! $design->hover_color ? null : $design->hover_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Hover Color --}}

    {{-- First Footer Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.first_footer_color') !!} </td>
        <td>
            {!! Form::hidden( 'first_footer_color', ! $default->first_footer_color ? null : $default->first_footer_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'first_footer_color', ! $design->first_footer_color ? null : $design->first_footer_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /First Footer Color --}}

    {{-- Second Footer Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.second_footer_color') !!} </td>
        <td>
            {!! Form::hidden( 'second_footer_color', ! $default->second_footer_color ? null : $default->second_footer_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'second_footer_color', ! $design->second_footer_color ? null : $design->second_footer_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Second Footer Color --}}

    {{-- Footer Title Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.footer_title_color') !!} </td>
        <td>
            {!! Form::hidden( 'footer_title_color', ! $default->footer_title_color ? null : $default->footer_title_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'footer_title_color', ! $design->footer_title_color ? null : $design->footer_title_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Footer Title Color --}}

    {{-- Footer Text Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.footer_text_color') !!} </td>
        <td>
            {!! Form::hidden( 'footer_text_color', ! $default->footer_text_color ? null : $default->footer_text_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'footer_text_color', ! $design->footer_text_color ? null : $design->footer_text_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Footer Text Color --}}

    {{-- Ezelnet Link Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.ezelnet_link_color') !!} </td>
        <td>
            {!! Form::hidden( 'ezelnet_link_color', ! $default->ezelnet_link_color ? null : $default->ezelnet_link_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'ezelnet_link_color', ! $design->ezelnet_link_color ? null : $design->ezelnet_link_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Ezelnet Link Color --}}

    {{-- Go Up Color --}}
    <tr>
        <td> {!! lmcTrans('ezelnet-frontend-module/admin.fields.design_management.go_up_color') !!} </td>
        <td>
            {!! Form::hidden( 'go_up_color', ! $default->go_up_color ? null : $default->go_up_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
        <td>
            {!! Form::hidden( 'go_up_color', ! $design->go_up_color ? null : $design->go_up_color,[
                'class' => 'color-picker',
                'disabled'
            ]) !!}
        </td>
    </tr>
    {{-- /Go Up Color --}}

    </tbody>
    {{-- /Body --}}

</table>
</div>