<div class="modal fade" id="not-permission" role="dialog" aria-labelledby="editor-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{!! trans('laravel-modules-core::admin.fields.not_permission') !!}</h4>
            </div>
            <div class="modal-body">
                {!! lmcTrans('admin.helpers.not_permission') !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red btn-outline" data-dismiss="modal">{!! trans('laravel-modules-core::admin.ops.ok') !!}</button>
            </div>
        </div>
    </div>
</div>