;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-repeater/jquery.repeater.min.js', 'repeater');
    });
    $script.ready(['config','operation','repeater'], function()
    {
        Operation.init();

        // repeater
        $('.mt-repeater').each(function(){
            $(this).repeater({
                show: function () {
                    $(this).slideDown();
                    LMCApp.initTooltips();
                },

                hide: function (deleteElement) {
                    bootbox.confirm(LMCApp.lang.admin.ops.destroy_confirm, function(result)
                    {
                        if (result) {
                            $(this).slideUp(deleteElement);
                        }
                    });
                },

                ready: function (setIndexes) {

                }

            });
        });
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