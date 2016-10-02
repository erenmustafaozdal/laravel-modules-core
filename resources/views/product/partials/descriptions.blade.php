{{-- Showcase --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('admin.fields.descriptions') !!}</h3>
    </div>
    <div class="panel-body">

        <div class="tabbable tabbable-tabdrop">
            <ul class="nav nav-tabs">
                @for($i = 0; $i < $product->descriptions->count(); $i++)
                    <li class="{{ $i == 0 ? ' active' : '' }} tooltips"
                        data-container="body"
                        data-placement="top"
                        data-original-title="{!! $product->descriptions->get($i)->is_publish ? lmcTrans('admin.ops.published') : lmcTrans('admin.ops.not_published') !!}"
                    >
                        <a href="#description_{{ $product->descriptions->get($i)->id }}" data-toggle="tab">
                            {{ $product->descriptions->get($i)->title_uc_first }}
                            <span class="badge badge-{{ $product->descriptions->get($i)->is_publish ? 'success' : 'danger' }}">
                                <i class="fa fa-{{ $product->descriptions->get($i)->is_publish ? 'check' : 'times' }}"></i>
                            </span>
                        </a>
                    </li>
                @endfor
            </ul>
            <div class="tab-content">
                @for($i = 0; $i < $product->descriptions->count(); $i++)
                    <div class="tab-pane{{ $i == 0 ? ' active' : '' }}" id="description_{{ $product->descriptions->get($i)->id }}">
                        {!! $product->descriptions->get($i)->description !!}
                    </div>
                @endfor
            </div>
        </div>

    </div>
</div>
{{-- /Showcase --}}