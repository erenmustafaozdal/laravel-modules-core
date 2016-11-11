;(function() {
    "use strict";
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js', 'colorpicker');
    });
    $script.ready(['config','index','colorpicker','app_fileinput','app_jcrop'], function()
    {
        Index.init();
    });
})();