;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
    });
    $script.ready(['config','index'], function()
    {
        Index.init();
    });
})();