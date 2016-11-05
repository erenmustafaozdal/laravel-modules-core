<?php
$isClose = true;
$rootCount = count($menu_sidebar->roots());
?>
@foreach($menu_sidebar->roots() as $key => $element)

        {{-- New List End --}}
        @if(! is_null($element->attribute('is-header')) && $element->attribute('is-header') && ! $isClose)
                </div>
            </div>
        @endif
        {{-- /New List End --}}

    {{-- New List --}}
    @if(! is_null($element->attribute('is-header')) && $element->attribute('is-header'))
        <div class="mt-element-list margin-bottom-25">
            <div class="mt-list-head list-simple ext-1 bg-grey">
                <div class="list-head-title-container">
                    <h3 class="list-title">{{ $element->title }}</h3>
                </div>
            </div>
            <div class="mt-list-container list-simple ext-1 group">

        <?php $isClose = false; ?>
    @endif
    {{-- /New List --}}

    {{-- Is Not Header --}}
    @if(is_null($element->attribute('is-header')))
        @if( ! $element->hasChildren())
            <div class="panel-collapse collapse in" aria-expanded="true">
                <ul>
                    <li class="mt-list-item">
                        <div class="list-datetime">

                            {{-- Inputs --}}
                            @if($element->url() !== 'javascript:;')
                            {!! Form::hidden("menu[{$element->id}][title]", $element->title) !!}
                            {!! Form::hidden("menu[{$element->id}][link]", $element->url()) !!}
                            {!! Form::hidden("menu[{$element->id}][icon]", $element->attribute('data-icon')) !!}
                            {!! Form::hidden("menu[{$element->id}][permission]", is_array($element->data('permissions')) ? $element->data('permissions')[0] : $element->data('permissions')) !!}
                            {!! Form::hidden("menu[{$element->id}][has]",0) !!}
                            {!! Form::checkbox( "menu[{$element->id}][has]", 1, !$fasts->where('link',$element->url())->isEmpty(), [
                                'class'         => 'make-switch',
                                'data-on-text'  => '<i class="fa fa-check"></i>',
                                'data-on-color' => 'success',
                                'data-off-text' => '<i class="fa fa-times"></i>',
                                'data-off-color'=> 'danger',
                                'data-size'     => 'mini'
                            ]) !!}
                            @endif
                            {{-- /Inputs --}}

                        </div>
                        <div class="list-item-content parent">
                            <h3 class="uppercase">
                                <a href="javascript:;">{{ $element->title }}</a>
                            </h3>
                        </div>
                    </li>
                </ul>
            </div>
        @else
            <a class="list-toggle-container" data-toggle="collapse" href="#head_{{ $element->id }}" aria-expanded="true">
                <div class="list-toggle">{{ $element->title }}</div>
            </a>
            <div class="panel-collapse collapse" id="head_{{ $element->id }}" aria-expanded="true">
                <ul>

                    {{-- Childrens --}}
                    @foreach($element->children() as $children)
                        <li class="mt-list-item">
                            <div class="list-datetime">

                                {{-- Inputs --}}
                                @if($children->url() !== 'javascript:;')
                                {!! Form::hidden("menu[{$children->id}][title]", $children->title) !!}
                                {!! Form::hidden("menu[{$children->id}][link]", $children->url()) !!}
                                {!! Form::hidden("menu[{$children->id}][icon]", $children->attribute('data-icon')) !!}
                                {!! Form::hidden("menu[{$children->id}][permission]", is_array($children->data('permissions')) ? $children->data('permissions')[0] : $children->data('permissions')) !!}
                                {!! Form::hidden("menu[{$children->id}][has]",0) !!}
                                {!! Form::checkbox( "menu[{$children->id}][has]", 1, !$fasts->where('link',$children->url())->isEmpty(), [
                                    'class'         => 'make-switch',
                                    'data-on-text'  => '<i class="fa fa-check"></i>',
                                    'data-on-color' => 'success',
                                    'data-off-text' => '<i class="fa fa-times"></i>',
                                    'data-off-color'=> 'danger',
                                    'data-size'     => 'mini'
                                ]) !!}
                                @endif
                                {{-- /Inputs --}}

                            </div>
                            <div class="list-item-content parent">
                                <h3 class="uppercase">
                                    <a href="javascript:;">{{ $children->title }}</a>
                                </h3>
                            </div>
                        </li>

                        {{-- Sub Childrens --}}
                        @if($children->hasChildren())
                        @foreach($children->children() as $subChildren)
                            <li class="mt-list-item">
                                <div class="list-datetime">

                                    {{-- Inputs --}}
                                    @if($subChildren->url() !== 'javascript:;')
                                    {!! Form::hidden("menu[{$subChildren->id}][title]", $subChildren->title) !!}
                                    {!! Form::hidden("menu[{$subChildren->id}][link]", $subChildren->url()) !!}
                                    {!! Form::hidden("menu[{$subChildren->id}][icon]", $subChildren->attribute('data-icon')) !!}
                                    {!! Form::hidden("menu[{$subChildren->id}][permission]", is_array($subChildren->data('permissions')) ? $subChildren->data('permissions')[0] : $subChildren->data('permissions')) !!}
                                    {!! Form::hidden("menu[{$subChildren->id}][has]",0) !!}
                                    {!! Form::checkbox( "menu[{$subChildren->id}][has]", 1, !$fasts->where('link',$subChildren->url())->isEmpty(), [
                                        'class'         => 'make-switch',
                                        'data-on-text'  => '<i class="fa fa-check"></i>',
                                        'data-on-color' => 'success',
                                        'data-off-text' => '<i class="fa fa-times"></i>',
                                        'data-off-color'=> 'danger',
                                        'data-size'     => 'mini'
                                    ]) !!}
                                    @endif
                                    {{-- /Inputs --}}

                                </div>
                                <div class="list-item-content">
                                    <h3 class="uppercase">
                                        <a href="javascript:;">{{ $subChildren->title }}</a>
                                    </h3>
                                </div>
                            </li>
                        @endforeach
                        @endif
                        {{-- /Sub Childrens --}}

                    @endforeach
                    {{-- /Childrens --}}

                </ul>
            </div>
        @endif
    @endif
    {{-- /Is Not Header --}}

    {{-- New List End --}}
    @if($rootCount - 1  == $key)
            </div>
        </div>
    @endif
    {{-- /New List End --}}

