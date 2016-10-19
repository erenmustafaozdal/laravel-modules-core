;var theHome;
var Home = {

    /**
     * user create options
     * @var object
     */
    options: {
        formSrc: 'form.form'
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
                }
            }
        };
    }
};
