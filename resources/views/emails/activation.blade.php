{!! lmcTrans('laravel-user-module/auth.activation.mail_content',[
    'name'  => $user->first_name,
    'id'    => $user->id,
    'code'  => $activation->code,
]) !!}