<h4 class="margin-top-40 margin-bottom-10">{!! lmcTrans('laravel-media-module/admin.fields.media_category.' . ($medias->groupBy('type')->count() > 1 ? 'medias' : $medias->groupBy('type')->keys()->all()[0] . 's')) !!}</h4>

@foreach($medias as $media)
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-bottom-5 element-wrapper margin-bottom-40">
        <div class="mt-element-overlay">
            <div class="mt-overlay-3 mt-overlay-3-icons">
                {!! $media->img !!}
                {!! Form::hidden('media_id[]',$media->id) !!}

                <div class="mt-overlay">
                    <h2>{{ $media->title }}</h2>
                    <ul class="mt-info">
                        {{-- Remove Button --}}
                        <li>
                            <a href="javascript:;" class="btn red btn-outline remove-element" data-element-id="{{ $media->id }}">
                                {!! trans('laravel-modules-core::admin.ops.destroy') !!}
                            </a>
                        </li>
                        {{-- /Remove Button --}}
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endforeach