;var theModel;
var Model = {

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
        theModel = this;

        this.form = $(this.options.formSrc);

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    photo: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init for logo
        LMCFileinput.init(this.getPhotoOptions());

    },

    /**
     * get default photo fileinput options
     */
    getPhotoOptions: function()
    {
        return {
            src: '#photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: aspectRatio,
            fileinput: {
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    },
};