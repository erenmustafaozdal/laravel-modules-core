<div class="panel-group accordion" id="accordion_{{ $model->slug }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            
            {{-- Title --}}
            <h4 class="panel-title">
                <a class="accordion-toggle collapsed"
                   data-toggle="collapse"
                   data-parent="#accordion_{{ $model->slug }}"
                   href="#collapse_{{ $model->slug }}"
                > {{ $model->name_uc_first }} {!! lmcTrans('admin.fields.configs') !!} </a>
            </h4>
            {{-- /Title --}}
            
        </div>
        <div id="collapse_{{ $model->slug }}" class="panel-collapse collapse">
            
            {{-- Body --}}
            <div class="panel-body">
                @include("laravel-modules-core::page_management.home.{$model->slug_or_copied_slug}")
            </div>
            {{-- /Body --}}
            
        </div>
    </div>
</div>