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
    $script.ready(['config','model'], function()
    {
        EMOModel.init();
        LMCApp.initTooltips();
    });
})();