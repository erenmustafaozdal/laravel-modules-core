;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-ui/jquery-ui.min.js','jquery_ui');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-browser-plugin/jquery.browser.min.js');

    });
    $script.ready(['jquery_ui', 'bootbox'], function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-gtreetable/dist/bootstrap-gtreetable_edit.js','gtreetable');

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