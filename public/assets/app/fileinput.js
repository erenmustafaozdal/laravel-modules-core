;var theLMCFileinput;
var LMCFileinput = {

    /**
     * fileElement jquery element
     * @var null | jquery element
     */
    fileElement: null,

    /**
     * validation options
     * @var object
     */
    options: {},

    /**
     * fileinput init function
     * @param options
     */
    init: function(options)
    {
        // Fileinput object
        theLMCFileinput = this;

        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // fileElement jquery element
        this.fileElement = $(this.options.src);

        this.fileElement.fileinput(this.options.fileinput);

        // on added file
        //fileinput.on('addedfile', this.options.addedfile);
        //fileinput.on('success', this.options.success);
        //fileinput.on('error', this.options.error);
    },

    /**
     * get default options
     */
    getDefaultOptions:function()
    {
        return {
            src: '',
            fileinput: {
                language: 'tr',
                allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                allowedFileTypes: ['image'],
                previewFileType: 'image',
                maxFileSize: 1024*5,
                showUpload: true,
                showCaption: true,
                showPreview: true,
                showRemove: true,
                showCancel: true,
                showClose: true,
                showUploadedThumbs: false,
                showBrowse: true,
                browseOnZoneClick: true,
                uploadAsync: false, // when upload multiple files
                captionClass: 'form-control form-control-solid',
                browseIcon: '<i class="icon-folder-alt"></i> ',
                browseClass: 'btn blue btn-outline',
                removeIcon: '<i class="icon-trash"></i> ',
                removeClass: 'btn red btn-outline',
                uploadIcon: '<i class="icon-cloud-upload"></i> ',
                uploadClass: 'btn green-meadow btn-outline',
                progressClass: 'progress-bar progress-bar-info progress-bar-striped active',
                progressCompleteClass: 'progress-bar progress-bar-success progress-bar-striped',
                progressErrorClass: 'progress-bar progress-bar-danger progress-bar-striped',
                fileActionSettings: {
                    showUpload: true,
                    uploadIcon: '<i class="icon-cloud-upload"></i> ',
                    uploadClass: 'btn btn-xs green-meadow btn-outline',
                    showRemove: true,
                    removeIcon: '<i class="icon-trash"></i> ',
                    removeClass: 'btn btn-xs red btn-outline',
                    showZoom: true,
                    zoomIcon: '<i class="icon-magnifier-add"></i> ',
                    zoomClass: 'btn btn-xs purple btn-outline',
                    showDrag: true,
                    dragIcon: '<i class="icon-magnifier-add"></i> ',
                    dragClass: 'btn btn-xs yellow-saffron btn-outline'
                }
            }
            // events
        };
    }

};