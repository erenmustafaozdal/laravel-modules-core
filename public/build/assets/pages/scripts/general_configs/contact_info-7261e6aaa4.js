;var theEMOModel;
var EMOModel = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form-horizontal'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        theEMOModel = this;

        this.form = $(this.options.formSrc);

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    email: {
                        email: true
                    },
                    phone: {
                        phone_tr: true
                    }
                },
                messages: messagesOfRules
            }
        });

    }
};
