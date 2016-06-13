;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jcrop/js/jquery.color.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jcrop/js/jquery.Jcrop.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/dropzone/dropzone.min.js', 'dropzone');
    });
    $script.ready('dropzone', function()
    {
        $script(dropzoneJS, 'app_dropzone');
    });
})();