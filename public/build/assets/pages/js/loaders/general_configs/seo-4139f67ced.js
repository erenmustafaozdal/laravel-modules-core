;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(modelJs,'model');
        $script('/vendor/laravel-modules-core/assets/global/plugins/codemirror/lib/codemirror.js', 'codemirror');
    });
    $script.ready('codemirror', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/codemirror/mode/htmlmixed/htmlmixed.js', 'htmlmixed');
        $script('/vendor/laravel-modules-core/assets/global/plugins/codemirror/mode/xml/xml.js', 'xml');
        $script('/vendor/laravel-modules-core/assets/global/plugins/codemirror/mode/javascript/javascript.js', 'javascript');
        $script('/vendor/laravel-modules-core/assets/global/plugins/codemirror/mode/css/css.js', 'css');
    });
    $script.ready(['config','model','htmlmixed','xml','javascript','css'], function()
    {
        EMOModel.init();
    });
})();