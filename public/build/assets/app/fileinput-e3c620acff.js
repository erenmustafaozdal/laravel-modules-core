;var theLMCFileinput;
var LMCFileinputs = {};
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
        this.options = $.extend(true, this.getDefaultOptions(), options);

        // fileElement jquery element
        this.fileElement = $(this.options.src);

        this.fileElement.fileinput(this.options.fileinput);
        LMCFileinputs[this.options.src] = { isEnable : true };

        // file input events
        this.fileElement.on('filebrowse', this.options.filebrowse);
        this.fileElement.on('fileloaded', this.options.fileloaded);
        this.fileElement.on('filecleared', this.options.filecleared);
        this.fileElement.on('filereset', this.options.filereset);
        this.fileElement.on('fileuploaded', this.options.fileuploaded);
        this.fileElement.on('filebatchuploadsuccess', this.options.filebatchuploadsuccess);
        this.fileElement.on('fileuploaderror', this.options.fileuploaderror);
        this.fileElement.on('filedisabled', this.options.filedisabled);
        this.fileElement.on('fileenabled', this.options.fileenabled);

        // fileinput ve elfinder yönetimi
        $('.fileinput-tabs').on('click',function(e)
        {
            var element = $(this);
            var action = element.data('action');
            var actionId = element.data('action-id');
            var textInput = element.parents('.tabbable-line').find('input.elfinder[type="text"]');
            var fileinput = $('#' + actionId);

            if (action == 'fileinput') {
                // text iptal edilir
                textInput.val('').prop('disabled',true);
                // fileinput aktif edilir
                fileinput.fileinput('enable').fileinput('refresh');
                return;
            }
            // text alanı aktif edilir
            textInput.prop('disabled',false);
            // fileinput iptal edilir
            fileinput.fileinput('disable').fileinput('clear').fileinput('reset');
        });

    },

    /**
     * file input clear
     */
    clear: function()
    {
        this.fileElement.fileinput('clear');
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
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
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
                browseLabel: LMCApp.lang.admin.ops.browse,
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
                    showZoom: false,
                    zoomIcon: '<i class="icon-magnifier-add"></i> ',
                    zoomClass: 'btn btn-xs purple btn-outline tooltips'
                },
                showAjaxErrorDetails: false
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
            },
            filebatchuploadsuccess: function(event, data, previewId, index)
            {
                //
            },
            fileuploaderror: function(event, data, msg) {
                //
            },
            filedisabled: function(event) {
                var id = $(this).prop('id');
                LMCFileinputs['#' + id]['isEnable'] = false;
            },
            fileenabled: function(event) {
                var id = $(this).prop('id');
                LMCFileinputs['#' + id]['isEnable'] = true;
            }
        };
    }

};