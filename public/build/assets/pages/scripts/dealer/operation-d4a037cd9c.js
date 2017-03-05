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
                    category_id: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    province_id: {
                        required: true
                    },
                    county_id: {
                        required: true
                    },
                    land_phone: {
                        phone_tr: true
                    },
                    mobile_phone: {
                        phone_tr: true
                    },
                    url : {
                        url: true
                    }
                },
                messages: messagesOfRules
            }
        });

    }
};
