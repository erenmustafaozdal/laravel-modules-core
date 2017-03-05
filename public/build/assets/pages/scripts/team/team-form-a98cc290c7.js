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
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        }
    }

};
