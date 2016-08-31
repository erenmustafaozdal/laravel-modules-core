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
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            select2: {
                ajax: null,
                minimumResultsForSearch: -1
            }
        });
    });
})();