;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
        $script(permissionJs, 'permission');
    });
    $script.ready(['config','operation','permission'], function()
    {
        Create.init();
        Permission.init();
    });
})();