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

        // LMCJcrop app element is setup
        LMCJcrop.setupElements();

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
                },
                otherActionButtons: '<button type="button" id="image-crop-action" class="btn btn-xs yellow btn-outline tooltips" data-toggle="modal" title="' + LMCApp.lang.admin.ops.crop + '"><i class="icon-crop"></i> </button>'
            },
            // events
            filebrowse: function(event)
            {
                theLMCJcrop.jcropReset();
            },
            fileloaded: function(event, file, previewId, index, reader)
            {
                // init tooltips
                LMCApp.initTooltips();
                // image crop action button click
                $('#image-crop-action').on('click', function(event)
                {
                    // jcrop init
                    theLMCJcrop.jcropPreInit(reader.result)
                        .init(ModuleShow.getJcropInitOptions());
                });
                // image crop cancel button click
                theLMCJcrop.imgCropCancelBtn.on('click', function(event)
                {
                    theLMCJcrop.jcropReset();
                });
            },
            filecleared: function(event)
            {
                theLMCJcrop.jcropReset();
            },
            filereset: function(event)
            {
                theLMCJcrop.jcropReset();
            }
        };
    },

    /**
     * get jquery crop init options
     */
    getJcropInitOptions: function()
    {
        return {
            jcrop: {
                aspectRatio: aspectRatio,
                onRelease: function()
                {
                    ModuleShow.form.find('input[type="hidden"]').val('');
                }
            }
        };
    }
};
