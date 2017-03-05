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

    $script.ready(['config','index','app_fileinput','app_jcrop'], function()
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
})();