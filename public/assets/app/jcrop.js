;var theLMCJcrop;
var LMCJcrop = {

    /**
     * jcrop elementsSrc
     * @var object
     */
    elementsSrc: {
        jcropWrapperSrc: '#jcrop-preview',
        imgJcropSrc: '#img-jcrop',
        imgJcropPreviewSrc: '#img-jcrop-preview',
        imgJcropPreviewPaneWrapperSrc: '#preview-pane-wrapper',
        imgJcropPreviewPaneSrc: '#preview-pane',
        imgJcropPreviewContainerSrc: '#preview-pane .preview-container',
        imgCropCancelBtnSrc: '#image-crop-cancel'
    },

    /**
     * jcrop jquery elements
     */
    jcropWrapper: null,
    imgJcrop: null,
    imgJcropPreview: null,
    imgJcropPreviewPaneWrapper: null,
    imgJcropPreviewPane: null,
    imgJcropPreviewContainer: null,
    imgCropCancelBtn: null,

    /**
     * jcrop options
     * @var object
     */
    options: {},

    /**
     * jcrop jquery elements
     */
    element: null,

    /**
     * original image
     * @var Image
     */
    originalImage: null,

    /**
     * jquery crop api
     * @var jcrop
     */
    api: null,

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

    /**
     * jcrop init function
     * @param options
     */
    init: function(options)
    {
        // if element is not setup; setup it
        if ( ! theLMCJcrop) {
            this.setupElements();
        }

        // if api is not null; destroy it
        if(this.api){
            this.api.destroy();
        }

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // jquery crop jquery elements
        this.element = $(this.options.src);
        this.element.Jcrop(this.options.jcrop, function()
        {
            var bounds = this.getBounds();
            theLMCJcrop.boundx = bounds[0];
            theLMCJcrop.boundy = bounds[1];
            theLMCJcrop.imgJcropPreviewPane.appendTo(this.ui.holder);

            theLMCJcrop.api = this;
        });
    },

    /**
     * jquery elements setup
     */
    setupElements: function()
    {
        // Jcrop object
        theLMCJcrop = this;

        // set elements
        this.jcropWrapper= $(this.elementsSrc.jcropWrapperSrc);
        this.imgJcrop= $(this.elementsSrc.imgJcropSrc);
        this.imgJcropPreview= $(this.elementsSrc.imgJcropPreviewSrc);
        this.imgJcropPreviewPaneWrapper= $(this.elementsSrc.imgJcropPreviewPaneWrapperSrc);
        this.imgJcropPreviewPane= $(this.elementsSrc.imgJcropPreviewPaneSrc);
        this.imgJcropPreviewContainer= $(this.elementsSrc.imgJcropPreviewContainerSrc);
        this.imgCropCancelBtn= $(this.elementsSrc.imgCropCancelBtnSrc);

        // set preview sizes
        this.xsize = this.imgJcropPreviewContainer.width();
        this.ysize = this.imgJcropPreviewContainer.height();
    },

    /**
     * set original image with src
     * @param src
     */
    setOriginalImage: function(src)
    {
        this.originalImage = new Image();
        this.originalImage.src = src;
    },

    /**
     * jquery crop init function
     *
     * @param src
     * @return LMCJcrop
     */
    jcropPreInit: function(src)
    {
        this.setOriginalImage(src);
        this.imgJcrop.prop('src', src);
        this.imgJcropPreview.prop('src', src);
        this.jcropWrapper.removeClass('hidden');
        return this;
    },

    /**
     * jquery crop reset function
     *
     */
    jcropReset: function()
    {
        this.jcropWrapper.addClass('hidden');
        this.imgJcrop.prop('src', '').css({width: "", height: ""});
        this.imgJcropPreview.prop('src', '');
        this.resetFormElements();
        if  (this.api) {
            this.imgJcropPreviewPane.appendTo(this.imgJcropPreviewPaneWrapper);
            this.api.ui.holder.remove();
            this.release();
            this.api.destroy();
        }
    },

    /**
     * set hidden form elements
     *
     * @param coordinates
     */
    setFormElements: function(coordinates)
    {
        $('#x').val(coordinates.x1);
        $('#y').val(coordinates.y1);
        $('#width').val(coordinates.width);
        $('#height').val(coordinates.height);
    },

    /**
     * reset hidden form elements
     */
    resetFormElements: function()
    {
        $('#x').val('');
        $('#y').val('');
        $('#width').val('');
        $('#height').val('');
    },

    /**
     * jcrop deselect
     */
    release: function()
    {
        this.api.animateTo([0,0,0,0], function()
        {
            theLMCJcrop.api.release();
        });
    },

    /**
     * get crop size preview image according to the original picture
     *
     * @param coordinates
     * @param destination
     * @param source
     * @param forPreview
     */
    getCropSize: function(coordinates, destination, source, forPreview)
    {
        if ( ! forPreview) {
            destination = {
                width: this.originalImage.width,
                height: this.originalImage.height
            };
        }
        var rx = forPreview ? destination.width / coordinates.w : destination.width / source.width;
        var ry = forPreview ? destination.height / coordinates.h : destination.height / source.height;

        return {
            width: Math.round(forPreview ? rx * source.width : rx * coordinates.w),
            height: Math.round(forPreview ? ry * source.height : ry * coordinates.h),
            x1: Math.round(rx * coordinates.x),
            y1: Math.round(ry * coordinates.y),
            x2: Math.round(rx * coordinates.x2),
            y2: Math.round(ry * coordinates.y2)
        };
    },


    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: theLMCJcrop.elementsSrc.imgJcropSrc,
            jcrop: {
                bgFade: true,
                bgOpacity: .2,
                bgColor: 'white',
                aspectRatio: theLMCJcrop.xsize / theLMCJcrop.ysize,
                onChange: function(coords)
                {
                    if (parseInt(coords.w) > 0)
                    {
                        var recoords = theLMCJcrop.getCropSize(
                            coords,
                            {width: theLMCJcrop.xsize, height: theLMCJcrop.ysize},
                            {width: theLMCJcrop.boundx, height: theLMCJcrop.boundy},
                            true
                        );

                        theLMCJcrop.imgJcropPreview.css({
                            width: recoords.width + 'px',
                            height: recoords.height + 'px',
                            marginLeft: '-' + recoords.x1 + 'px',
                            marginTop: '-' + recoords.y1 + 'px'
                        });
                        LMCJcrop.setFormElements(theLMCJcrop.getCropSize(
                            coords,
                            {width: theLMCJcrop.xsize, height: theLMCJcrop.ysize},
                            {width: theLMCJcrop.boundx, height: theLMCJcrop.boundy},
                            false
                        ));
                    }
                },
                onSelect: function(coords)
                {
                    LMCJcrop.setFormElements(theLMCJcrop.getCropSize(
                    coords,
                    {width: theLMCJcrop.xsize, height: theLMCJcrop.ysize},
                    {width: theLMCJcrop.boundx, height: theLMCJcrop.boundy},
                    false
                ));
                }
            }
        };
    }

};