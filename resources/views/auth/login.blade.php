@extends(config('laravel-user-module.views.auth.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/auth.login.title') !!}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        var messagesOfRules = {
            email: {
                required: "{!! LMCValidation::getMessage('email','required') !!}",
                email: "{!! LMCValidation::getMessage('email','email') !!}"
            },
            password: {
                required: "{!! LMCValidation::getMessage('password','required') !!}",
                minlength: "{!! LMCValidation::getMessage('password','min.string', [':min' => 6]) !!}"
            }
        };
        $script.ready('login', function() {
            Auth.initLogin();
        });
    </script>
@endsection

@section('content')
    {!! Form::open([
        'method'    => 'POST',
        'url'       => route('postLogin'),
        'class'     => 'login-form'
    ]) !!}
        <h3 class="form-title font-green">{!! lmcTrans('laravel-user-module/auth.login.title') !!}</h3>

        {{-- Error Messages --}}
        @include('laravel-modules-core::partials.error_message')
        {{-- /Error Messages --}}

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.login.email') !!}</span>
            </label>
            {!! Form::text( 'email', null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.login.email'),
                'value'         => old('email'),
                'autocomplete'  => 'off'
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.login.password') !!}</span>
            </label>
            {!! Form::password( 'password', [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.login.password'),
                'autocomplete'  => 'off'
            ]) !!}
        </div>
        <div class="form-actions">
            {!! Form::button( lmcTrans('laravel-user-module/auth.login.submit'), [
                'class' => 'btn green uppercase',
                'type' => 'submit'
            ]) !!}
            <label class="rememberme check">
                <input type="checkbox" name="remember" value="1" />
                <span>{!! lmcTrans('laravel-user-module/auth.login.remember') !!}</span>
            </label>
            <a href="{!! route('getForgetPassword') !!}" id="forget-password" class="forget-password">
                <span>{!! lmcTrans('laravel-user-module/auth.login.forget_password') !!}</span>
            </a>
        </div>
        @if(config('laravel-user-module.use_register'))
        <div class="create-account">
            <p>
                <a href="{!! route('getRegister') !!}" id="register-btn" class="uppercase">
                    <span>{!! lmcTrans('laravel-user-module/auth.login.register') !!}</span>
                </a>
            </p>
        </div>
        @endif
    {!! Form::close() !!}
@endsection