;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
    });
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js','datepicker');
    });
    $script.ready('datepicker', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.tr.min.js','datepicker_tr');
    });
    $script.ready(['config','operation','app_fileinput','app_jcrop','datepicker_tr'], function()
    {
        Operation.init();

        // extra column
        LMCApp.initDatepicker();
        $script(videoPhotoJs);
    });
    $script.ready(['config','app_select2','app_fileinput','app_jcrop'], function()
    {
        Select2.init({
            select2: {
                templateResult: function(data)
                {
                    if (data.loading) return data.text;

                    var markup = data.parents == '' ? '' : '<small class="text-muted">' + data.parents + '</small> ';
                    var result = markup + data.text;
                    if (data.type !== 'video') {
                        var gallery_type = data.gallery_type == 'classical' ? 'Klasik Albüm' : ( data.gallery_type == 'modern' ? 'Modern Albüm' : 'Kategorili Albüm');
                        result += ' <small class="text-muted">(' + gallery_type + ')</small>';
                    }
                    return result;
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
                                    type: item.type,
                                    gallery_type: item.gallery_type
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