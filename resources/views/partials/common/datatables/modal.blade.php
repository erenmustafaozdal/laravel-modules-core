<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{!! trans('laravel-modules-core::admin.ops.fast_add') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {{-- form elements --}}
                    {!! Form::open([
                        'class'     => 'form'
                    ]) !!}

                    @foreach($includes as $include => $datas)
                        @include("laravel-modules-core::{$include}", $datas)
                    @endforeach

                    {!! Form::close() !!}
                    {{-- /form elements --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red btn-outline" data-dismiss="modal">{!! trans('laravel-modules-core::admin.ops.cancel') !!}</button>
                <button type="button" class="btn blue btn-outline editor-action">{!! trans('laravel-modules-core::admin.ops.fast_add') !!}</button>
            </div>
        </div>
    </div>
</div>