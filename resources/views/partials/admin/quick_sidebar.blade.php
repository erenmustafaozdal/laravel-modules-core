{{-- Toggler Button --}}
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
{{-- /Toggler Button --}}

{{-- Sidebar --}}
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="true">
    <div class="page-quick-sidebar">

        {{-- Tabs --}}
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#fast_management" data-toggle="tab">
                    {!! lmcTrans('admin.fields.fast_management') !!}
                </a>
            </li>
        </ul>
        {{-- /Tabs --}}

        <div class="tab-content">
            
            {{-- Fast Management --}}
            <div class="tab-pane active page-quick-sidebar-chat" id="fast_management">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <ul class="media-list list-items">

                        {{-- Menu --}}
                        @foreach($fastMenus as $menu)
                            @if($auth_user->is_super_admin || Sentinel::hasAccess($menu->permission))
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
            </div>
            {{-- /Fast Management --}}
            
        </div>
    </div>
</div>
{{-- /Sidebar --}}
