@if ($errors->any())
    <div class="alert alert-danger {{ ($errors->any()) ? '' : 'display-hide' }}">
        <button class="close" data-close="alert"></button>
        @foreach ($errors->all() as $error)
            <span>{!! $error !!}</span><br>
        @endforeach
    </div>
@endif

@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="alert
                    alert-{{ session('flash_notification.level') }}
        {{ session()->has('flash_notification.important') ? 'alert-important' : '' }}"
        >
            <button class="close" data-close="alert"></button>
            @if(session()->has('flash_notification.important'))
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif