{{-- Title --}}
<div class="form-group">
    <label class="col-md-3 control-label">
        {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.page_item_color',[
            'menu_page'     => $page->title_uc_first
        ]) !!}
    </label>
    <div class="col-md-9">
        <select class="bs-select form-control" data-show-subtext="true" name="pages[{{ $page->id }}][options][item_color]">

            @foreach(config('ezelnet-frontend-module.page_item_color') as $key => $color)
                <option value="{{ $key }}"
                        {{ !is_null($page->option) && $page->option->options_array->item_color == $key ? 'selected' : '' }}
                        @if(is_array($color))
                        data-content="{!! lmcTrans("ezelnet-frontend-module/admin.fields.page_management.{$color['lang']}") !!} <span class='label lable-sm label-primary' style='background: {{ $color['color'] }};'>{!! lmcTrans("admin.fields.{$color['lang']}") !!} </span>"
                        @endif
                >
                    {!! lmcTrans('ezelnet-frontend-module/admin.fields.page_management.' . (is_array($color) ? $color['lang'] : $color)) !!}
                </option>
            @endforeach

        </select>
    </div>
</div>
{{-- /Title --}}