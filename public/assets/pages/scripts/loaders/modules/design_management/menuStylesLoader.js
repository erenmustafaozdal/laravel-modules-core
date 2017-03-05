;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(modelJs,'model');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui/jquery-ui.min.js', 'jquery_ui');
    });
    $script.ready('jquery_ui', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js', 'touch_punch');
    });
    $script.ready(['config','model','jquery_ui','touch_punch'], function()
    {
        Model.init();
        LMCApp.initTooltips();
    });
})();