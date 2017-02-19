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
    $script.ready(['jquery','bootstrap'], function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js', 'bs_select');
    });
    $script.ready(['config','model','app_fileinput','app_jcrop','colorpicker','bs_select'], function()
    {
        Model.init();
    });
})();