@extends(config('laravel-user-module.views.auth.layout'))

@section('title')
    {!! lmcTrans('laravel-user-module/auth.register.title') !!}
@stop

@section('script')
    @parent
    <script type="application/javascript">
        var messagesOfRules = {
            first_name: {
                required: "{!! LMCValidation::getMessage('first_name','required') !!}"
            },
            last_name: {
                required: "{!! LMCValidation::getMessage('last_name','required') !!}"
            },
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
            },
            terms: {
                required: "{!! LMCValidation::getMessage('terms','required') !!}"
            }
        };
        $script.ready('login', function() {
            Auth.initRegister();
        });
    </script>
@endsection

@section('content')
    {!! Form::open([
        'method'    => 'POST',
        'url'       => lmbRoute('postRegister'),
        'class'     => 'register-account-form'
    ]) !!}
        <h3 class="form-title font-green">{!! lmcTrans('laravel-user-module/auth.register.title') !!}</h3>

        {{-- Error Messages --}}
        @include('laravel-modules-core::partials.error_message')
        {{-- /Error Messages --}}

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.register.first_name') !!}</span>
            </label>
            {!! Form::text( 'first_name', null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.register.first_name'),
                'value'         => old('first_name')
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.register.last_name') !!}</span>
            </label>
            {!! Form::text( 'last_name', null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.register.last_name'),
                'value'         => old('last_name')
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.register.email') !!}</span>
            </label>
            {!! Form::email( 'email', null, [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.register.email'),
                'value'         => old('email')
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.register.password') !!}</span>
            </label>
            {!! Form::password( 'password', [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.register.password'),
                'id'            => 'password'
            ]) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">
                <span>{!! lmcTrans('laravel-user-module/auth.register.password_confirmation') !!}</span>
            </label>
            {!! Form::password( 'password_confirmation', [
                'class'         => 'form-control form-control-solid placeholder-no-fix',
                'placeholder'   => lmcTrans('laravel-user-module/auth.register.password_confirmation'),
                'id'            => 'password_confirmation'
            ]) !!}
        </div>
        <div class="form-group margin-top-20 margin-bottom-20">
            <label class="check">
                {!! Form::checkbox('terms') !!}
                {!! lmcTrans('laravel-user-module/auth.register.terms_content') !!}
            </label>
            <div id="register_tnc_error"> </div>
        </div>
        <div class="form-actions">
            <a href="{!! lmbRoute('getLogin') !!}" class="btn btn-default">
                <span>{!! lmcTrans('laravel-user-module/auth.register.login') !!}</span>
            </a>
            {!! Form::button( lmcTrans('laravel-user-module/auth.register.submit'), [
                'class'         => 'btn btn-success uppercase pull-right',
                'type'          => 'submit'
            ]) !!}
        </div>
    {!! Form::close() !!}
@endsection