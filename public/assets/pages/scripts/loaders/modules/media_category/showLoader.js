;(function() {
    "use strict";
    $script.ready(['validation'], function()
    {
        $script(showJs,'show');
        $script('/vendor/laravel-modules-core/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js', 'cubeportfolio');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-repeater/jquery.repeater.min.js', 'repeater');
    });
    $script.ready(['show','config','cubeportfolio','repeater'], function()
    {
        Show.init();

        // repeater
        $('.mt-repeater').each(function(){
            $(this).repeater({
                show: function () {
                    $(this).slideDown();
                    LMCApp.initTooltips();
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
})();