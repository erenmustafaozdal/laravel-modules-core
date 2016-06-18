;var theLMCJcrop;
var LMCJcrop = {

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
     * jcrop options
     * @var object
     */
    options: {},

    /**
     * jcrop init function
     * @param options
     */
    init: function(options)
    {
        // Jcrop object
        theLMCJcrop = this;

        // default settings
        theLMCJcrop.options = $.extend(true, theLMCJcrop.getDefaultOptions(), options);

        // jquery crop jquery elements
        theLMCJcrop.element = $(theLMCJcrop.options.src);

        theLMCJcrop.element.Jcrop(theLMCJcrop.options.jcrop, function()
        {
            theLMCJcrop.api = this;
        });
    },

    /**
     * jcrop deselect
     */
    release: function()
    {
        this.api.animateTo([0,0,0,0], function()
        {
            this.release();
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
    getDefaultOptions:function()
    {
        return {
            src: '',
            jcrop: {
                aspectRatio: 0,
                bgFade: true,
                bgOpacity: .2,
                bgColor: 'white',
                onChange: function(coords)
                {
                    //
                },
                onSelect: function(coords)
                {
                    //
                },
                onRelease: function()
                {
                    //
                }
            }
        };
    }

};