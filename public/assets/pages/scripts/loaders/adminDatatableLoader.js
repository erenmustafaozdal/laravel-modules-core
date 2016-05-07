;(function() {
    "use strict";
    $script('/vendor/laravel-user-module/js/jquery.js', 'jquery');
    $script('/vendor/laravel-user-module/js/pace.js');
    $script('/vendor/laravel-user-module/js/icheck.js');

    $script.ready('jquery', function() {
        $script('/vendor/laravel-user-module/js/bootstrap.js', 'bootstrap');
        $script('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js','datatables');
        $script('/vendor/laravel-user-module/js/custom.js');
    });
})();