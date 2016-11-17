;(function() {
    "use strict";

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/pixastic.custom.js');
    });
    $script.ready(['bootstrap'], function() {
        $script(mainJS);
    });
})();