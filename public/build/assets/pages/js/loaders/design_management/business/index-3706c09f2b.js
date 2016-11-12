;(function() {
    "use strict";
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
    });
    $script.ready(['config','index','app_fileinput','app_jcrop'], function()
    {
        Index.init();
    });
})();