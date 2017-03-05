;var ModelOperation;
var Operation = {

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
        ModelOperation = this;

        this.form = $(this.options.formSrc);

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    title: {
                        required: true
                    }
                },
                messages: messagesOfRules,
                submitHandler: function(form) {
                    if ( ! theValidation.options.isAjax) {
                        form.submit();
                        return;
                    }
                    if (theValidation.options.submitAjax) {
                        theValidation.options.submitAjax.call(undefined, theValidation);
                    }
                    return false;
                }
            }
        });

        // LMCFileinput app is init
        LMCFileinput.init(this.getPhotoFileinputOptions());

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
                    url: removePhotoURL,
                    data: {id: el.data('element-id')}
                }
            });
        });

    },

    /**
     * get default photo fileinput options
     */
    getPhotoFileinputOptions: function()
    {
        return {
            src: '#photo',
            formSrc:  'form.form',
            fileinput: {
                maxFileCount: maxFile,
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
