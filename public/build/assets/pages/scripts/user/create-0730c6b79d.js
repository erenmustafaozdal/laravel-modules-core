;var UserCreate;
var Create = {

    /**
     * user create options
     * @var object
     */
    options: {
        fileinputSrc: '#photo',
        formSrc: 'form.form'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        UserCreate = this;

        this.form = $(this.options.formSrc);

        // LMCDropzone app is init
        LMCFileinput.init(this.getFileinputInitOptions());

        // create form validation
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
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    }
                },
                messages: messagesOfRules
            }
        });

    },

    /**
     * get file input init options
     */
    getFileinputInitOptions: function()
    {
        return {
            src: UserCreate.options.fileinputSrc,
            formSrc:  UserCreate.options.formSrc,
            fileinput: {
                showUpload: false,
                showCancel: true,
                fileActionSettings: {
                    showUpload: false
                },
                otherActionButtons: '<button type="button" id="image-crop-action" class="btn btn-xs yellow btn-outline tooltips" data-toggle="modal" title="' + LMCApp.lang.admin.ops.crop + '"><i class="icon-crop"></i> </button>'
            },
            // events
            filebrowse: function(event)
            {
                theLMCJcrop == undefined ? LMCJcrop.setupElements() : theLMCJcrop.setupElements();
                theLMCJcrop.jcropReset();
            },
            fileloaded: function(event, file, previewId, index, reader)
            {
                var img = new Image();
                img.src = reader.result;
                theLMCJcrop.originalImage = img;
                // init tooltips
                LMCApp.initTooltips();
                // image crop action button click
                $('#image-crop-action').on('click', function(event)
                {
                    // jcrop init
                    theLMCJcrop.jcropInit(event, file, previewId, index, reader, UserCreate.getJcropInitOptions());
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
                onRelease: function()
                {
                    UserCreate.form.find('input[type="hidden"]').val('');
                }
            }
        };
    }
};
