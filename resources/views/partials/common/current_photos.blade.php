@if( isset($model) && ! is_null($model->$relation) )
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                {!! lmcTrans('admin.fields.current_photo',[],$relationType === 'hasMany' ? $model->$relation->count() : 1) !!}
            </h3>
        </div>
        <div class="panel-body row">

        @foreach( ($relationType === 'hasMany' ? $model->$relation : [$model->$relation]) as $photo )
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 margin-bottom-5 element-wrapper  mt-element-ribbon photo-ribbon">
                <div class="mt-element-overlay">

                    {{-- Ribbon --}}
                    @if( isset($hasRibbon) && $hasRibbon && $photo->id == $model->photo_id )
                    <div class="ribbon ribbon-left ribbon-vertical-left ribbon-shadow ribbon-border-dash-vert ribbon-color-primary uppercase tooltips"
                         data-container="body"
                         data-original-title="{!! trans('laravel-modules-core::admin.fields.main_photo') !!}"
                    >
                        <div class="ribbon-sub ribbon-bookmark"></div>
                        <i class="fa fa-star"></i>
                    </div>
                    @endif
                    {{-- /Ribbon --}}

                    <div class="mt-overlay-2 mt-overlay-2-icons">
                        {!! $photo->getPhoto([], 'normal', false, $modelSlug, $parentRelation) !!}

                        {{-- Remove Button --}}
                        @if($relationType === 'hasMany' && $model->$relation->count() > 1)
                            <div class="mt-overlay">
                                <ul class="mt-info">
                                    
                                    {{-- Destroy Button --}}
                                    <li>
                                        <a href="javascript:;"
                                           class="btn red btn-outline remove-element tooltips"
                                           data-element-id="{{ $photo->id }}"
                                           data-parent-id="{{ $model->id }}"
                                           data-container="body"
                                           data-original-title="{!! trans('laravel-modules-core::admin.ops.destroy') !!}"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </li>
                                    {{-- /Destroy Button --}}
                                    
                                    {{-- Set Main Photo Button --}}
                                    @if(isset($hasSetMainPhoto) && $hasSetMainPhoto && $photo->id != $model->photo_id)
                                    <li>
                                        <a href="javascript:;"
                                           class="btn blue btn-outline set-main-photo tooltips"
                                           data-element-id="{{ $photo->id }}"
                                           data-parent-id="{{ $model->id }}"
                                           data-container="body"
                                           data-original-title="{!! trans('laravel-modules-core::admin.ops.set_main_photo') !!}"
                                        >
                                            <i class="fa fa-share"></i>
                                        </a>
                                    </li>
                                    @endif
                                    {{-- /Set Main Photo Button --}}
                                    
                                </ul>
                            </div>
                        @endif
                        {{-- /Remove Button --}}

                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
@endif