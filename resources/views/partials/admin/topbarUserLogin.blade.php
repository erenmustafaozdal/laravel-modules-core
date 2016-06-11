<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
    <span class="username username-hide-on-mobile"> {{ $auth_user->first_name }} </span>
    {!! $auth_user->getPhoto([
        'class' => 'img-circle',
        'alt'   => $auth_user->fullname
    ]) !!}
</a>
<ul class="dropdown-menu dropdown-menu-default">
    @foreach($menu_topbarUserLogin->roots() as $item)
        <li>
            <a href="{{ $item->url() }}">
                <i class="{{ $item->attribute('data-icon') }}"></i>
                <span>{!! $item->title !!}</span>
            </a>
        </li>
    @endforeach
</ul>