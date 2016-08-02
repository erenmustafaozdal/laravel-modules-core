;(function() {
    "use strict";
    $script('/vendor/laravel-modules-core/assets/global/plugins/pace/pace.min.js');
    $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.min.js','jquery');
    $script('/vendor/laravel-modules-core/assets/global/plugins/js.cookie.min.js');

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap/js/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.blockui.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/uniform/jquery.uniform.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');
    });

    $script.ready('bootstrap', function() {
        $script('/vendor/laravel-modules-core/assets/global/scripts/app.js','app');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootbox/bootbox.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-toastr/toastr.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.js');
    });

    $script.ready('app', function() {
        $script('/vendor/laravel-modules-core/assets/layouts/layout4/scripts/layout.js','layout');
    });

    $script.ready('layout', function() {
        $script(themeJs,'theme');
        $script(configJs,'config');
    });

    $script.ready('config', function() {
        LMCApp.init();
    });
})();