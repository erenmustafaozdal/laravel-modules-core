;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jcrop/js/jquery.color.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jcrop/js/jquery.Jcrop.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/js/fileinput.min.js','fileinput');
    });
    $script.ready('fileinput', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/js/locales/tr_edit.js','fileinput_tr');
    });
    $script.ready(['fileinput','fileinput_tr'], function()
    {
        $script(fileinputJS, 'app_fileinput');
    });
})();