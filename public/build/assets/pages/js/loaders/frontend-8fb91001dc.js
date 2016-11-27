(function (name, definition) {
    if (typeof module != 'undefined' && module.exports) module.exports = definition()
    else if (typeof define == 'function' && define.amd) define(definition)
    else this[name] = definition()
})('$script', function () {
    var doc = document
        , head = doc.getElementsByTagName('head')[0]
        , s = 'string'
        , f = false
        , push = 'push'
        , readyState = 'readyState'
        , onreadystatechange = 'onreadystatechange'
        , list = {}
        , ids = {}
        , delay = {}
        , scripts = {}
        , scriptpath
        , urlArgs

    function every(ar, fn) {
        for (var i = 0, j = ar.length; i < j; ++i) if (!fn(ar[i])) return f
        return 1
    }
    function each(ar, fn) {
        every(ar, function (el) {
            fn(el)
            return 1
        })
    }

    function $script(paths, idOrDone, optDone) {
        paths = paths[push] ? paths : [paths]
        var idOrDoneIsDone = idOrDone && idOrDone.call
            , done = idOrDoneIsDone ? idOrDone : optDone
            , id = idOrDoneIsDone ? paths.join('') : idOrDone
            , queue = paths.length
        function loopFn(item) {
            return item.call ? item() : list[item]
        }
        function callback() {
            if (!--queue) {
                list[id] = 1
                done && done()
                for (var dset in delay) {
                    every(dset.split('|'), loopFn) && !each(delay[dset], loopFn) && (delay[dset] = [])
                }
            }
        }
        setTimeout(function () {
            each(paths, function loading(path, force) {
                if (path === null) return callback()

                if (!force && !/^https?:\/\//.test(path) && scriptpath) {
                    path = (path.indexOf('.js') === -1) ? scriptpath + path + '.js' : scriptpath + path;
                }

                if (scripts[path]) {
                    if (id) ids[id] = 1
                    return (scripts[path] == 2) ? callback() : setTimeout(function () { loading(path, true) }, 0)
                }

                scripts[path] = 1
                if (id) ids[id] = 1
                create(path, callback)
            })
        }, 0)
        return $script
    }

    function create(path, fn) {
        var el = doc.createElement('script'), loaded
        el.onload = el.onerror = el[onreadystatechange] = function () {
            if ((el[readyState] && !(/^c|loade/.test(el[readyState]))) || loaded) return;
            el.onload = el[onreadystatechange] = null
            loaded = 1
            scripts[path] = 2
            fn()
        }
        el.async = 1
        el.src = urlArgs ? path + (path.indexOf('?') === -1 ? '?' : '&') + urlArgs : path;
        head.insertBefore(el, head.lastChild)
    }

    $script.get = create

    $script.order = function (scripts, id, done) {
        (function callback(s) {
            s = scripts.shift()
            !scripts.length ? $script(s, id, done) : $script(s, callback)
        }())
    }

    $script.path = function (p) {
        scriptpath = p
    }
    $script.urlArgs = function (str) {
        urlArgs = str;
    }
    $script.ready = function (deps, ready, req) {
        deps = deps[push] ? deps : [deps]
        var missing = [];
        !each(deps, function (dep) {
            list[dep] || missing[push](dep);
        }) && every(deps, function (dep) {return list[dep]}) ?
            ready() : !function (key) {
            delay[key] = delay[key] || []
            delay[key][push](ready)
            req && req(missing)
        }(deps.join('|'))
        return $script
    }

    $script.done = function (idOrDone) {
        $script([null], idOrDone)
    }

    return $script
});
;(function() {
    "use strict";

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.easing.1.3.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/fancybox/jquery.fancybox.pack.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.touchwipe.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.appear.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/spin.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/raphael.min.js','raphael');
        $script('/vendor/laravel-modules-core/assets/global/plugins/pixastic.custom.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/masonry.pkgd.min.js', 'masonry');
        $script('/vendor/laravel-modules-core/assets/global/plugins/TouchSwipe/jquery.touchSwipe.min.js', 'touchSwipe');
        $script('/vendor/laravel-modules-core/assets/global/plugins/isotope.pkgd.min.js', 'isotope');
        $script('/vendor/laravel-modules-core/assets/global/plugins/ladda/ladda.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-validator/bootstrapValidator.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.elevateZoom-3.0.8.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/country.js');

        // revolution slider
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/jquery.themepunch.tools.min.js','revolution_tools');
        $script('/vendor/laravel-modules-core/assets/global/plugins/revolution/jquery.themepunch.revolution.min.js','revolution');

        // price regulator
        $script('/vendor/laravel-modules-core/assets/global/plugins/price-regulator.js','price_regulator');
    });
    $script.ready(['bootstrap','revolution_tools','revolution','price_regulator','images_loaded','carousel','isotope'], function() {
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