;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-repeater/jquery.repeater.min.js', 'repeater');
    });
    $script.ready(['config','repeater'], function()
    {
        LMCApp.initTooltips();

        // repeater
        $('.mt-repeater').each(function(){
            $(this).repeater({
                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    bootbox.confirm(LMCApp.lang.admin.ops.destroy_input_confirm, function(result)
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
    $script.ready(['config','app_tinymce'], function()
    {
        Tinymce.init({
            route: tinymceURL
        });
    });
})();