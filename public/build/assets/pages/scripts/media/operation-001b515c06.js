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
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    title: {
                        required: true
                    },
                    photo: {
                        required: function(element){
                            var video = $("#video");
                            return ! video.length || video.prop('disabled') === true;
                        }
                    },
                    video: {
                        required: function(element){
                            var photo = $("#photo");
                            return ! photo.length || photo.prop('disabled') === true;
                        }
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init
        LMCFileinput.init(this.getPhotoFileinputOptions());

        // LMCJcrop app element is setup
        LMCJcrop.setupElements();

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
                        .init(ModelOperation.getJcropInitOptions());
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
                    ModelOperation.form.find('input[type="hidden"]').val('');
                }
            }
        };
    }
};
