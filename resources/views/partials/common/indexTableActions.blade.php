<div class="table-actions-wrapper">
    <span> </span>
    <select class="table-group-action-input form-control input-inline input-small input-sm">
        <option value="">{!! trans('laravel-modules-core::admin.ops.select') !!}</option>

        @foreach($actions as $action)
            <option value="{!! $action !!}">{!! trans("laravel-modules-core::admin.ops.{$action}") !!}</option>
        @endforeach

    </select>
    <button class="btn btn-sm green btn-outline table-group-action-submit">
        <i class="fa fa-paper-plane"></i>
        <span class="hidden-xs"> {!! trans('laravel-modules-core::admin.ops.submit') !!} </span>
    </button>
</div>