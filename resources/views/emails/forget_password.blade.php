{!! lmcTrans('laravel-user-module/auth.forget_password.mail_content',[
    'name'  => $user->first_name,
    'token' => $reminder->code
]) !!}