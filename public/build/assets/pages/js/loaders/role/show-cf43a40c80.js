;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(showJs,'show');
        $script(permissionJs, 'permission');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-easypiechart/dist/jquery.easypiechart.min.js','easypiechart');
        $script(easypiechartJs, 'app_easypiechart');
    });
    $script.ready(['show', 'config'], function()
    {
        Show.init();
    });
    $script.ready(['config', 'permission'], function()
    {
        Permission.init();
    });
    $script.ready(['config', 'easypiechart', 'app_easypiechart'], function()
    {
        EasyPie.init({
            src: '.easy-pie-chart .number'
        });
    });
})();