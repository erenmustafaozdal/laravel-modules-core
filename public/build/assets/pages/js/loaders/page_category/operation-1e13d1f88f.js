;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
    });
    $script.ready(['config','operation'], function()
    {
        Operation.init();
    });
})();