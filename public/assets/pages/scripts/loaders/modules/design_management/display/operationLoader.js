;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(modelJs,'model');
    });
    $script.ready(['config','model','app_fileinput','app_jcrop'], function()
    {
        Model.init();
    });
})();