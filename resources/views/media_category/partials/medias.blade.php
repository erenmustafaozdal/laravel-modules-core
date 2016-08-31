{{-- Media Portfolio --}}

    {{-- Buttons --}}
    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">

        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
            {!! lmcTrans('admin.ops.all') !!}
            <div class="cbp-filter-counter"></div>
        </div>

        <div data-filter=".published" class="cbp-filter-item-active cbp-filter-item">
            {!! lmcTrans('admin.ops.published') !!}
            <div class="cbp-filter-counter"></div>
        </div>

        <div data-filter=".not_published" class="cbp-filter-item-active cbp-filter-item">
            {!! lmcTrans('admin.ops.not_published') !!}
            <div class="cbp-filter-counter"></div>
        </div>

        @foreach($media_category->getDescendants() as $category)
            <div data-filter=".filter{{ $category->id }}" class="cbp-filter-item">
                {{ $category->name_uc_first }}
                <div class="cbp-filter-counter"></div>
            </div>
        @endforeach

    </div>
    {{-- /Buttons --}}

    {{-- Medias --}}
    <div id="js-grid-juicy-projects" class="cbp">

        @foreach($media_category->descendantsAndSelf()->allMedias($media_category->type)->get() as $category)

            @foreach($category->{$media_category->type.'s'} as $media)
                <div class="cbp-item filter{{ $category->id }} {{ $media->media->is_publish ? 'published' : 'not_published' }}">
                    <div class="cbp-caption">
                        <div class="cbp-caption-defaultWrap">
                            {!! $media->embed !!}
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    {{-- Show Button --}}
                                    @if(Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.media_category.media.show"))
                                    <a href="{!! route('admin.media_category.media.show', ['id'=> $media_category->id,config('laravel-media-module.url.media')  => $media->media->id]) !!}"
                                        class="tooltips btn green btn-outline"
                                        data-container="body"
                                        data-original-title="{!! lmcTrans('admin.ops.show') !!}"
                                    >
                                        <i class="fa fa-search"></i>

                                    </a>
                                    @endif
                                    {{-- /Show Button --}}

                                    {{-- Publish or Not Publish Button --}}
                                    @if( ! $media->media->is_publish && ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.media_category.media.publish") ) )
                                    <a href="{!! route('admin.media_category.media.publish', ['id'=> $media_category->id,config('laravel-media-module.url.media')  => $media->media->id]) !!}"
                                       class="tooltips btn blue btn-outline"
                                       data-container="body"
                                       data-original-title="{!! lmcTrans('admin.ops.publish') !!}">
                                        <i class="fa fa-bullhorn"></i>
                                    </a>

                                   @endif
                                    @if( $media->media->is_publish && ( Sentinel::getUser()->is_super_admin || Sentinel::hasAccess("admin.media_category.media.publish") ) )
                                    <a href="{!! route('admin.media_category.media.notPublish', ['id'=> $media_category->id,config('laravel-media-module.url.media')  => $media->media->id]) !!}"
                                       class="tooltips btn purple btn-outline"
                                       data-container="body"
                                       data-original-title="{!! lmcTrans('admin.ops.not_publish') !!}">
                                        <i class="fa fa-times"></i>
                                    </a>

                                   @endif
                                    {{-- /Publish or Not Publish Button --}}

                                    {{-- View Large Button --}}
                                    <a href="{!! $media->{$media_category->type} !!}?autoplay=0"
                                       class="cbp-lightbox btn grey btn-outline tooltips"
                                       data-container="body"
                                       title="{!! lmcTrans('admin.ops.view_large') !!}"
                                       data-title="{{ $media->media->title }}<br>{{ $media->media->description }}"
                                    >
                                        <i class="fa fa-expand"></i>
                                    </a>
                                    {{-- /View Large Button --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-l-grid-projects-title text-center">{{ $media->media->title }}</div>
                    <div class="cbp-l-grid-projects-desc text-center">{{ $media->media->description }}</div>
                </div>
            @endforeach

        @endforeach

    </div>
    {{-- /Medias --}}

{{-- /Media Portfolio --}}