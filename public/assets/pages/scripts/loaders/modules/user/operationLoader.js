;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready(['app_fileinput','app_jcrop', 'validation'], function()
    {
        $script(operationJs,'operation');
        $script(permissionJs, 'permission');
    });
    $script.ready(['config','operation','permission'], function()
    {
        Operation.init({
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                minlength: 6
            },
            password_confirmation: {
                minlength: 6,
                equalTo: "#password"
            }
        });
        Permission.init();
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
})();