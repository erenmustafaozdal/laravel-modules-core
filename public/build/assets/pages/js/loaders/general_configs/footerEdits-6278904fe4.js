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

        // tab change
        $('.tab_footer').on('click',function(e)
        {
            var el = $(this), tab = el.data('tab');
            el.closest('.tabbable-line').find('div.tab-pane').find('input,textarea').prop('disabled',true);
            el.closest('.tabbable-line').find('div.' + tab).find('input,textarea').prop('disabled',false);
        });
    });
    $script.ready(['config','app_tinymce'], function()
    {
        Tinymce.init({
            route: tinymceURL
        });
    });
})();