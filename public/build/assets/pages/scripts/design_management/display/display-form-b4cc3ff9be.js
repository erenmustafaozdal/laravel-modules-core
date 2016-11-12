var ModelForm = {

    init: function(options)
    {
        var ops = $.extend(true, this.getDefaultOptions(), options);
        Validation.init(ops);
        Validation.init({
            src: '.form-horizontal',
            isAjax: false,
            validate: {
                rules: {
                    'first_mini_photo[first_mini_photo]': {
                        required: true
                    },
                    first_link : {
                        url: true
                    },
                    'second_mini_photo[second_mini_photo]': {
                        required: true
                    },
                    second_link : {
                        url: true
                    },
                    'third_mini_photo[third_mini_photo]': {
                        required: true
                    },
                    third_link : {
                        url: true
                    }
                },
                messages: messagesOfRules
            }
        });
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
                    photo: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        }
    }

};
