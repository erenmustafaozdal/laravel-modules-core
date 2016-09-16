;var ModuleShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '#document-edit-info'
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
                    title: {
                        required: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init
        LMCFileinput.init(this.getPhotoFileinputOptions());
        LMCFileinput.init(this.getDocumentFileinputOptions());

    },

    /**
     * get default document fileinput options
     */
    getDocumentFileinputOptions: function()
    {
        return {
            src: '#document',
            formSrc:  'form.form',
            fileinput: {
                allowedFileExtensions: validExtension.split(','),
                allowedFileTypes: null,
                previewFileType: 'any',
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
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
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    }
};
