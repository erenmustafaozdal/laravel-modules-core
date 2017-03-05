;(function() {
    "use strict";
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/summernote.min.js','summernote');
    });
    $script.ready('summernote', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/lang/summernote-tr-TR.js','summernote_tr');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/plugin/summernote-ext-print/summernote-ext-print_tr.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/plugin/summernote-ext-map/summernote-ext-map_tr.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/plugin/summernote-ext-addclass/summernote-ext-addclass_tr.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/plugin/summernote-ext-image-attributes/summernote-ext-image-attributes_tr.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-summernote/plugin/summernote-ext-floats/summernote-ext-floats.min_tr.js');

    });
    $script.ready('summernote_tr', function()
    {
        $script(summernoteJs,'app_summernote');
    });
})();