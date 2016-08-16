;var UserOperation;
var Operation = {

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

    init: function (options) {
        UserOperation = this;

        this.form = $(this.options.formSrc);

        // LMCDropzone app is init
        LMCFileinput.init(this.getFileinputInitOptions());

        // LMCJcrop app element is setup
        LMCJcrop.setupElements();

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: options,
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
            src: UserOperation.options.fileinputSrc,
            formSrc:  UserOperation.options.formSrc,
            fileinput: {
                uploadUrl: UserOperation.form.prop('action'),
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
                        .init(UserOperation.getJcropInitOptions());
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
                    UserOperation.form.find('input[type="hidden"]').val('');
                }
            }
        };
    }
};
