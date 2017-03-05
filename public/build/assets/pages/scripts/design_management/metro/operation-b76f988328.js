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
                    first_link : {
                        url: true
                    },
                    second_link : {
                        url: true
                    },
                    third_link : {
                        url: true
                    },
                    fourth_link : {
                        url: true
                    },
                    fifth_link : {
                        url: true
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init for logo
        LMCFileinput.init(this.getPhotoOptions());

        // LMCFileinput app is init for favicon
        LMCFileinput.init(this.getFirstMiniPhotoOptions());
        LMCFileinput.init(this.getSecondMiniPhotoOptions());
        LMCFileinput.init(this.getThirdMiniPhotoOptions());
        LMCFileinput.init(this.getFourthMiniPhotoOptions());
        LMCFileinput.init(this.getFifthMiniPhotoOptions());

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
    getFirstMiniPhotoOptions: function()
    {
        return {
            src: '#first-mini-photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: firstAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="first_mini_photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="first_mini_photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="first_mini_photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="first_mini_photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getSecondMiniPhotoOptions: function()
    {
        return {
            src: '#second-mini-photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: secondAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="second_mini_photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="second_mini_photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="second_mini_photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="second_mini_photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getThirdMiniPhotoOptions: function()
    {
        return {
            src: '#third-mini-photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: thirdAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="third_mini_photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="third_mini_photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="third_mini_photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="third_mini_photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getFourthMiniPhotoOptions: function()
    {
        return {
            src: '#fourth-mini-photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: fourthAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="fourth_mini_photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="fourth_mini_photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="fourth_mini_photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="fourth_mini_photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getFifthMiniPhotoOptions: function()
    {
        return {
            src: '#fifth-mini-photo',
            formSrc:  'form.form-horizontal',
            aspectRatio: fifthAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="fifth_mini_photo[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="fifth_mini_photo[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="fifth_mini_photo[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="fifth_mini_photo[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    }
};
