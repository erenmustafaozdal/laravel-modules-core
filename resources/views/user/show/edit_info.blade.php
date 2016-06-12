<div id="edit_info" class="tab-pane form">
    {!! Form::open([
        'method'    => 'PATCH',
        'url'       => route('admin.user.update', ['id' => $user->id])
    ]) !!}
        
        {{-- Form Action Top --}}
        <div class="form-actions top">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    {!! Form::button( trans('laravel-modules-core::admin.ops.cancel'), [
                        'class' => 'btn red btn-outline',
                        'type' => 'reset'
                    ]) !!}
                    {!! Form::button( trans('laravel-modules-core::admin.ops.submit'), [
                        'class' => 'btn blue btn-outline',
                        'type' => 'submit'
                    ]) !!}
                </div>
            </div>
        </div>
        {{-- /Form Action Top --}}
        
        {{-- Form Body --}}
        <div class="form-body">
            {{-- First Name --}}
            <div class="form-group">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}</label>
                {!! Form::text( 'first_name', $user->first_name, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix'
                ]) !!}
            </div>
            {{-- /First Name --}}


            {{-- Last Name --}}
            <div class="form-group">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}</label>
                {!! Form::text( 'last_name', $user->last_name, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix'
                ]) !!}
            </div>
            {{-- /Last Name --}}


            {{-- Email --}}
            <div class="form-group">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}</label>
                {!! Form::text( 'email,', $user->email, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix',
                    'disabled'      => 'disabled'
                ]) !!}
                <span class="help-block text-info">
                    {!! lmcTrans('laravel-user-module/admin.helpers.user.email_not_changeable') !!}
                </span>
            </div>
            {{-- /Email --}}

            {{-- Status --}}
            <div class="form-group last">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.status') !!}</label>
                <div class="clearfix"></div>
                {!! Form::checkbox( 'is_active', 1, $user->is_active, [
                    'class'         => 'make-switch',
                    'data-on-text'  => lmcTrans('laravel-user-module/admin.fields.user.active'),
                    'data-on-color' => 'success',
                    'data-off-text' => lmcTrans('laravel-user-module/admin.fields.user.not_active'),
                    'data-off-color'=> 'danger',
                ]) !!}
                <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.is_active_help') !!} </span>
            </div>
            {{-- /Status --}}
        </div>
        {{-- /Form Body --}}
        
        {{-- Form Action Bottom --}}
        <div class="form-actions fluid">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    {!! Form::button( trans('laravel-modules-core::admin.ops.cancel'), [
                        'class' => 'btn red btn-outline',
                        'type' => 'reset'
                    ]) !!}
                    {!! Form::button( trans('laravel-modules-core::admin.ops.submit'), [
                        'class' => 'btn blue btn-outline',
                        'type' => 'submit'
                    ]) !!}
                </div>
            </div>
        </div>
        {{-- /Form Action Bottom --}}
    {!! Form::close() !!}
</div>