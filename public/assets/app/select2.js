;var theSelect2;
var Select2 = {

    /**
     * element
     */
    element: null,

    /**
     * options
     */
    options: {},

    /**
     * init function
     *
     * @param options
     */
    init: function(options)
    {
        // object
        theSelect2 = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // element
        this.element = $(this.options.src);

        // select2 init
        this.element.select2(this.options.select2);

        // on change event listener
        this.element.on('change',this.options.onChange);

    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: '.select2',
            variableNames: {
                id: 'id',
                text: 'text'
            },
            select2: {
                language: 'tr',
                placeholder: LMCApp.lang.admin.ops.select,
                minimumInputLength: -1,
                tags: false,
                allowClear: true,
                closeOnSelect: true,
                selectOnClose: false,
                templateResult: function(data)
                {
                    return data.text;
                },
                ajax: {
                    type: 'post',
                    cache: true,
                    delay: 250,
                    dataType: 'json',
                    data: function(params)
                    {
                        if (params.term) {
                            return {
                                query: params.term
                            };
                        }
                        return params;
                    }, //end of data
                    processResults: function (data)
                    {
                        return {
                            results: $.map(data, function (item) {
                                var text = item[theSelect2.options.variableNames.text];
                                var id = item[theSelect2.options.variableNames.id];
                                return {
                                    text: text,
                                    id: id
                                }
                            })
                        };
                    } //end of processResults
                } //end of ajax
            }, // end of select2
            isDetailChange: false,
            detailDatas: [],
            detailContent: {},
            onChange: function(e) {
                var val = $(this).val();
                if ( ! theSelect2.options.isDetailChange || val == '' ) {
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
                        // tab ve content kontrol edilir
                        var contentDisplayType = 'hide';
                        $.each(theSelect2.options.detailDatas, function(key, value)
                        {
                            if ( ! data[value.column] || (value.reverseValue && data[value.column]) ) {
                                theSelect2.setInputDisplay(value, 'hide');
                                return true;
                            }

                            theSelect2.setInputDisplay(value, 'show');
                            contentDisplayType = 'show';
                        });
                        theSelect2.setContentDisplay(theSelect2.options.detailContent, contentDisplayType);
                    }
                });
            }
        };
    },

    /**
     * set input display
     *
     * @param value
     * @param type
     */
    setInputDisplay: function(value, type)
    {
        var el = $(value.input),
            el_wrap = $(value.wrapper);
        switch (type) {
            case 'hide':
                el_wrap.addClass('hidden');
                el.prop('disabled','disabled');
                if (value.isFileinput) {
                    $(value.elfinder).prop('disabled','disabled').val('');
                    LMCFileinput.disable(el);
                }
                break;
            case 'show':
                el_wrap.removeClass('hidden');
                el.prop('disabled',false);
                if (value.isFileinput) {
                    $(value.elfinder).prop('disabled',false);
                    LMCFileinput.enable(el);
                }
                break;
        }
    },

    /**
     * set content display
     *
     * @param value
     * @param type
     */
    setContentDisplay : function(value, type)
    {
        var el = $(value.content),
            el_tab = $(value.tab);
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
    }

};