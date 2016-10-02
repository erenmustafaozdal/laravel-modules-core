@if($category)

<?php $relation = $model ? getModelSlug($model) . 's' : '';?>

@foreach($category->ancestorsAndSelf()->extrasWithValues($model)->get() as $ancestorCategory)

    @foreach($ancestorCategory->extras as $extra)

        {{-- Extra Column --}}
        <div class="form-group">
            <label class="control-label"> {{ $extra->name_uc_first }} </label>

            {{-- Input Element --}}
            @if($extra->type === 'date')
                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                    {!! Form::text( "extras[{$extra->id}][value]", $model && ! is_null($extra->$relation->first()) ? $extra->$relation->first()->pivot->value : null, [
                        'class'         => 'form-control form-filter',
                        'placeholder'   => $extra->name_uc_first,
                        'readonly'      => true
                    ]) !!}
                    <span class="input-group-btn">
                        <button class="btn green btn-outline" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
            @else
                {!! Form::text( "extras[{$extra->id}][value]", $model && ! is_null($extra->$relation->first()) ? $extra->$relation->first()->pivot->value : null, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix',
                    'placeholder'   => $extra->name_uc_first
                ]) !!}
            @endif
            {{-- /Input Element --}}

        </div>
        {{-- /Extra Column --}}

    @endforeach

@endforeach

@endif