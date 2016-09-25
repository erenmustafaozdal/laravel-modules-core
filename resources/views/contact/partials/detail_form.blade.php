{{-- Address --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.address') !!}</label>
    {!! Form::text( 'address', isset($contact) ? $contact->address : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.address'),
        'maxlength'     => 255
    ]) !!}
</div>
{{-- /Address --}}

{{-- Number Relation --}}
<div class="form-group mt-repeater margin-top-40 margin-bottom-40">
    <div data-repeater-list="group-number">
        <div data-repeater-item class="mt-repeater-item">

            @if(isset($contact) && $contact->numbers->count() > 0)
                @foreach($contact->numbers as $number)
                <div class="row mt-repeater-row">

                    {{-- Number Title --}}
                    <div class="col-md-6">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.number_title') !!}</label>
                        {!! Form::text( 'number_title', $number->title, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.number_title')
                        ]) !!}
                    </div>
                    {{-- /Number Title --}}

                    {{-- Number --}}
                    <div class="col-md-5">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.number') !!}</label>
                        {!! Form::text( 'number', $number->number, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-number',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.number')
                        ]) !!}
                        <span class="help-block">
                            {!! lmcTrans('laravel-contact-module/admin.helpers.contact.number') !!}
                        </span>
                    </div>
                    {{-- /Number --}}

                    {{-- Repeater Delete --}}
                    <div class="col-md-1">
                        <a href="javascript:;"
                           data-repeater-delete
                           class="btn red btn-outline mt-repeater-delete tooltips"
                           data-container="body"
                           data-original-title="{!! lmcTrans('admin.ops.destroy') !!}"
                        >
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    {{-- /Repeater Delete --}}

                </div>
                @endforeach
            @else
                <div class="row mt-repeater-row">

                    {{-- Number Title --}}
                    <div class="col-md-6">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.number_title') !!}</label>
                        {!! Form::text( 'number_title', null, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.number_title')
                        ]) !!}
                    </div>
                    {{-- /Number Title --}}

                    {{-- Number --}}
                    <div class="col-md-5">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.number') !!}</label>
                        {!! Form::text( 'number', null, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix inputmask-number',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.number')
                        ]) !!}
                        <span class="help-block">
                            {!! lmcTrans('laravel-contact-module/admin.helpers.contact.number') !!}
                        </span>
                    </div>
                    {{-- /Number --}}

                    {{-- Repeater Delete --}}
                    <div class="col-md-1">
                        <a href="javascript:;"
                           data-repeater-delete
                           class="btn red btn-outline mt-repeater-delete tooltips"
                           data-container="body"
                           data-original-title="{!! lmcTrans('admin.ops.destroy') !!}"
                        >
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    {{-- /Repeater Delete --}}

                </div>
            @endif
        </div>
    </div>
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-contact-module/admin.fields.contact.add_number') !!}
    </a>
</div>
{{-- /Number Relation --}}

{{-- Email Relation --}}
<div class="form-group mt-repeater margin-top-40 margin-bottom-40">
    <div data-repeater-list="group-email">
        <div data-repeater-item class="mt-repeater-item">

            @if(isset($contact) && $contact->emails->count() > 0)
                @foreach($contact->emails as $email)
                <div class="row mt-repeater-row">

                    {{-- Email Title --}}
                    <div class="col-md-6">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.email_title') !!}</label>
                        {!! Form::text( 'email_title', $email->title, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.email_title')
                        ]) !!}
                    </div>
                    {{-- /Email Title --}}

                    {{-- Email --}}
                    <div class="col-md-5">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.email') !!}</label>
                        {!! Form::text( 'email', $email->email, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.email')
                        ]) !!}
                        <span class="help-block">
                            {!! lmcTrans('laravel-contact-module/admin.helpers.contact.email') !!}
                        </span>
                    </div>
                    {{-- /Email --}}

                    {{-- Repeater Delete --}}
                    <div class="col-md-1">
                        <a href="javascript:;"
                           data-repeater-delete
                           class="btn red btn-outline mt-repeater-delete tooltips"
                           data-container="body"
                           data-original-title="{!! lmcTrans('admin.ops.destroy') !!}"
                        >
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    {{-- /Repeater Delete --}}

                </div>
                @endforeach
            @else
                <div class="row mt-repeater-row">

                    {{-- Email Title --}}
                    <div class="col-md-6">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.email_title') !!}</label>
                        {!! Form::text( 'email_title', null, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.email_title')
                        ]) !!}
                    </div>
                    {{-- /Email Title --}}

                    {{-- Email --}}
                    <div class="col-md-5">
                        <label class="control-label">{!! lmcTrans('laravel-contact-module/admin.fields.contact.email') !!}</label>
                        {!! Form::text( 'email', null, [
                            'class'         => 'form-control form-control-solid placeholder-no-fix',
                            'placeholder'   => lmcTrans('laravel-contact-module/admin.fields.contact.email')
                        ]) !!}
                        <span class="help-block">
                            {!! lmcTrans('laravel-contact-module/admin.helpers.contact.email') !!}
                        </span>
                    </div>
                    {{-- /Email --}}

                    {{-- Repeater Delete --}}
                    <div class="col-md-1">
                        <a href="javascript:;"
                           data-repeater-delete
                           class="btn red btn-outline mt-repeater-delete tooltips"
                           data-container="body"
                           data-original-title="{!! lmcTrans('admin.ops.destroy') !!}"
                        >
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                    {{-- /Repeater Delete --}}

                </div>
            @endif
        </div>
    </div>
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-contact-module/admin.fields.contact.add_email') !!}
    </a>
</div>
{{-- /Email Relation --}}