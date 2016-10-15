;var ModuleShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '.product-form'
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
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    'social-account[][url]' : {
                        url: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init
        LMCFileinput.init(this.getPhotoFileinputOptions());

    },

    /**
     * get default photo fileinput options
     */
    getPhotoFileinputOptions: function()
    {
        return {
            src: '#photo',
            formSrc:  'form.form',
            fileinput: {
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    }
};
