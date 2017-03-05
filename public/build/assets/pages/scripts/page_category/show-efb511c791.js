;var ModelShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '#page_category-edit-info'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        ModelShow = this;

        this.form = $(this.options.formSrc);

        // edit info form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    name: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        });

    }
};
