@if ($errors->any())
    <div class="alert alert-danger {{ ($errors->any()) ? '' : 'display-hide' }}">
        <button class="close" data-close="alert"></button>
        @foreach ($errors->all() as $error)
            <span>{!! $error !!}</span><br>
        @endforeach
    </div>
@endif

@include('flash::message')