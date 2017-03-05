;(function() {
    "use strict";
    $script.ready('app_gtreetable', function()
    {
        $script(indexJs,'index');
    });
    $script.ready(['config','index'], function()
    {
        Index.init({
            nestableLevel: nestableLevel
        });
    });
})();