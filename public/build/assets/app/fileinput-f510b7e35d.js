;var theLMCFileinput;
var LMCFileinput = {

    /**
     * fileElement jquery element
     * @var null | jquery element
     */
    fileElement: null,

    /**
     * fileinput options
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
        theLMCFileinput.options = $.extend(true, theLMCFileinput.getDefaultOptions(), options);

        // fileElement jquery element
        theLMCFileinput.fileElement = $(theLMCFileinput.options.src);

        theLMCFileinput.fileElement.fileinput(theLMCFileinput.options.fileinput);

        // file input events
        theLMCFileinput.fileElement.on('filebrowse', theLMCFileinput.options.filebrowse);
        theLMCFileinput.fileElement.on('fileloaded', theLMCFileinput.options.fileloaded);
        theLMCFileinput.fileElement.on('filecleared', theLMCFileinput.options.filecleared);
        theLMCFileinput.fileElement.on('filereset', theLMCFileinput.options.filereset);
        theLMCFileinput.fileElement.on('fileuploaded', theLMCFileinput.options.fileuploaded);
    },

    /**
     * get default options
     */
    getDefaultOptions:function()
    {
        return {
            src: '',
            formSrc: '',
            fileinput: {
                uploadUrl: '',
                language: 'tr',
                allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                allowedFileTypes: ['image'],
                previewFileType: 'image',
                previewFileIcon: '<i class="fa fa-file-photo-o"></i>',
                msgErrorClass: 'alert alert-danger',
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
                    uploadClass: 'btn btn-xs green-meadow btn-outline tooltips',
                    showRemove: true,
                    removeIcon: '<i class="icon-trash"></i> ',
                    removeClass: 'btn btn-xs red btn-outline tooltips',
                    showZoom: true,
                    zoomIcon: '<i class="icon-magnifier-add"></i> ',
                    zoomClass: 'btn btn-xs purple btn-outline tooltips'
                }
            },
            // events
            filebrowse: function(event)
            {
                //
            },
            fileloaded: function(event, file, previewId, index, reader)
            {
                //
            },
            filecleared: function(event)
            {
                //
            },
            filereset: function(event)
            {
                //
            },
            fileuploaded: function(event, data, previewId, index)
            {
                //
            }
        };
    }

};