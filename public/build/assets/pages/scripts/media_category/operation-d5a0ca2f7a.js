;var ModelOperation;
var Operation = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        ModelOperation = this;

        this.form = $(this.options.formSrc);

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    name: {
                        required: true
                    },
                    type: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // remove media element
        $('.element-wrapper').on('click','.remove-element', function(e)
        {
            $(this).closest('.element-wrapper').remove();
        });

    }
};
