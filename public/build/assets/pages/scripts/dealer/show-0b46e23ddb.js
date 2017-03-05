;var ModuleShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '#dealer-edit-info'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        ModuleShow = this;

        this.form = $(this.options.formSrc);

        // edit info form validation
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
