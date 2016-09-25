{{-- Dealer Category --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer_category.name') !!}</label>
    {!! Form::hidden('category_id',0) !!}
    <select class="form-control form-control-solid placeholder-no-fix select2me" name="category_id" style="width: 100%">
        @if(isset($dealer) && ! is_null($dealer->category))
            <option value="{{ $dealer->category->id }}" selected>{{ $dealer->category->name_uc_first }}</option>
        @endif
    </select>

    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.category_id_help') !!} </span>
    @endif

</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.category_id_help') !!} </span>
@endif
{{-- /Dealer Category --}}

{{-- Name --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-dealer-module/admin.fields.dealer.name') !!}</label>
    {!! Form::text( 'name', isset($dealer) ? $dealer->name_uc_first : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix',
        'placeholder'   => lmcTrans('laravel-dealer-module/admin.fields.dealer.name')
    ]) !!}
</div>
{{-- /Name --}}

@include('laravel-modules-core::partials.form.address', [
    'model'     => isset($dealer) ? $dealer : null,
    'model_slug'=> 'dealer'
])

{{-- Status --}}
<div class="form-group last">
    <label class="control-label">{!! trans('laravel-modules-core::admin.ops.status') !!}</label>
    <div class="clearfix"></div>
    @if ( ! isset($helpBlockAfter) )
        {!! Form::hidden('is_publish', 0) !!}
    @endif
    {!! Form::checkbox( 'is_publish', 1, isset($dealer) ? $dealer->is_publish : null, [
        'class'         => 'make-switch',
        'data-on-text'  => trans('laravel-modules-core::admin.ops.publish'),
        'data-on-color' => 'success',
        'data-off-text' => trans('laravel-modules-core::admin.ops.not_publish'),
        'data-off-color'=> 'danger',
    ]) !!}
    @if ( ! isset($helpBlockAfter) )
        <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.is_publish_help') !!} </span>
    @endif
</div>
@if ( isset($helpBlockAfter) )
    <span class="help-block"> {!! lmcTrans('laravel-dealer-module/admin.helpers.dealer.is_publish_help') !!} </span>
@endif
{{-- /Status --}}