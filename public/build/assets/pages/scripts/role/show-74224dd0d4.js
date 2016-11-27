;var RoleShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '#role-edit-info'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        RoleShow = this;

        this.form = $(this.options.formSrc);

        // edit info form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    name: {
                        required: true
                    },
                    slug: {
                        alpha_dash: true
                    }
                },
                messages: messagesOfRules
            }
        });

    }
};
