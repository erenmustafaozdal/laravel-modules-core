<div id="edit_info" class="tab-pane form">
    <form action="{!! route('admin.user.update', ['id' => $user->id]) !!}" method="post">
        
        {{-- Form Action Top --}}
        <div class="form-actions top">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="button" class="btn red btn-outline">
                        {!! trans('laravel-modules-core::admin.ops.cancel') !!}
                    </button>
                    <button type="submit" class="btn blue btn-outline">
                        {!! trans('laravel-modules-core::admin.ops.submit') !!}
                    </button>
                </div>
            </div>
        </div>
        {{-- /Form Action Top --}}
        
        {{-- Form Body --}}
        <div class="form-body">
            {{-- First Name --}}
            <div class="form-group">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.first_name') !!}</label>
                <input type="text" name="first_name" class="form-control" placeholder="{{ $user->first_name }}">
            </div>
            {{-- /First Name --}}


            {{-- Last Name --}}
            <div class="form-group">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.last_name') !!}</label>
                <input type="text" name="last_name" class="form-control" placeholder="{{ $user->last_name }}">
            </div>
            {{-- /Last Name --}}


            {{-- Email --}}
            <div class="form-group">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.email') !!}</label>
                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                <span class="help-block text-info">
                    {!! lmcTrans('laravel-user-module/admin.helpers.user.email_not_changeable') !!}
                </span>
            </div>
            {{-- /Email --}}

            {{-- Status --}}
            <div class="form-group last">
                <label class="control-label">{!! lmcTrans('laravel-user-module/admin.fields.user.status') !!}</label>
                <div class="clearfix"></div>
                <input type="checkbox" class="make-switch" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }}
                       data-on-text="{!! lmcTrans('laravel-user-module/admin.fields.user.active') !!}"
                       data-on-color="success"
                       data-off-text="{!! lmcTrans('laravel-user-module/admin.fields.user.not_active') !!}"
                       data-off-color="danger"
                >
                <span class="help-block"> {!! lmcTrans('laravel-user-module/admin.helpers.user.is_active_help') !!} </span>
            </div>
            {{-- /Status --}}
        </div>
        {{-- /Form Body --}}
        
        {{-- Form Action Bottom --}}
        <div class="form-actions fluid">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="button" class="btn red btn-outline">
                        {!! trans('laravel-modules-core::admin.ops.cancel') !!}
                    </button>
                    <button type="submit" class="btn blue btn-outline">
                        {!! trans('laravel-modules-core::admin.ops.submit') !!}
                    </button>
                </div>
            </div>
        </div>
        {{-- /Form Action Bottom --}}
    </form>
</div>