;(function() {
    "use strict";
    $script.ready('validation', function()
    {
        $script(validationMethodsJs);
    });
    $script.ready('app_editor', function()
    {
        $script(indexJs,'index');
        $script('/vendor/laravel-modules-core/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js', 'inputmask');
    });
    $script.ready('bootstrap', function()
    {
        $script('/vendor/laravel-modules-core/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js','touchspin');
    });

    $script.ready(['config','index','touchspin','inputmask'], function()
    {
        Index.init({
            DataTable: {
                datatableIsResponsive: datatableIsResponsive,
                groupActionSupport: groupActionSupport,
                rowDetailSupport: rowDetailSupport,
                datatableFilterSupport: datatableFilterSupport
            }
        });

        // bootstrap touch spins init
        LMCApp.initTouchSpin({
            src:'#amount',
            touchspin: {
                max: 99999,
                decimals: 2,
                step: 10,
                postfix: '₺',
                buttondown_class: "btn red btn-outline",
                buttonup_class: "btn green btn-outline"
            }
        });
        LMCApp.initTouchSpin({
            src:'#amount_from',
            touchspin: {
                max: 99999,
                decimals: 2,
                step: 10,
                postfix: '₺'
            }
        });
        LMCApp.initTouchSpin({
            src:'#amount_to',
            touchspin: {
                max: 99999,
                decimals: 2,
                step: 10,
                postfix: '₺'
            }
        });
        $('input[name="amount"], input[name="amount_from"],input[name="amount_to"]').on('change',function(e)
        {
            var val = $(this).val();
            $(this).val(val.replace('.', ','));
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

    $script.ready(['config','app_select2'], function()
    {
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
})();