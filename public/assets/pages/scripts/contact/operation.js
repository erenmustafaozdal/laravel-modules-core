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
                    province_id: {
                        required: true
                    },
                    county_id: {
                        required: true
                    },
                    'group-number[0][number]': {
                        phone_tr: true
                    },
                    'group-email[0][email]': {
                        email: true
                    }
                },
                messages: messagesOfRules
            }
        });

    }
};
