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
            @if(hasPermission('admin.general_configs.generalOptionsUpdate'))
            <li>
                <a href="javascript:;" data-target="#general_options" data-toggle="tab">
                    {!! lmcTrans('admin.fields.general_options') !!}
                </a>
            </li>
            @endif
            {{-- Youtube Education Videos --}}
            <li>
                <a href="javascript:;" data-target="#education_videos" data-toggle="tab">
                    Eğitim Videoları
                </a>
            </li>
            {{-- /Youtube Education Videos --}}
        </ul>
        {{-- /Tabs --}}

        <div class="tab-content">
            
            {{-- Fast Management --}}
            <div class="tab-pane active page-quick-sidebar-chat" id="fast_management">
                @include('laravel-modules-core::partials.admin.quick_sidebar.fast_management')
            </div>
            {{-- /Fast Management --}}

            {{-- General Options --}}
            @if(hasPermission([
                'admin.general_configs.generalOptionsUpdate',
                'admin.general_configs.resetSystemDatas',
                'admin.general_configs.loadDemoDatas',
            ]))
            <div class="tab-pane page-quick-sidebar-settings" id="general_options">
                <div class="page-quick-sidebar-settings-list" data-handle-color="#76be1e">

                    {{-- System Datas --}}
                    @include('laravel-modules-core::partials.admin.quick_sidebar.system_datas')
                    {{-- /System Datas --}}

                    {{-- Coming Soon --}}
                    @include('laravel-modules-core::partials.admin.quick_sidebar.coming_soon')
                    {{-- /Coming Soon --}}

                </div>
            </div>
            @endif
            {{-- /General Options --}}

            {{-- Youtube Education Videos --}}
            <div class="tab-pane page-quick-sidebar-videos" id="education_videos">
                <div class="page-quick-sidebar-videos-list" data-handle-color="#76be1e">
                    @include('laravel-modules-core::partials.admin.quick_sidebar.education_videos')
                </div>
            </div>
            {{-- /Youtube Education Videos --}}
            
        </div>
    </div>
</div>
{{-- /Sidebar --}}
