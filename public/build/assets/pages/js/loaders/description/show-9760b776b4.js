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
    $script.ready(['show', 'config','app_fileinput','app_jcrop','datepicker_tr'], function()
    {
        Show.init();

        // extra column
        LMCApp.initDatepicker();
    });
    $script.ready(['config','app_select2','app_fileinput','app_jcrop'], function()
    {
        var hasDescriptionObject = {
            column : 'has_description',
            input : '#description',
            wrapper : '#description_wrapper'
        };
        var hasPhotoObject = {
            column : 'has_photo',
            input : '#photo',
            wrapper : '#photo_wrapper',
            isFileinput : true,
            elfinder: '#elfinder-photo'
        };
        var hasLinkObject = {
            column : 'has_link',
            input : '#link',
            wrapper : '#link_wrapper'
        };
        var isMultiplePhoto = {
            column : 'is_multiple_photo',
            input : '#elfinder-photo',
            wrapper : '.elfinder_wrapper',
            reverseValue: true,
            changeAttr: {
                element: '#photo',
                attr: 'multiple',
                trueValue: true,
                falseValue: false
            }
        };

        Select2.init({
            isDetailChange: true,
            detailDatas: [
                hasDescriptionObject,
                hasPhotoObject,
                hasLinkObject,
                isMultiplePhoto
            ],
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
                                    text: item.name_uc_first,
                                    id: item.id,
                                    parents: item.parent_name_uc_first
                                }
                            })
                        };
                    }
                }
            }
        });

        // init select2 change
        var descriptionType = hasDescription ? 'show' : 'hide';
        var photoType = hasPhoto ? 'show' : 'hide';
        var linkType = hasLink ? 'show' : 'hide';
        var contentType = hasDescription || hasPhoto ? 'show' : 'hide';
        theSelect2.setInputDisplay(hasDescriptionObject, descriptionType);
        theSelect2.setInputDisplay(hasPhotoObject, photoType);
        theSelect2.setInputDisplay(hasLinkObject, linkType);
    });
    $script.ready(['config','app_tinymce'], function()
    {
        Tinymce.init({
            route: tinymceURL
        });
    });
})();