;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/select2/dist/js/select2.full.min.js','select2');
    });
    $script.ready('select2', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/select2/dist/js/i18n/tr.js','select2_tr');
    });
    $script.ready('select2_tr', function()
    {
        $script(select2Js,'app_select2');
    });
})();