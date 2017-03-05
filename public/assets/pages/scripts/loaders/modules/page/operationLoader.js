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
    $script.ready(['config','operation','tinymce'], function()
    {
        Operation.init();
    });
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            variableNames: {
                text: 'name'
            },
            select2: {
                ajax: {
                    url: modelsURL
                }
            }
        });
    });
    $script.ready(['config','app_tinymce'], function()
    {
        Tinymce.init({
            route: tinymceURL
        });
    });
})();