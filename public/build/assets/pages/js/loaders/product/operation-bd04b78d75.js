;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('jquery', function()
    {
        $script(operationJs,'operation');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js', 'inputmask');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-repeater/jquery.repeater.min.js', 'repeater');
    });
    $script.ready(['jquery','bootstrap'], function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js', 'bs_select');
    });
    $script.ready(['config','operation','inputmask','app_fileinput','app_jcrop','repeater','tinymce','bs_select'], function()
    {
        Operation.init();

        // repeater
        $('.mt-repeater').each(function(){
            $(this).repeater({
                show: function () {
                    $(this).slideDown();
                    LMCApp.initTooltips();
                    Tinymce.init({
                        route: tinymceURL
                    });
                },

                hide: function (deleteElement) {
                    bootbox.confirm(LMCApp.lang.admin.ops.destroy_confirm, function(result)
                    {
                        if (result) {
                            $(this).slideUp(deleteElement);
                        }
                    });
                },

                ready: function (setIndexes) {

                }

            });
        });

        // amount
        LMCApp.initInputMask({
            src: '#amount',
            type: 'amount',
            inputmask: {
                placeholder: '_',
                numericInput: true,
                rightAlignNumerics: false,
                greedy: false
            }
        });
    });
    $script.ready(['config','app_select2','app_fileinput','app_jcrop'], function()
    {
        Select2.init({
            src: '.select2showcase',
            select2: {
                ajax: null
            }
        });
        Select2.init({
            src: '.select2category',
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
                    url: categoriesURL, //end of data
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
            },
            onChange: function(e) {
                var val = $(this).val();
                if ( val == '' ) {
                    return false;
                }

                var url =  categoryDetailURL.replace('###id###',val);
                $.ajax({
                    url: url,
                    type: 'GET',
                    beforeSend: function() {
                        LMCApp.hasTransaction = false;
                    },
                    success: function (data) {
                        var aspect = LMCApp.getOppositeAspect(aspectRatio, data.crop_type);
                        $('.file-preview-image').each(function(key,value)
                        {
                            var id = $(value).prop('id');
                            var api = theLMCJcrop.apis[id];
                            if (api != undefined) {
                                api.setOptions({aspectRatio: aspect});
                                var recoords = theLMCJcrop.getCropSize(api.tellSelect(), id);
                                theLMCJcrop.setFormElements(recoords, $('#' + id.replace('img-','')));
                            }
                        });
                        aspectRatio = aspect;
                        LMCAspectRatio = aspect;
                        $('#crop_type').val(data.crop_type);
                    }
                });
            }
        });
        Select2.init({
            src: '.select2brand',
            variableNames: {
                text: 'name'
            },
            select2: {
                ajax: {
                    url: brandsURL
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