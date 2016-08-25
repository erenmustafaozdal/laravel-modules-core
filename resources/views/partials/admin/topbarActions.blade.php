<div class="btn-group">
    {{-- Action Menu --}}
    <button type="button" class="btn red-haze btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
        <span class="hidden-sm hidden-xs">{!! trans('laravel-modules-core::admin.actions') !!}</span>
        <i class="fa fa-angle-down"></i>
    </button>
    <ul class="dropdown-menu pull-right" role="menu">
        @foreach($menu_actions->roots() as $item)
            <li {!! $item->isActive() ? 'class="active"' : '' !!}>
                <a href="{!! $item->url() !!}">
                    <i class="{{ $item->attribute('data-icon') }}"></i>
                    <span>{!! $item->title !!}</span>
                </a>
            </li>
        @endforeach
    </ul>
    {{-- /Action Menu --}}
</div>