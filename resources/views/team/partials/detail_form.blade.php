{{-- Category Crop Type --}}
{!! Form::hidden('crop_type',isset($team) ? $team->category->crop_type : null, [
    'id'    => 'crop_type'
]) !!}
{{-- /Category Crop Type --}}

<div class="panel-group accordion margin-top-40" id="team_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a id="detail_accordion_toggle" class="accordion-toggle accordion-toggle-styled collapsed"
                   data-toggle="collapse"
                   data-parent="#team_accordion"
                   href="#detail_accordion"
                > {!! lmcTrans('laravel-team-module/admin.fields.team.team_detail') !!} </a>
            </h4>
        </div>
        <div id="detail_accordion" class="panel-collapse collapse">
            <div class="panel-body">

                {{-- Short Description --}}
                <div class="form-group">
                    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.short_description') !!}</label>
                    {!! Form::textarea( 'short_description', isset($team) ? $team->short_description : null, [
                        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
                        'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.short_description'),
                        'rows'          => 5
                    ]) !!}
                    <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.short_description') !!} </span>
                </div>
                {{-- /Short Description --}}

                {{-- Description --}}
                <div class="form-group">
                    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.description') !!}</label>
                    {!! Form::textarea( 'description', isset($team) ? $team->description : null, [
                        'class'         => 'form-control form-control-solid placeholder-no-fix tinymce',
                        'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.description'),
                        'rows'          => 5
                    ]) !!}
                    <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.description') !!} </span>
                </div>
                {{-- /Description --}}

                {{-- Photo --}}
                @include('laravel-modules-core::partials.form.fileinput_form', [
                    'label'         => lmcTrans('laravel-team-module/admin.fields.team.photo'),
                    'input_name'    => 'photo',
                    'input_id'      => 'photo',
                    'elfinder'      => true,
                    'elfinder_id'   => 'elfinder-photo',
                    'multiple'      => true
                ])
                {{-- /Photo --}}

            </div>
        </div>
    </div>
</div>

{{-- Current Photo/Photos --}}
@if(isset($currentPhoto) && $currentPhoto)
    @include('laravel-modules-core::partials.common.current_photos', [
        'model'             => $team,
        'relation'          => 'photos',
        'relationType'      => 'hasMany',
        'modelSlug'         => 'team',   // for ModelDataTrait->getPhoto() function
        'parentRelation'    => 'team_id',// for ModelDataTrait->getPhoto() function
        'hasRibbon'         => true,
        'hasSetMainPhoto'   => true
    ])
@endif
{{-- /Current Photo/Photos --}}