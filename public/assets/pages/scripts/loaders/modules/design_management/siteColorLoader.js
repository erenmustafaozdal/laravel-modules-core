;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(modelJs,'model');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js', 'colorpicker');
    });
    $script.ready(['config','model','colorpicker'], function()
    {
        Model.init();
    });
})();