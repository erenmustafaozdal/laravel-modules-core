;var theModel;
var Model = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form-horizontal'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        theModel = this;

        this.form = $(this.options.formSrc);

        // LMCFileinput app is init for logo
        LMCFileinput.init(this.getLogoOptions());

        // LMCFileinput app is init for favicon
        LMCFileinput.init(this.getFaviconOptions());

    },

    /**
     * get default photo fileinput options
     */
    getLogoOptions: function()
    {
        return {
            src: '.logo',
            formSrc:  'form.form',
            aspectRatio: logoAspectRatio,
            fileinput: {
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                },
                previewTemplates: {
                    image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                    '   <div class="kv-file-content">' +
                    '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                    '   </div>\n' +
                    '   {footer}\n' +
                    '   <input type="hidden" class="crop-x" name="logo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="logo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="logo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="logo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getFaviconOptions: function()
    {
        return {
            src: '.favicon',
            formSrc:  'form.form',
            aspectRatio: faviconAspectRatio,
            fileinput: {
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                },
                previewTemplates: {
                    image: '<div class="file-preview-frame" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">\n' +
                    '   <div class="kv-file-content">' +
                    '       <img id="img-{previewId}" src="{data}" class="kv-preview-data file-preview-image jcrop-item" title="{caption}" alt="{caption}">\n' +
                    '   </div>\n' +
                    '   {footer}\n' +
                    '   <input type="hidden" class="crop-x" name="favicon[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="favicon[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="favicon[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="favicon[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    }
};
