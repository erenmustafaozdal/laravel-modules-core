;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(showJs,'show');
    });
    $script.ready(['show', 'config'], function()
    {
        Show.init();
    });
})();