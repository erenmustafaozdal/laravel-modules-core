;var UserShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        fileinputSrc: '#photo',
        formSrc: '#change-avatar-form',
        jcropWrapperSrc: '#jcrop-preview',
        imgJcropSrc: '#img-jcrop',
        imgJcropPreviewSrc: '#img-jcrop-preview',
        imgJcropPreviewPaneSrc: '#preview-pane',
        imgJcropPreviewContainerSrc: '#preview-pane .preview-container',
        imgCropCancelBtnSrc: '#image-crop-cancel'
    },

    /**
     * user show jquery elements
     */
    form: null,
    jcropWrapper: null,
    imgJcrop: null,
    imgJcropPreview: null,
    imgJcropPreviewPane: null,
    imgJcropPreviewContainer: null,
    imgCropCancelBtn: null,

    /**
     * jcrop preview sizes
     */
    xsize: 0,
    ysize: 0,

    /**
     * jquery preview bound sizes
     */
    boundx: 0,
    boundy: 0,

    init: function () {
        UserShow = this;

        this.form = $(this.options.formSrc);
        this.jcropWrapper = $(this.options.jcropWrapperSrc);
        this.imgJcrop = $(this.options.imgJcropSrc);
        this.imgJcropPreview = $(this.options.imgJcropPreviewSrc);
        this.imgJcropPreviewPane = $(this.options.imgJcropPreviewPaneSrc);
        this.imgJcropPreviewContainer = $(this.options.imgJcropPreviewContainerSrc);
        this.imgCropCancelBtn = $(this.options.imgCropCancelBtnSrc);

        // set preview sizes
        this.xsize = this.imgJcropPreviewContainer.width();
        this.ysize = this.imgJcropPreviewContainer.height();

        // LMCDropzone app is init
        LMCFileinput.init(this.getFileinputInitOptions());
    },

    /**
     * jquery crop init function
     *
     * @param event
     * @param file
     * @param previewId
     * @param index
     * @param reader
     */
    jcropInit: function(event, file, previewId, index, reader)
    {
        this.imgJcrop.prop('src', reader.result);
        this.imgJcropPreview.prop('src', reader.result);
        this.jcropWrapper.removeClass('hidden');
        LMCJcrop.init(this.getJcropInitOptions());

        // get bounds
        var bounds = theLMCJcrop.api.getBounds();
        this.boundx = bounds[0];
        this.boundy = bounds[1];

        this.imgJcropPreviewPane.appendTo(theLMCJcrop.api.ui.holder);
    },

    /**
     * jquery crop reset function
     *
     * @param event
     */
    jcropReset: function(event)
    {
        this.jcropWrapper.addClass('hidden');
        this.imgJcrop.prop('src', '');
        this.imgJcropPreview.prop('src', '');
        this.resetFormElements();
        if (LMCJcrop.api != null) {
            theLMCJcrop.api.release();
            theLMCJcrop.api.destroy();
        }
    },

    /**
     * set hidden form elements
     *
     * @param coordinates
     */
    setFormElements: function(coordinates)
    {
        $('#x1').val(coordinates.x1);
        $('#y1').val(coordinates.y1);
        $('#x2').val(coordinates.x2);
        $('#y2').val(coordinates.y2);
        $('#width').val(coordinates.width);
        $('#height').val(coordinates.height);
    },

    /**
     * reset hidden form elements
     */
    resetFormElements: function()
    {
        $('#x1').val('');
        $('#y1').val('');
        $('#x2').val('');
        $('#y2').val('');
        $('#width').val('');
        $('#height').val('');
    },

    /**
     * avatar photo uploaded
     */
    fileUploaded: function(data)
    {
        if (data.result != 'success') {
            LMCApp.getNoty({
                message: LMCApp.lang.admin.flash.update_error.message,
                title: LMCApp.lang.admin.flash.update_error.title,
                type: 'error'
            });
            return;
        }
        // profil fotoğrafları yerleştirilir
        $('li.dropdown-user').find('img').prop('src', data.photos.thumbnails.small);
        $('img#nav-profile-photo').prop('src', data.photos.thumbnails.big);
        // file input sıfırlanır
        LMCFileinput.clear();

        LMCApp.getNoty({
            message: LMCApp.lang.admin.flash.update_success.message,
            title: LMCApp.lang.admin.flash.update_success.title,
            type: 'success'
        });
    },

    /**
     * get file input init options
     */
    getFileinputInitOptions: function()
    {
        return {
            src: UserShow.options.fileinputSrc,
            formSrc:  UserShow.options.formSrc,
            fileinput: {
                uploadUrl: UserShow.form.prop('action'),
                uploadExtraData: function (previewId, index)
                {
                    return {
                        x: $('#x1').val(),
                        y: $('#y1').val(),
                        width: $('#width').val(),
                        height: $('#height').val()
                    };
                },
                otherActionButtons: '<button type="button" id="image-crop-action" class="btn btn-xs yellow btn-outline tooltips" data-toggle="modal" title="' + LMCApp.lang.admin.ops.crop + '"><i class="icon-crop"></i> </button>'
            },
            // events
            filebrowse: function(event)
            {
                UserShow.jcropReset(event);
            },
            fileloaded: function(event, file, previewId, index, reader)
            {
                var img = new Image();
                img.src = reader.result;
                LMCJcrop.originalImage = img;
                // init tooltips
                LMCApp.initTooltips();
                // image crop action button click
                $('#image-crop-action').on('click', function(event)
                {
                    // jcrop init
                    UserShow.jcropInit(event, file, previewId, index, reader);
                });
                // image crop cancel button click
                UserShow.imgCropCancelBtn.on('click', function(event)
                {
                    UserShow.jcropReset(event);
                });
            },
            filecleared: function(event)
            {
                UserShow.jcropReset(event);
            },
            filereset: function(event)
            {
                UserShow.jcropReset(event);
            },
            fileuploaded: function(event, data, previewId, index)
            {
                UserShow.fileUploaded(data.response);
            },
            filebatchuploadsuccess: function(event, data, previewId, index)
            {
                UserShow.fileUploaded(data.response);
            }
        };
    },

    /**
     * get jquery crop init options
     */
    getJcropInitOptions: function()
    {
        return {
            src: UserShow.options.imgJcropSrc,
            jcrop: {
                aspectRatio: UserShow.xsize / UserShow.ysize,
                onChange: function(coords)
                {
                    if (parseInt(coords.w) > 0)
                    {
                        var recoords = LMCJcrop.getCropSize(
                            coords,
                            {width: UserShow.xsize, height: UserShow.ysize},
                            {width: UserShow.boundx, height: UserShow.boundy},
                            true
                        );

                        UserShow.imgJcropPreview.css({
                            width: recoords.width + 'px',
                            height: recoords.height + 'px',
                            marginLeft: '-' + recoords.x1 + 'px',
                            marginTop: '-' + recoords.y1 + 'px'
                        });
                        UserShow.setFormElements(LMCJcrop.getCropSize(
                            coords,
                            {width: UserShow.xsize, height: UserShow.ysize},
                            {width: UserShow.boundx, height: UserShow.boundy},
                            false
                        ));
                    }
                },
                onSelect: function(coords)
                {
                    UserShow.setFormElements(LMCJcrop.getCropSize(
                        coords,
                        {width: UserShow.xsize, height: UserShow.ysize},
                        {width: UserShow.boundx, height: UserShow.boundy},
                        false
                    ));
                },
                onRelease: function()
                {
                    UserShow.form.find('input[type="hidden"]').val('');
                }
            }
        };
    }
};