;(function() {
    "use strict";
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js', 'tagsinput');
    });
    $script.ready('tagsinput', function()
    {
        $script(tagsinputJs, 'app_tagsinput');
    });
})();