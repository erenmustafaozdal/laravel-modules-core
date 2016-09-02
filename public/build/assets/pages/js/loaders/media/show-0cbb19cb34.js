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
    $script.ready(['show', 'config'], function()
    {
        Show.init();
    });
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            select2: {
                templateResult: function(data)
                {
                    if (data.loading) return data.text;

                    var markup = data.parents == '' ? '' : '<small class="text-muted">' + data.parents + '</small> ';
                    var type = data.type == '' ? '' : (data.type == 'video' ? ' <small class="text-muted">(Video Galeri)</small>' : ' <small class="text-muted">(Foto Galeri)</small>');
                    return markup + data.text + type;
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