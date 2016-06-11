<ul class="page-sidebar-menu"
    data-keep-expanded="false"
    data-auto-scroll="true"
    data-slide-speed="200"
>
    @foreach($menu_sidebar->roots() as $item)
    {{-- Menu Item --}}
    <li class="nav-item {!! strpos(Route::currentRouteName(),$item->attribute('active')) !== false ? 'active open' : '' !!}">
        <a href="{!! $item->url() !!}" class="nav-link nav-toggle">
            <i class="{!! $item->attribute('data-icon') !!}"></i>
            <span class="title">{!! $item->title !!}</span>
            @if($item->hasChildren()) <span class="arrow"></span> @endif
        </a>
        {{-- Sub Menu Item --}}
        @if($item->hasChildren())
        <ul class="sub-menu">
            @foreach($item->children() as $child)
            <li class="nav-item start  {!! strpos(Route::currentRouteName(),$child->attribute('active')) !== false ? 'active' : '' !!}">
                <a href="{!! $child->url() !!}" class="nav-link ">
                    <i class="{!! $child->attribute('data-icon') !!}"></i>
                    <span class="title">{!! $child->title !!}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        {{-- /Sub Menu Item --}}
    </li>
    {{-- /Menu Item --}}
    @endforeach
</ul>