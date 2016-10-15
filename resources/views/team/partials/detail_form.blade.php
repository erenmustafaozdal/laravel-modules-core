{{-- Description --}}
<div class="form-group">
    <label class="control-label">{!! lmcTrans('laravel-team-module/admin.fields.team.description') !!}</label>
    {!! Form::textarea( 'description', isset($team) ? $team->description : null, [
        'class'         => 'form-control form-control-solid placeholder-no-fix maxlength',
        'placeholder'   => lmcTrans('laravel-team-module/admin.fields.team.description'),
        'rows'          => 3,
        'maxlength'     => 255
    ]) !!}
</div>
{{-- /Description --}}

{{-- Photo --}}
@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'         => lmcTrans('laravel-team-module/admin.fields.team.photo'),
    'input_name'    => 'photo',
    'input_id'      => 'photo',
    'elfinder'      => true,
    'elfinder_id'   => 'elfinder-photo',
    'multiple'      => false
])
{{-- /Photo --}}

{{-- Social Accounts --}}
<?php $i = 0; ?>
@foreach(config('laravel-team-module.social_accounts') as $social => $icon)
    {!! Form::hidden("social-account[{$i}][name]", $social) !!}
    {!! Form::hidden("social-account[{$i}][icon]", $icon) !!}
    <div class="form-group">
        <label class="control-label">{!! lmcTrans("admin.fields.{$social}") . ' ' . lmcTrans('laravel-team-module/admin.fields.team.url') !!}</label>
        {!! Form::text( "social-account[{$i}][url]", isset($team) && !is_null($socialAccount = $team->socialAccounts()->social($icon)->first()) ? $socialAccount->url : null, [
            'class'         => 'form-control form-control-solid placeholder-no-fix',
            'placeholder'   => lmcTrans("admin.fields.{$social}") . ' ' . lmcTrans('laravel-team-module/admin.fields.team.url')
        ]) !!}
        <span class="help-block"> {!! lmcTrans('laravel-team-module/admin.helpers.team.social_account', [
            'social_account'    => ucfirst($social),
            'social_account_url'=> $social,
        ]) !!} </span>
    </div>
    <?php $i++; ?>
@endforeach
{{-- /Social Accounts --}}

{{-- Phone Relation --}}
<div class="form-group mt-repeater margin-top-40 margin-bottom-40">
    <div data-repeater-list="group-phone">

        @forelse ( isset($team) ? $team->phones : [] as $phone )
            @include('laravel-modules-core::team.partials.phone_repeater', [
                'multiple'  => config('laravel-team-module.multiple_phone')
            ])
        @empty
            @include('laravel-modules-core::team.partials.phone_repeater', [
                'multiple'  => config('laravel-team-module.multiple_phone')
            ])
        @endforelse

    </div>

    @if(config('laravel-team-module.multiple_phone'))
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-team-module/admin.fields.team.add_phone') !!}
    </a>
    @endif
</div>
{{-- /Phone Relation --}}

{{-- Email Relation --}}
<div class="form-group mt-repeater margin-top-40 margin-bottom-40">
    <div data-repeater-list="group-email">

        @forelse ( isset($team) ? $team->emails : [] as $email )
            @include('laravel-modules-core::team.partials.email_repeater', [
                'multiple'  => config('laravel-team-module.multiple_email')
            ])
        @empty
            @include('laravel-modules-core::team.partials.email_repeater', [
                'multiple'  => config('laravel-team-module.multiple_email')
            ])
        @endforelse

    </div>

    @if(config('laravel-team-module.multiple_email'))
    <a href="javascript:;" data-repeater-create class="btn blue btn-outline mt-repeater-add">
        <i class="fa fa-plus"></i> {!! lmcTrans('laravel-team-module/admin.fields.team.add_email') !!}
    </a>
    @endif
</div>
{{-- /Email Relation --}}