;(function() {
    "use strict";

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.easing.1.3.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/fancybox/jquery.fancybox.pack.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.touchwipe.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.appear.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/SmoothScroll.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/spin.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/raphael.min.js','raphael');
        $script('/vendor/laravel-modules-core/assets/global/plugins/pixastic.custom.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/masonry.pkgd.min.js', 'masonry');
        $script('/vendor/laravel-modules-core/assets/global/plugins/TouchSwipe/jquery.touchSwipe.min.js', 'touchSwipe');

        // revolution slider
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/jquery.themepunch.tools.min.js','revolution_tools');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/jquery.themepunch.revolution.min.js','revolution');

        // price regulator
        $script('/vendor/laravel-modules-core/assets/global/plugins/price-regulator.js','price_regulator');
    });
    $script.ready(['bootstrap','revolution_tools','revolution','price_regulator','images_loaded','carousel'], function() {
        $script(mainJS);
    });



    $script.ready(['touchSwipe'], function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/caroufredsel/jquery.carouFredSel.js', 'carousel');
    });
    $script.ready(['masonry'], function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.imagesloaded.min.js','images_loaded');
    });
    $script.ready(['raphael'], function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/livicons-1.4.min.js');
    });



    $script.ready(['revolution_tools','revolution'], function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.actions.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.carousel.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.kenburn.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.layeranimation.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.migration.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.navigation.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.parallax.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.slideanims.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/extensions/revolution.extension.video.min.js');
    });
})();