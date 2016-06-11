@extends(config('laravel-user-module.views.auth.layout'))

@section('title')
    {!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.title') !!}
@stop

@section('script')
    @parent
    <script type="application/javascript">
        var messagesOfRules = {
            email: {
                required: "{!! LMCValidation::getMessage('email','required') !!}",
                email: "{!! LMCValidation::getMessage('email','email') !!}"
            },
            password: {
                required: "{!! LMCValidation::getMessage('password','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password','min.string', [':min' => 6]) !!}"
            },
            password_confirmation: {
                required: "{!! LMCValidation::getMessage('password_confirmation','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password_confirmation','min.string', [':min' => 6]) !!}",
                equalTo: "{!! LMCValidation::getMessage('password','confirmed') !!}"
            }
        };
        $script.ready('login', function() {
            Auth.initResetPassword();
        });
    </script>
@endsection

@section('content')
    {!! Form::open([
        'method'    => 'POST',
        'url'       => route('postResetPassword'),
        'class'     => 'reset-password-form'
    ]) !!}
        {!! Form::hidden( 'token', $token) !!}
        <h3 class="form-title font-green">{!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.title') !!}</h3>
        <p>{!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.message') !!}</p>

        {{-- Error Messages --}}
        @include('laravel-modules.core::partials.error_message')
        {{-- /Error Messages --}}

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.email') !!}</span>
            </label>
            {!! Form::text( 'email', null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => trans('laravel-modules-core::laravel-user-module/auth.forget_password.email'),
                'value'         => old('email'),
                'autocomplete'  => 'off'
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.password') !!}</span>
            </label>
            {!! Form::password( 'password', [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => trans('laravel-modules-core::laravel-user-module/auth.reset_password.password'),
                'autocomplete'  => 'off',
                'id'            => 'password'
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.password_confirmation') !!}</span>
            </label>
            {!! Form::password( 'password_confirmation', [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => trans('laravel-modules-core::laravel-user-module/auth.reset_password.password_confirmation'),
                'autocomplete'  => 'off',
                'id'            => 'password_confirmation'
            ]) !!}
        </div>
        <div class="form-actions">
            <a href="{!! route('getLogin') !!}" class="btn btn-default">
                <span>{!! trans('laravel-modules-core::laravel-user-module/auth.reset_password.login') !!}</span>
            </a>
            {!! Form::button( trans('laravel-modules-core::laravel-user-module/auth.reset_password.submit'), [
                'class' => 'btn btn-success uppercase pull-right',
                'type' => 'submit'
            ]) !!}
        </div>
    {!! Form::close() !!}
@endsection