;var UserShow;
var Show = {

    /**
     * template preview element
     * @var jquery element
     */
    templatePreview: null,

    init: function () {
        UserShow = this;

        this.templatePreview = $('#temp-photo-preview');

        // LMCDropzone app is init
        LMCFileinput.init({
            src: '#photo',
            fileinput: {
                uploadUrl: templatePhotoURL
            },
            // events
            success: function (file, dataUrl)
            {
                UserShow.templatePreview.html('<img src="' + dataUrl + '" class="img-responsive">');
            },
            error: function (file, errorMessage)
            {
                LMCApp.getNoty({
                    message: errorMessage,
                    title: LMCApp.lang.admin.extensions.dropzone.error_title,
                    type: 'error'
                });
            }
        });
    }

};
