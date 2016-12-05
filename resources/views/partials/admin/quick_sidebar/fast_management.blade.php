<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
    <ul class="media-list list-items">

        {{-- Menu --}}
        @foreach($fastMenus as $menu)
            @if (hasPermission($menu->permission))
                <li class="media">
                    <a href="{{ $menu->link }}">
                        <i class="{{ $menu->icon }}"></i>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $menu->title }}</h4>
                        </div>
                    </a>
                </li>
            @endif
        @endforeach
        {{-- /Menu --}}

    </ul>
</div>