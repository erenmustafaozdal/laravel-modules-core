var UserForm = {

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
                    slug: {
                        required: true,
                        alphanumeric: true
                    }
                },
                messages: messagesOfRules
            }
        }
    }

};
