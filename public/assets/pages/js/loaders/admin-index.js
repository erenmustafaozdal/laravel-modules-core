;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/datatables/datatables.min.js','datatables');
    });
    $script.ready('datatables', function()
    {
        $script(datatableJs,'app_datatable');
        $script('/vendor/laravel-modules-core/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js','bootstrap');
    });
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js','datepicker');
    });
    $script.ready('datepicker', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js');
    });
})();