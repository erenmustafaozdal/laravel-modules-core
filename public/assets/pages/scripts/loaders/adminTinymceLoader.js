;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/tinymce/tinymce.min.js','tinymce');

    });
    $script.ready('tinymce', function()
    {
        $script(tinymceJs,'app_tinymce');
    });
})();