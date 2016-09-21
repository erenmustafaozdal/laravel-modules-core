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
                    name: {
                        required: true
                    },
                    province_id: {
                        required: true
                    },
                    county_id: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        }
    }

};
