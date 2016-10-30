;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(modelJs,'home');
    });
    $script.ready(['config','home','app_fileinput','app_jcrop'], function()
    {
        Model.init();
    });
})();