{{-- Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team_category.name') !!}</label>
    <select class="form-control form-control-solid placeholder-no-fix select2me" multiple name="category_id[]" style="width: 100%">
        @if(isset($team))
            @foreach($team->categories as $category)
                <option value="{{ $category->id }}" selected>{{ $category->name_uc_first }}</option>
            @endforeach
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.category_id_help') !!} </span>
@endif
{{-- /Category --}}

{{-- First Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.first_name') !!}</label>
    {!! Form::text( 'first_name', isset($team) ? $team->first_name : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.first_name')
    ]) !!}
</div>
{{-- /First Name --}}

{{-- Last Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.last_name') !!}</label>
    {!! Form::text( 'last_name', isset($team) ? $team->last_name : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.last_name')
    ]) !!}
</div>
{{-- /Last Name --}}

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($team) ? $team->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.is_publish_help') !!} </span>
@endif
{{-- /Status --}}