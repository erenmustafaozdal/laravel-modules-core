;(function() {
    "use strict";
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
    });
    $script.ready(['config','index'], function()
    {
        Index.init();
    });
})();