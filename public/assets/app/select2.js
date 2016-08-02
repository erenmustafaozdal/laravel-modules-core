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
                selectOnClose: true,
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
            } // end of select2
        };
    }

};