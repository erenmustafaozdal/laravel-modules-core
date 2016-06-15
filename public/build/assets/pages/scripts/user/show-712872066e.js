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
        LMCDropzone.init({
            src: '#temp-photo',
            dropzone: {
                paramName: 'photo',
                maxFiles: 1,
                maxFilesize: 5,
                filesizeBase: 1024,
                uploadMultiple: false,
                acceptedFiles: '.jpg, .jpeg, .png',
                previewsContainer: '#dropzonePreview',
                previewTemplate: document.querySelector('#preview-template').innerHTML,
                dictDefaultMessage: LMCApp.lang.admin.extensions.dropzone.dictDefaultMessage,
                dictFallbackMessage: LMCApp.lang.admin.extensions.dropzone.dictFallbackMessage,
                dictInvalidFileType: LMCApp.lang.admin.extensions.dropzone.dictInvalidFileType,
                dictFileTooBig: LMCApp.lang.admin.extensions.dropzone.dictFileTooBig,
                dictResponseError: LMCApp.lang.admin.extensions.dropzone.dictResponseError
            },
            // events
            addedfile: function (file)
            {
                // Create the remove button
                var removeButton = Dropzone.createElement('<a href="javascript:;" class="btn red btn-sm btn-block btn-outline">' + LMCApp.lang.admin.ops.destroy + '</a>');

                // Capture the Dropzone instance as closure.
                var _this = this;

                // Listen to the click event
                removeButton.addEventListener('click', function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                    UserShow.templatePreview.html('');

                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            },
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
