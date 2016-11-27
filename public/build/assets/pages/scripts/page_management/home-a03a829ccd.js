;var theHome;
var Home = {

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
        theHome = this;

        this.form = $(this.options.formSrc);

        // LMCFileinput app is init for home image banner
        LMCFileinput.init(this.getPhotoHomeImageBannerOptions());

        // LMCFileinput app is init for home creative slider
        LMCFileinput.init(this.getPhotoHomeCreativeSliderOptions());

        // LMCFileinput app is init for home advertisement banner big
        LMCFileinput.init(this.getPhotoHomeAdvertisementBannerBigOptions());

        // LMCFileinput app is init for home advertisement banner small
        LMCFileinput.init(this.getPhotoHomeAdvertisementBannerSmallOptions());

        // remove photo
        $('a.remove-element').on('click', function()
        {
            var el = $(this);
            LMCApp.removeElement({
                element: el,
                removeElement: {
                    src: '.element-wrapper'
                },
                ajax: {
                    url: removePhotoURL.replace('###id###',el.data('parent-id')),
                    data: {id: el.data('element-id')}
                }
            });
        });

    },

    /**
     * get default photo fileinput options
     */
    getPhotoHomeImageBannerOptions: function()
    {
        return {
            src: '.photo_home_image_banner',
            formSrc:  'form.form',
            aspectRatio: homeImageBannerAspectRatio,
            fileinput: {
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getPhotoHomeCreativeSliderOptions: function()
    {
        return {
            src: '.photo_home_creative_slider',
            formSrc:  'form.form',
            aspectRatio: homeCreativeSliderAspectRatio,
            fileinput: {
                maxFileSize: maxSize,
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getPhotoHomeAdvertisementBannerBigOptions: function()
    {
        return {
            src: '.photo_home_advertisement_banner_big',
            formSrc:  'form.form',
            aspectRatio: homeAdvertisementBannerBigAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="big[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="big[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="big[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="big[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    },

    /**
     * get default photo fileinput options
     */
    getPhotoHomeAdvertisementBannerSmallOptions: function()
    {
        return {
            src: '.photo_home_advertisement_banner_small',
            formSrc:  'form.form',
            aspectRatio: homeAdvertisementBannerSmallAspectRatio,
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
                    '   <input type="hidden" class="crop-x" name="small[x]" value="0">\n' +
                    '   <input type="hidden" class="crop-y" name="small[y]" value="0">\n' +
                    '   <input type="hidden" class="crop-width" name="small[width]" value="0">\n' +
                    '   <input type="hidden" class="crop-height" name="small[height]" value="0">\n' +
                    '</div>\n'
                }
            }
        };
    }
};
