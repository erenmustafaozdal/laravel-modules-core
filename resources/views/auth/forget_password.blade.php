@extends(config('laravel-user-module.views.auth.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/auth.forget_password.title') !!}
@stop

@section('script')
    @parent
    <script type="application/javascript">
        var messagesOfRules = {
            email: {
                required: "{!! LMCValidation::getMessage('email','required') !!}",
                email: "{!! LMCValidation::getMessage('email','email') !!}"
            }
        };
        $script.ready('login', function() {
            Auth.initForgetPassword();
        });
    </script>
@endsection

@section('content')
    {!! Form::open([
        'method'    => 'POST',
        'url'       => route('postForgetPassword'),
        'class'     => 'forget-password-form'
    ]) !!}
        <h3 class="form-title font-green">{!! lmcTrans('laravel-user-module/auth.forget_password.title') !!}</h3>
        <p>{!! lmcTrans('laravel-user-module/auth.forget_password.message') !!}</p>

        {{-- Error Messages --}}
        @include('laravel-modules.core::partials.error_message')
        {{-- /Error Messages --}}

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.forget_password.email') !!}</span>
            </label>
            {!! Form::text( 'email', null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.forget_password.email'),
                'value'         => old('email'),
                'autocomplete'  => 'off'
            ]) !!}
        </div>
        <div class="form-actions">
            <a href="{!! route('getLogin') !!}" class="btn btn-default">
                <span>{!! lmcTrans('laravel-user-module/auth.forget_password.login') !!}</span>
            </a>
            {!! Form::button( lmcTrans('laravel-user-module/auth.forget_password.submit'), [
                'class' => 'btn btn-success uppercase pull-right',
                'type' => 'submit'
            ]) !!}
        </div>
    {!! Form::close() !!}
@endsection