;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
    });
    $script.ready('jquery', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js', 'inputmask');
    });

    $script.ready(['config','index','inputmask'], function()
    {
        Index.init({
            DataTable: {
                datatableIsResponsive: datatableIsResponsive,
                groupActionSupport: groupActionSupport,
                rowDetailSupport: rowDetailSupport,
                datatableFilterSupport: datatableFilterSupport
            }
        });
        $script(videoPhotoJs);
    });

    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
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
                                    text: item.name,
                                    id: item.id,
                                    parents: item.parents,
                                    type: item.type
                                }
                            })
                        };
                    }
                }
            }
        });
    });
})();