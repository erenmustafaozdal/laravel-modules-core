;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(showJs,'show');
    });
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js','datepicker');
    });
    $script.ready('datepicker', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js','datepicker_tr');
    });
    $script.ready(['show','config','datepicker_tr'], function()
    {
        Show.init();

        // extra column
        LMCApp.initDatepicker();
    });
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            isDetailChange: true,
            detailDatas: [
                hasDescriptionObject
            ],
            select2: {
                templateResult: function(data)
                {
                    if (data.loading) return data.text;

                    var markup = data.parents == '' ? '' : '<small class="text-muted">' + data.parents + '</small> ';
                    var type = data.type == '' ? '' : (data.type == 'video' ? 'Video Albümü' : ( data.type == 'photo' ? 'Fotoğraf Albümü' : 'Karışık Albüm'));
                    return markup + data.text + ' <small class="text-muted">(' + type + ')</small>';
                },
                escapeMarkup: function(markup)
                {
                    return markup;
                },
                templateSelection: function(data)
                {
                    return data.text;
                },
                ajax: {
                    url: modelsURL, //end of data
                    processResults: function (data)
                    {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name_uc_first,
                                    id: item.id,
                                    parents: item.parent_name_uc_first,
                                    type: item.type
                                }
                            })
                        };
                    }
                }
            }
        });
    });
    $script.ready(['config','app_tinymce'], function()
    {
        Tinymce.init({
            route: tinymceURL
        });
    });
})();