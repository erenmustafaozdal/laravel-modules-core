;(function() {
    "use strict";
    $script('http://maps.google.com/maps/api/js?key=' + apiKey, 'google_maps');
    $script.ready('google_maps', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/gmaps/gmaps.js', 'gmaps');
    });
    $script.ready(['google_maps','gmaps','app_select2','config'], function()
    {
        $script(gmapsJs,'app_gmaps');
    });
})();