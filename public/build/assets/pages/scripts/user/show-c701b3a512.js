;var UserShow;
var Show = {

    init: function () {
        UserShow = this;

        // LMCDropzone app is init
        LMCDropzone.init({
            src: '#temp-photo',
            dropzone: {
                paramName: 'photo',
                maxFiles: 1,
                maxFilesize: 5,
                filesizeBase: 1024,
                uploadMultiple: false,
                acceptedFiles: 'image/*',
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
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            },
            success: function (file, dataUrl)
            {
                var preview_el = $('#temp-photo-preview');
                preview_el.html('<img src="' + dataUrl + '" class="img-responsive">');
                console.log(file);
            }
        });
    }

};
