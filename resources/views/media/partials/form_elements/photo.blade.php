@include('laravel-modules-core::partials.form.fileinput_form', [
    'label'             => lmcTrans('laravel-media-module/admin.fields.media.photo'),
    'input_name'        => 'photo',
    'input_id'          => 'photo',
    'elfinder'          => true,
    'elfinder_id'       => 'elfinder-photo',
    'fileinputDisable'  => isset($fileinputDisable) ? $fileinputDisable : false,
    'elfinderDisable'   => isset($elfinderDisable) ? $elfinderDisable : true
])