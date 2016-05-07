;(function() {
    "use strict";
    $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.min.js','jquery');
    $script('/vendor/laravel-modules-core/assets/global/plugins/js.cookie.min.js');

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap/js/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.blockui.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/uniform/jquery.uniform.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');

        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-validation/js/jquery.validate.min.js','validate');

    });

    $script.ready('validate', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-validation/js/additional-methods.min.js');
        $script(loginJs,'login');
    });

    $script.ready('bootstrap', function() {
        $script('/vendor/laravel-modules-core/assets/global/scripts/app.js');
    });
})();