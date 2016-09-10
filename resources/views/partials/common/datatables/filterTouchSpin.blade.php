<div class="input-group margin-bottom-5">
    <input type="text"
           class="form-control form-filter input-sm tooltips"
           data-original-title="{!! trans("laravel-modules-core::admin.ops.{$id}_from") !!}"
           title="{!! trans("laravel-modules-core::admin.ops.{$id}_from") !!}"
           data-container="body"
           data-placement="top"
           id="{!! $id !!}_from"
           value=""
           name="{!! $id !!}_from"
    >
</div>
<div class="input-group">
    <input type="text"
           class="form-control form-filter input-sm tooltips"
           data-original-title="{!! trans("laravel-modules-core::admin.ops.{$id}_to") !!}"
           title="{!! trans("laravel-modules-core::admin.ops.{$id}_to") !!}"
           data-container="body"
           data-placement="top"
           id="{!! $id !!}_to"
           value=""
           name="{!! $id !!}_to"
    >
</div>