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
    $script('/vendor/laravel-modules-core/assets/global/plugins/pace/pace.min.js');
    $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.min.js','jquery');
    $script('/vendor/laravel-modules-core/assets/global/plugins/js.cookie.min.js');
    $script('/vendor/laravel-modules-core/assets/global/plugins/clipboardjs/clipboard.min.js');

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap/js/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.blockui.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/uniform/jquery.uniform.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/icheck/icheck.min.js');
        // file manager color box
        $script('/vendor/laravel-modules-core/assets/global/plugins/colorbox/jquery.colorbox-min.js','colorbox');
    });

    $script.ready('bootstrap', function() {
        $script('/vendor/laravel-modules-core/assets/global/scripts/app.js','app');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootbox/bootbox.min.js','bootbox');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-toastr/toastr.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js','datetimepicker');
    });
    $script.ready('datetimepicker', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.tr.js');
    });

    $script.ready('app', function() {
        $script('/vendor/laravel-modules-core/assets/layouts/layout4/scripts/layout.js','layout');
        $script('/vendor/laravel-modules-core/assets/layouts/global/scripts/quick-sidebar.js');
    });

    $script.ready('layout', function() {
        $script(themeJs,'theme');
        $script(configJs,'config');
    });

    $script.ready('config', function() {
        LMCApp.init();
    });

    // file manager
    $script.ready('colorbox', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/colorbox/i18n/jquery.colorbox-tr.js');
        $script(elfinderJs);
    });

    // not permission modal
    $script.ready(['jquery', 'bootstrap'], function() {
        $('a[href="#not-permission"]').on('click', function()
        {
            $('#not-permission').modal();
            return false;
        });
    });

    // select2 addresses
    $script.ready(['config','app_select2'], function()
    {
        // Address Urls
        var addressURLs = {
            province_id: {
                url: countyURL,
                element: '#county_id'
            },
            county_id: {
                url: districtURL,
                element: '#district_id'
            }
        };

        // Address On Change Function
        var resetSubElement = function(id,remove)
        {
            var clean = false;
            $('.addresses').each(function(i,el)
            {
                el = $(el);
                if (clean) {
                    el.find('option:selected').prop('selected', false).val('');
                    if (remove == true) {
                        el.empty().prop('disabled',true);
                    }
                }
                if (el.prop('id') === id) { clean = true; }
            });
        };
        var addressChange = function(e)
        {
            var element = $(this),
                id = element.prop('id'),
                val = element.val(),
                url = addressURLs[id].url,
                subElement = $(addressURLs[id].element),
                column = addressURLs[id].element.replace('_id','').replace('#','');

            if (val == '' || val == null) { return resetSubElement(id,true); }

            $.ajax({
                type: 'get',
                url: url.replace('###id###',val),
                success: function(data) {

                    // elemanlar temizlenir
                    resetSubElement(id);

                    if (subElement.prop('id') === 'postal_code_id') {
                        subElement.removeAttr('disabled')
                            .empty()
                            .append('<option value="' + data.id + '" selected>' + data.postal_code + '</option>');
                        return;
                    }

                    subElement.removeAttr('disabled')
                        .empty()
                        .append('<option value="" disabled selected>Seç</option>');
                    $.each(data, function (i,val) {
                        subElement.append('<option value="'+val.id+'">'+val[column]+'</option>');
                    });
                }
            });
        };

        if ($('#province_id').length) {
            Select2.init({
                src: '#province_id',
                select2: {
                    ajax: {
                        type: 'get',
                        url: provinceURL,
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.province,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                },
                onChange: addressChange
            });
        }
        if ($('#county_id').length) {
            Select2.init({
                src: '#county_id',
                select2: {
                    ajax: null
                },
                onChange: addressChange
            });
        }
        if ($('#district_id').length) {
            Select2.init({
                src: '#district_id',
                select2: {
                    ajax: null
                },
                onChange: addressChange
            });
        }
        if ($('#neighborhood_id').length) {
            Select2.init({
                src: '#neighborhood_id',
                select2: {
                    ajax: null
                },
                onChange: addressChange
            });
        }
        if ($('#postal_code_id').length) {
            Select2.init({
                src: '#postal_code_id',
                select2: {
                    ajax: null
                }
            });
        }
    });
})();