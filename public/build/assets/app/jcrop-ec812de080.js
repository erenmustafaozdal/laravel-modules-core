;var theLMCJcrop;
var LMCAspectRatio;
var LMCJcrop = {

    /**
     * jcrop options
     * @var object
     */
    options: {},

    /**
     * jcrop jquery elements
     * @var object
     */
    elements: {},

    /**
     * jquery crop api
     * @var object
     */
    apis: {},

    /**
     * jquery preview bound sizes
     */
    boundxs: {},
    boundys: {},

    /**
     * jcrop init function
     * @param options
     */
    init: function(options)
    {
        // jCrop Object
        theLMCJcrop = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);
    },

    /**
     * setup element
     *
     * @param id
     * @param options
     */
    setupElement: function(id, options)
    {
        // set the element
        var newId = 'img-' + id;
        var element = $('#' + newId);
        element.css('width','100%');
        var x = element.width();
        var y = element.height();
        this.elements[newId] = element;

        // box option set
        this.options.jcrop['boxWidth'] = x;
        this.options.jcrop['boxHeight'] = y;

        // init jcrop
        if (LMCAspectRatio != undefined) {
            this.options.jcrop['aspectRatio'] = LMCAspectRatio;
        }
        if (options != undefined && options['aspectRatio'] != undefined) {
            this.options.jcrop['aspectRatio'] = options.aspectRatio;
        }
        element.Jcrop(this.options.jcrop, function()
        {
            theLMCJcrop.boundxs[newId] = element[0].naturalWidth;
            theLMCJcrop.boundys[newId] = element[0].naturalHeight;
            theLMCJcrop.apis[newId] = this;
        });
    },

    /**
     * jquery crop reset function
     *
     */
    jcropReset: function()
    {
        this.resetFormElements();
        if  (this.api) {
            this.api.ui.holder.remove();
            this.release();
            this.api.destroy();
            this.apis = {};
        }
    },

    /**
     * set hidden form elements
     *
     * @param coordinates
     * @param element
     */
    setFormElements: function(coordinates, element)
    {
        $('input.crop-x[type="hidden"]', element).val(coordinates.x1);
        $('input.crop-y[type="hidden"]', element).val(coordinates.y1);
        $('input.crop-width[type="hidden"]', element).val(coordinates.width);
        $('input.crop-height[type="hidden"]', element).val(coordinates.height);
    },

    /**
     * reset hidden form elements
     *
     * @param element
     */
    resetFormElements: function(element)
    {
        var x, y, width, height;
        if (element === undefined) {
            x = $('input.crop-x[type="hidden"]');
            y = $('input.crop-y[type="hidden"]');
            width = $('input.crop-width[type="hidden"]');
            height = $('input.crop-height[type="hidden"]');
            return;
        } else {
            x = $('input.crop-x[type="hidden"]', element);
            y = $('input.crop-y[type="hidden"]', element);
            width = $('input.crop-width[type="hidden"]', element);
            height = $('input.crop-height[type="hidden"]', element);
        }
        x.val(0);
        y.val(0);
        width.val(0);
        height.val(0);
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
     * @param elementId
     */
    getCropSize: function(coordinates, elementId)
    {
        var el = this.elements[elementId];
        var bx = this.boundxs[elementId];
        var by = this.boundys[elementId];

        var rx = bx / el.width();
        var ry = by / el.height();
        return {
            width: Math.round( rx * coordinates.w ),
            height: Math.round( ry * coordinates.h ),
            x1: Math.round( rx * coordinates.x ),
            y1: Math.round( ry * coordinates.y ),
            x2: Math.round( rx * coordinates.x2 ),
            y2: Math.round( ry * coordinates.y2 )
        };
    },


    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        var asRa = aspectRatio == undefined ? 1 : aspectRatio;
        return {
            src: '',
            jcrop: {
                boxWidth: 0,
                boxHeight:  0,
                bgFade: true,
                bgOpacity: .2,
                bgColor: 'white',
                aspectRatio: asRa,
                onRelease: function(coords)
                {
                    var id = this.ui.holder.offsetParent().prop('id');
                    theLMCJcrop.resetFormElements($('#' + id));
                },
                onSelect: function(coords)
                {
                    var id = this.ui.holder.offsetParent().prop('id');
                    var imgId = 'img-' + id;
                    var recoords = theLMCJcrop.getCropSize(coords, imgId);
                    theLMCJcrop.setFormElements(recoords, $('#' + id));
                }
            }
        };
    }

};