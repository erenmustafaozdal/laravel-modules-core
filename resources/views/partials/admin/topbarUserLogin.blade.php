<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
    <span class="username username-hide-on-mobile"> {{ $auth_user->first_name }} </span>
    @if( is_null($auth_user->photo) )
        {!! HTML::image(
            'vendor/laravel-modules-core/assets/global/img/avatar.png',
            $auth_user->fullname,
            ['class' => 'img-circle']
        ) !!}
    @else
        {!! HTML::image(
            $auth_user->photo_url,
            $auth_user->fullname,
            ['class' => 'img-circle profile_img']
        ) !!}
    @endif
</a>
<ul class="dropdown-menu dropdown-menu-default">
    @foreach($menu_topbarUserLogin->roots() as $item)
        <li {{ (strpos(Route::currentRouteName(),$item->attribute('active')) !== false) ? 'class=active' : '' }}>
            <a href="{{ $item->url() }}">
                <i class="{{ $item->attribute('data-icon') }}"></i>
                <span>{!! $item->title !!}</span>
            </a>
        </li>
    @endforeach
</ul>