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

        @forelse ( isset($contact) ? $contact->numbers : [] as $number )
            @include('laravel-modules-core::contact.partials.number_repeater')
        @empty
            @include('laravel-modules-core::contact.partials.number_repeater')
        @endforelse

    </div>
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-contact-module/admin.fields.contact.add_number') !!}
    </a>
</div>
{{-- /Number Relation --}}

{{-- Email Relation --}}
<div class="form-group mt-repeater margin-top-40 margin-bottom-40">
    <div data-repeater-list="group-email">

        @forelse ( isset($contact) ? $contact->emails : [] as $email )
            @include('laravel-modules-core::contact.partials.email_repeater')
        @empty
            @include('laravel-modules-core::contact.partials.email_repeater')
        @endforelse

    </div>
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-contact-module/admin.fields.contact.add_email') !!}
    </a>
</div>
{{-- /Email Relation --}}