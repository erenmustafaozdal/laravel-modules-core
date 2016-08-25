;(function() {
    "use strict";
    $script.ready(['app_fileinput','app_jcrop','validation'], function()
    {
        $script(showJs,'show');
        $script(permissionJs, 'permission');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-easypiechart/dist/jquery.easypiechart.min.js','easypiechart');
        $script(easypiechartJs, 'app_easypiechart');
    });
    $script.ready(['show', 'config','permission'], function()
    {
        Show.init();
        Permission.init();
    });
    $script.ready(['config', 'easypiechart', 'app_easypiechart'], function()
    {
        EasyPie.init({
            src: '.easy-pie-chart .number'
        });
    });
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            variableNames: {
                text: 'name'
            },
            select2: {
                ajax: {
                    url: modelsURL
                }
            }
        });
    });
})();