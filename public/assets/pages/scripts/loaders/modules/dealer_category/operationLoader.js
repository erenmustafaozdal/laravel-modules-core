;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
    });
    $script.ready(['config','operation'], function()
    {
        Operation.init();
    });
})();