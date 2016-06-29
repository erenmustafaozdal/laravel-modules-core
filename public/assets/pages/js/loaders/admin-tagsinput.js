;(function() {
    "use strict";
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js','tagsinput');
        $script('/vendor/laravel-modules-core/assets/global/plugins/typeahead/dist/typeahead.jquery.min.js','typeahead');
        $script('/vendor/laravel-modules-core/assets/global/plugins/typeahead/dist/bloodhound.min.js', 'bloodhound');
        $script('/vendor/laravel-modules-core/assets/global/plugins/typeahead/dist/typeahead.bundle.min.js', 'typeahead_bundle');
    });
    $script.ready(['tagsinput','typeahead','bloodhound','typeahead_bundle'], function()
    {
        $script(tagsinputJs, 'app_tagsinput');
    });
})();