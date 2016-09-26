{{-- Numbers --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-contact-module/admin.fields.contact.numbers') !!}</h3>
    </div>
    <div class="panel-body">

        <table class="child-table table table-striped table-bordered table-advance table-hover">

            {{-- Table Head --}}
            <thead>
            <tr>
                <th>{!! lmcTrans('laravel-contact-module/admin.fields.contact.number_title') !!}</th>
                <th>{!! lmcTrans('laravel-contact-module/admin.fields.contact.number') !!}</th>
            </tr>
            </thead>
            {{-- /Table Head --}}

            {{-- Table Body --}}
            <tbody>
            @foreach($contact->numbers as $number)
                <tr>
                    <td class="highlight"> <div class="warning"> </div> {{ $number->title_uc_first }}</td>
                    <td> {{ $number->number }}</td>
                </tr>
            @endforeach
            </tbody>
            {{-- /Table Body --}}

        </table>

    </div>
</div>
{{-- /Numbers --}}

{{-- Emails --}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{!! lmcTrans('laravel-contact-module/admin.fields.contact.emails') !!}</h3>
    </div>
    <div class="panel-body">

        <table class="child-table table table-striped table-bordered table-advance table-hover">

            {{-- Table Head --}}
            <thead>
            <tr>
                <th>{!! lmcTrans('laravel-contact-module/admin.fields.contact.email_title') !!}</th>
                <th>{!! lmcTrans('laravel-contact-module/admin.fields.contact.email') !!}</th>
            </tr>
            </thead>
            {{-- /Table Head --}}

            {{-- Table Body --}}
            <tbody>
            @foreach($contact->emails as $email)
                <tr>
                    <td class="highlight"> <div class="warning"> </div> {{ $email->title_uc_first }}</td>
                    <td> {{ $email->email }}</td>
                </tr>
            @endforeach
            </tbody>
            {{-- /Table Body --}}

        </table>

    </div>
</div>
{{-- /Emails --}}