;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-gtreetable/dist/bootstrap-gtreetable.min.js','gtreetable');

    });
    $script.ready('gtreetable', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-gtreetable/dist/languages/bootstrap-gtreetable.tr.min.js','gtreetable_tr');
    });
    $script.ready('gtreetable_tr', function()
    {
        $script(gtreetableJs,'app_gtreetable');
    });
})();