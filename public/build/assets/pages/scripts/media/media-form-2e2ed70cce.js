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
                    photo: {
                        required: function(element){
                            return $("#video").prop('disabled') === true;
                        }
                    },
                    video: {
                        required: function(element){
                            return $("#photo").prop('disabled') === true;
                        }
                    }
                },
                messages: messagesOfRules
            }
        }
    }

};
