;(function() {
    "use strict";
    $script.ready(['validation'], function()
    {
        $script(showJs,'show');
    });
    $script.ready(['show', 'config'], function()
    {
        Show.init();
    });
})();