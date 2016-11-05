;(function() {
    "use strict";
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/nouislider/wNumb.min.js', 'numb');
    });
    $script.ready('numb', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/nouislider/nouislider.min.js', 'nouislider');
    });
})();