;var ModuleShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '#media-edit-info'
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
                    title: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        });

    }
};
