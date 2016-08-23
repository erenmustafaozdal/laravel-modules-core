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
    $script.ready(['config','operation','app_fileinput','app_jcrop'], function()
    {
        Operation.init();
    });
    $script.ready(['config','app_select2'], function()
    {
        Select2.init({
            select2: {
                templateResult: function(data)
                {
                    if (data.loading) return data.text;

                    var markup = data.parents == '' ? '' : '<small class="text-muted">' + data.parents + '</small> ';
                    return markup + data.text;
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
                                    parents: item.parents
                                }
                            })
                        };
                    }
                }
            }
        });

        // change event
        theSelect2.element.on('change',function(e)
        {
            var url =  categoryDetailURL.replace('###id###',$(this).val());
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    LMCApp.hasTransaction = false;
                },
                success: function (data) {
                    // tab ve content kontrol edilir
                    if ( ! data.has_description &&  ! data.has_photo) {
                        setContentDisplay('hide')
                    } else {
                        setContentDisplay('show')
                    }
                    // description var veya yok işlemleri
                    if (data.has_description) {
                        setDescriptionDisplay('show');
                    } else {
                        setDescriptionDisplay('hide');
                    }

                    // photo var veya yok işlemleri
                    if (data.has_photo) {
                        setPhotoDisplay('show');
                    } else {
                        setPhotoDisplay('hide');
                    }

                }
            });
        });
    });

    /**
     * set description display
     *
     * @param type
     */
    var setDescriptionDisplay = function(type)
    {
        var el = $('#description'),
            el_wrap = $('#description_wrapper');
        switch (type) {
            case 'hide':
                el_wrap.addClass('hidden');
                el.prop('disabled','disabled');
                break;
            case 'show':
                el_wrap.removeClass('hidden');
                el.prop('disabled',false);
                break;
        }
    };

    /**
     * set photo display
     *
     * @param type
     */
    var setPhotoDisplay = function(type)
    {
        var el = $('#photo'),
            el_wrap = $('#photo_wrapper');
        switch (type) {
            case 'hide':
                el_wrap.addClass('hidden');
                el.fileinput('disable');
                break;
            case 'show':
                el_wrap.removeClass('hidden');
                el.fileinput('enable');
                break;
        }
    };

    /**
     * set content display
     *
     * @param type
     */
    var setContentDisplay = function(type)
    {
        var el = $('#detail'),
            el_tab = $('#detail_tab');
        switch (type) {
            case 'hide':
                el.addClass('hidden');
                el_tab.addClass('hidden');
                break;
            case 'show':
                el.removeClass('hidden');
                el_tab.removeClass('hidden');
                break;
        }
    };
})();