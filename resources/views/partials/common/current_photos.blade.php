@if( isset($model) && ! is_null($model->$relation) )
    <h4>{!! lmcTrans('admin.fields.current_photo',[],$relationType === 'hasMany' ? $model->$relation->count() : 1) !!}</h4>
    <div class="row">

        @foreach( ($relationType === 'hasMany' ? $model->$relation : [$model->$relation]) as $photo )
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 margin-bottom-5 element-wrapper">
                <div class="mt-element-overlay">
                    <div class="mt-overlay-2">
                        {!! $photo->getPhoto([], 'normal', false, $modelSlug, $parentRelation) !!}

                        {{-- Remove Button --}}
                        @if($relationType === 'hasMany' && $model->$relation->count() > 1)
                            <div class="mt-overlay">
                                <a href="javascript:;" class="mt-info btn red btn-outline remove-element" data-element-id="{{ $photo->id }}" data-parent-id="{{ $model->id }}">
                                    {!! trans('laravel-modules-core::admin.ops.destroy') !!}
                                </a>
                            </div>
                        @endif
                        {{-- /Remove Button --}}

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endif