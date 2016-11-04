{{-- Social Account --}}
@foreach($accounts as $account)
    <div class="form-group">
        <label class="col-md-3 control-label"> {{ $account->name_uc_first }} </label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-btn">
                    {!! Form::hidden("{$account->slug}[is_active]",0) !!}
                    {!! Form::checkbox( "{$account->slug}[is_active]", 1, $account->is_active, [
                        'class'         => 'make-switch',
                        'data-on-text'  => '<i class="fa fa-check"></i>',
                        'data-on-color' => 'success',
                        'data-off-text' => '<i class="fa fa-times"></i>',
                        'data-off-color'=> 'danger',
                    ]) !!}
                </span>
                {!! Form::text( "{$account->slug}[url]", $account->url, [
                    'class'         => 'form-control form-control-solid placeholder-no-fix input-group-element',
                    'placeholder'   => $account->name
                ]) !!}
            </div>
        </div>
    </div>
@endforeach
{{-- /Social Account --}}