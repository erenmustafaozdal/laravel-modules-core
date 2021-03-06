;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
    });
    $script.ready(['config','index'], function()
    {
        Index.init({
            DataTable: {
                datatableIsResponsive: datatableIsResponsive,
                groupActionSupport: groupActionSupport,
                rowDetailSupport: rowDetailSupport,
                datatableFilterSupport: datatableFilterSupport,
                isRelationTable: isRelationTable
            }
        });
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