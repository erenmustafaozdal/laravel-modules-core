;(function() {
    "use strict";
    $script.ready(['validation'], function()
    {
        $script(showJs,'show');
        $script('/vendor/laravel-modules-core/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js', 'cubeportfolio');
    });
    $script.ready(['show', 'config', 'cubeportfolio'], function()
    {
        Show.init();
    });
})();