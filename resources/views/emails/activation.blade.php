{!! str_replace(
    [':name',':id',':code'],
    [$user->first_name,$user->id,$activation->code],
    trans('laravel-modules-core::laravel-user-module/auth.activation.mail_content'))
!!}