@endforeach
{{--<div class="mt-element-list">--}}


                {{--<li class="mt-list-item done">--}}
                    {{--<div class="list-icon-container">--}}
                        {{--<i class="icon-check"></i>--}}
                    {{--</div>--}}
                    {{--<div class="list-datetime"> 8 Nov </div>--}}
                    {{--<div class="list-item-content">--}}
                        {{--<h3 class="uppercase">--}}
                            {{--<a href="javascript:;">Listings Feature</a>--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<a class="list-toggle-container" data-toggle="collapse" href="#pending-simple" aria-expanded="true">--}}
            {{--<div class="list-toggle uppercase"> Pending--}}
                {{--<span class="badge badge-default pull-right bg-white font-dark bold">3</span>--}}
            {{--</div>--}}
        {{--</a>--}}
        {{--<div class="panel-collapse collapse in" id="pending-simple" aria-expanded="true">--}}
            {{--<ul>--}}
                {{--<li class="mt-list-item">--}}
                    {{--<div class="list-icon-container">--}}
                        {{--<i class="icon-close"></i>--}}
                    {{--</div>--}}
                    {{--<div class="list-datetime"> 8 Nov </div>--}}
                    {{--<div class="list-item-content">--}}
                        {{--<h3 class="uppercase">--}}
                            {{--<a href="javascript:;">Listings Feature</a>--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="mt-list-item">--}}
                    {{--<div class="list-icon-container">--}}
                        {{--<i class="icon-close"></i>--}}
                    {{--</div>--}}
                    {{--<div class="list-datetime"> 8 Nov </div>--}}
                    {{--<div class="list-item-content">--}}
                        {{--<h3 class="uppercase">--}}
                            {{--<a href="javascript:;">Listings Feature</a>--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="mt-list-item">--}}
                    {{--<div class="list-icon-container">--}}
                        {{--<i class="icon-close"></i>--}}
                    {{--</div>--}}
                    {{--<div class="list-datetime"> 8 Nov </div>--}}
                    {{--<div class="list-item-content">--}}
                        {{--<h3 class="uppercase">--}}
                            {{--<a href="javascript:;">Listings Feature</a>--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}