var ModelForm = {

    init: function(options)
    {
        var ops = $.extend(true, this.getDefaultOptions(), options);
        Validation.init(ops);
    },

    getDefaultOptions: function()
    {
        return {
            src: '.form',
            isAjax: false,
            submitAjax: function(validation)
            {
                //
            },
            validate: {
                rules: {
                    category_id: {
                        required: true
                    },
                    brand_id: {
                        required: true
                    },
                    name: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        }
    }

};
