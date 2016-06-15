<div id="change_avatar" class="tab-pane">

    {{-- template photo preview before crop --}}
    <div id="temp-photo-preview"></div>
    {{-- /template photo preview before crop --}}

    {{-- Fileinput file element --}}
    {!! Form::file('photo', ['id' => 'photo']) !!}
    {{-- /Fileinput file element --}}
    
</div>