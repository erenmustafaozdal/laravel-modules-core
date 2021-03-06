;var ModuleShow;
var Show = {

    /**
     * user show options
     * @var object
     */
    options: {
        formSrc: '#description-edit-info'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function () {
        ModuleShow = this;

        this.form = $(this.options.formSrc);

        // edit info form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: {
                    category_id: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    link: {
                        url: true
                    }
                },
                messages: messagesOfRules
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
                    url: removePhotoURL.replace('###id###',el.data('parent-id')),
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
