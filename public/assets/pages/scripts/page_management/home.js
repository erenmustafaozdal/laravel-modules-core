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
        //Validation.init({
        //    src: this.options.formSrc,
        //    isAjax: false,
        //    validate: {
        //        rules: {
        //            'category_id': {
        //                required: true
        //            },
        //            brand_id: {
        //                required: true
        //            },
        //            name: {
        //                required: true
        //            }
        //        },
        //        messages: messagesOfRules
        //    }
        //});

        // LMCFileinput app is init for ...
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
                maxFileCount: maxFile,
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                showRemove: false,
                initialPreview: initialPreview,
                initialPreviewConfig: initialPreviewConfig,
                initialPreviewThumbTags: initialPreviewThumbTags,
                initialPreviewShowDelete: false,
                initialPreviewFileType: 'image',
                fileActionSettings: {
                    showUpload: false,
                    showRemove: false
                }
            }
        };
    }
};
