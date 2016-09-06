<div class="btn-group">
    {{-- Action Menu --}}
    <button type="button" class="btn {!! (Cache::get('theme_color')['color'] == '' || Cache::get('theme_color')['color'] == 'light' ? 'red-haze' : 'white') !!} btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
        <span class="hidden-sm hidden-xs">{!! trans('laravel-modules-core::admin.actions') !!}</span>
        <i class="fa fa-angle-down"></i>
    </button>
    <ul class="dropdown-menu pull-right scrollable-menu" role="menu">
        @foreach($menu_action->roots() as $item)

                @if( ! is_null($item->attribute('is-header')) && $item->attribute('is-header'))
                    <li class="dropdown-header">{!! $item->title !!}</li>
                @else
                    <li {!! $item->isActive() ? 'class="active"' : '' !!}>
                        <a href="{!! $item->url() !!}">
                            <i class="{{ $item->attribute('data-icon') }}"></i>
                            <span>{!! $item->title !!}</span>
                        </a>
                    </li>
                @endif

                @if($item->divider)
                    <li role="separator" class="divider"></li>
                @endif

        @endforeach
    </ul>
    {{-- /Action Menu --}}
</div>