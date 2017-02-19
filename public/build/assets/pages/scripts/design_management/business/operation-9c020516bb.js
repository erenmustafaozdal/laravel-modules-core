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

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    'photo[photo]': {
                        required: true
                    },
                    link : {
                        url: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init for logo
        LMCFileinput.init(this.getPhotoOptions());

        // LMCFileinput app is init for favicon
        LMCFileinput.init(this.getMiniPhotoOptions());

        $('.color-picker').minicolors({
            control: 'hue',
            letterCase: 'lowercase',
            position: 'bottom right',
            theme: 'bootstrap'
        });

    },

    /**
     * get default photo fileinput options
     */
    getPhotoOptions: function()
    {
        return {
            src: '#photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: photoAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getMiniPhotoOptions: function()
    {
        return {
            src: '#mini_photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: miniPhotoAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="mini_photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="mini_photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="mini_photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="mini_photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    }
};
