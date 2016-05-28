;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-validation/js/jquery.validate.js','validation');
    });
    $script.ready('validation', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-validation/js/additional-methods.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-validation/js/localization/messages_tr.js');
        $script(validationJS);
        $script(userFormJS);
    });
})();