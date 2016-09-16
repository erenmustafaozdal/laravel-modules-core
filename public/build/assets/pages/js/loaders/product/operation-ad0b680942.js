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
    });
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js','touchspin');
    });
    $script.ready(['config','operation','inputmask','app_fileinput','app_jcrop','touchspin'], function()
    {
        Operation.init();

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