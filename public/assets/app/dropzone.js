;var theLMCDropzone;
var LMCDropzone = {

    /**
     * form jquery element
     * @var null | jquery element
     */
    form: null,

    /**
     * validation options
     * @var object
     */
    options: {},

    /**
     * dropzone init function
     * @param options
     */
    init: function(options)
    {
        // Dropzone object
        theLMCDropzone = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // form jquery element
        this.form = $(this.options.src);

        // disable auto init
        Dropzone.autoDiscover = false;
        var dropzone = new Dropzone(this.options.src,this.options.dropzone);

        // on added file
        dropzone.on('addedfile', this.options.addedfile);
        dropzone.on('success', this.options.success);
        dropzone.on('error', this.options.error);
    },

    /**
     * get default options
     */
    getDefaultOptions:function()
    {
        return {
            src: '',
            dropzone: {
                //
            },
            // events
            addedfile: function(file)
            {
                //
            },
            success: function(file, dataUrl)
            {
                //
            },
            error: function(file, errorMessage)
            {
                //
            }
        };
    }

};