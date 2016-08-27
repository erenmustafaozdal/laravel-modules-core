{{-- Summary --}}
<h1 class="font-blue sbold uppercase">{{ $document->title_uc_first }}</h1>
<ul class="list-inline">
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.created_at_description', [ 'date' => $document->created_at_for_humans ]) }}
    </li>
    <li>
        <i class="fa fa-calendar"></i>
        {{ trans('laravel-modules-core::admin.fields.updated_at_description', [ 'date' => $document->updated_at_for_humans ]) }}
    </li>
    <li>
        @if ($document->is_publish)
            <i class="fa fa-check font-green"></i>
            {!! trans('laravel-modules-core::admin.ops.published') !!}
        @else
            <i class="fa fa-times font-red"></i>
            {!! trans('laravel-modules-core::admin.ops.not_published') !!}
        @endif
    </li>
</ul>
{{-- /Summary --}}


{{-- Information on Form --}}
<form class="form-horizontal" role="form" action="#">

    {{-- Category --}}
    @if( ! isset($document_category))
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-document-module/admin.fields.document_category.name') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document->category->name_uc_first }} </p>
        </div>
    </div>
    @endif
    {{-- /Category --}}

    {{-- Title --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-document-module/admin.fields.document.title') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document->title_uc_first }} </p>
        </div>
    </div>
    {{-- /Title --}}

    {{-- Document --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! lmcTrans('laravel-document-module/admin.fields.document.document') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $document->getDocument(['target' => '_blank']) !!} </p>
        </div>
    </div>
    {{-- /Document --}}

    {{-- Size --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.size') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                {{ $document->size_for_humans }}
                ({{ $document->size }} {!! trans('laravel-modules-core::admin.fields.byte') !!})
            </p>
        </div>
    </div>
    {{-- /Size --}}

    {{-- Created At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.created_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document->created_at }} </p>
        </div>
    </div>
    {{-- /Created At --}}

    {{-- Updated At --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.fields.updated_at') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {{ $document->updated_at }} </p>
        </div>
    </div>
    {{-- /Updated At --}}

    {{-- Status --}}
    <div class="form-group">
        <label class="col-sm-2 control-label">
            {!! trans('laravel-modules-core::admin.ops.status') !!}
        </label>
        <div class="col-sm-10">
            <p class="form-control-static">
                @if ($document->is_publish)
                    <span class="font-green"> {!! trans('laravel-modules-core::admin.ops.published') !!} </span>
                @else
                    <span class="font-red"> {!! trans('laravel-modules-core::admin.ops.not_published') !!} </span>
                @endif
            </p>
        </div>
    </div>
    {{-- /Status --}}

    @if($document->category->has_description || $document->category->has_photo)
        <h4>{!! trans('laravel-modules-core::admin.fields.detail') !!}</h4>

        {{-- Description --}}
        @if($document->category->has_description)
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-document-module/admin.fields.document.description') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static"> {{ $document->description->description or '' }} </p>
                </div>
            </div>
        @endif
        {{-- /Description --}}

        {{-- Photo --}}
        @if($document->category->has_photo)
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {!! lmcTrans('laravel-document-module/admin.fields.document.photo') !!}
                </label>
                <div class="col-sm-10">
                    <p class="form-control-static">
                        @if(! is_null($document->photo) && ! is_null($document->photo->photo))
                            <a href="{{ $document->photo->getPhoto([],'normal',true,'document','document') }}" class="thumbnail" target="_blank">
                                {!! $document->photo->getPhoto([],'normal',false,'document','document') !!}
                            </a>
                        @endif
                    </p>
                </div>
            </div>
        @endif
        {{-- /Photo --}}
    @endif

</form>
{{-- /Information on Form --}}