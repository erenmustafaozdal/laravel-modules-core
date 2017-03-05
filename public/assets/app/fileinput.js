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
        this.options.isEnable = true;
        LMCFileinputs[this.options.src] = this.options;

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
            var fileinput, element = $(this);
            var action = element.data('action');
            var actionId = element.data('action-id');
            var textInput = element.parents('.tabbable-line').find('input.elfinder[type="text"]');
            if (LMCFileinputs['.' + actionId] == undefined) {
                fileinput = element.parents('.tabbable-line').find('#' + actionId);
            } else {
                fileinput = element.parents('.tabbable-line').find('.' + actionId);
            }

            if (action == 'fileinput') {
                // text iptal edilir
                textInput.val('').prop('disabled',true);
                // fileinput aktif edilir
                LMCFileinput.enable(fileinput);
                return;
            }
            // text alanı aktif edilir
            textInput.prop('disabled',false);
            // fileinput iptal edilir
            LMCFileinput.disable(fileinput);
        });

        // jcrop init
        LMCJcrop.init();
    },

    /**
     * file input clear
     */
    clear: function()
    {
        this.fileElement.fileinput('clear');
    },

    /**
     * file input disable
     *
     * @param element
     */
    disable: function(element)
    {
        element.fileinput('disable').fileinput('clear').fileinput('reset');
    },

    /**
     * file input enable
     *
     * @param element
     */
    enable: function(element)
    {
        element.fileinput('enable').fileinput('refresh');
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
                uploadExtraData: function (previewId, index)
                {
                    return {
                        x: $("input[name='x[]']").map(function(){return $(this).val();}).get(),
                        y: $("input[name='y[]']").map(function(){return $(this).val();}).get(),
                        width: $("input[name='width[]']").map(function(){return $(this).val();}).get(),
                        height: $("input[name='height[]']").map(function(){return $(this).val();}).get()
                    };
                },
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
                showAjaxErrorDetails: false,
                initialPreviewShowDelete: false,
                initialPreviewThumbTags: false,
                previewTemplates: {
                    image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                    '   <div class="kv-file-content">' +
                    '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                    '   </div>\n' +
                    '   {footer}\n' +
                    '   <input type="hidden" class="crop-x" name="x[]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="y[]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="width[]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="height[]" value="0">\n' +
                    '</div>\n',
                    generic: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                    '   {content}\n' +
                    '   {footer}\n' +
                    '   <input type="hidden" class="crop-x" name="x[]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="y[]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="width[]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="height[]" value="0">\n' +
                    '   <input type="hidden" class="init-photo" name="init_photo[]" value="{PHOTO_URL}">\n' +
                    '</div>\n'
                }
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
                var options = LMCFileinputs['.' + $(event.currentTarget).prop('class')];
                if (options == undefined) {
                    options = LMCFileinputs['#' + $(event.currentTarget).prop('id')];
                }
                theLMCJcrop.setupElement(previewId, options);
            },
            filecleared: function(event)
            {
                theLMCJcrop.jcropReset();
            },
            filereset: function(event)
            {
                theLMCJcrop.jcropReset();
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
                var api = LMCFileinputs['#' + $(this).prop('id')];
                if (api == undefined) {
                    api = LMCFileinputs['.' + $(this).prop('class')];
                }
                api['isEnable'] = false;
            },
            fileenabled: function(event) {
                var api = LMCFileinputs['#' + $(this).prop('id')];
                if (api == undefined) {
                    api = LMCFileinputs['.' + $(this).prop('class')];
                }
                api['isEnable'] = true;
            }
        };
    }

};