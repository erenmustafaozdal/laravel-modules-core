;(function() {
    "use strict";
    $script('/vendor/laravel-modules-core/assets/global/plugins/pace/pace.min.js');
    $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.min.js','jquery');
    $script('/vendor/laravel-modules-core/assets/global/plugins/js.cookie.min.js');

    $script.ready('jquery', function() {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap/js/bootstrap.min.js','bootstrap');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery.blockui.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/uniform/jquery.uniform.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');
        // file manager color box
        $script('/vendor/laravel-modules-core/assets/global/plugins/colorbox/jquery.colorbox-min.js','colorbox');
    });

    $script.ready('bootstrap', function() {
        $script('/vendor/laravel-modules-core/assets/global/scripts/app.js','app');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootbox/bootbox.min.js','bootbox');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-toastr/toastr.min.js');
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.js');
    });

    $script.ready('app', function() {
        $script('/vendor/laravel-modules-core/assets/layouts/layout4/scripts/layout.js','layout');
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
            },
            district_id: {
                url: neighborhoodURL,
                element: '#neighborhood_id'
            },
            neighborhood_id: {
                url: postalCodeURL,
                element: '#postal_code_id'
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