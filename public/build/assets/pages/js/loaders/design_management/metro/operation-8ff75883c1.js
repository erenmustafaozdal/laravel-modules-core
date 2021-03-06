;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(modelJs,'model');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js', 'colorpicker');
    });
    $script.ready(['config','model','app_fileinput','app_jcrop','colorpicker'], function()
    {
        Model.init();
    });
})();