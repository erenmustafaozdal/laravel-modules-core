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
                    photo: {
                        required: function(element){
                            var video = $("#video");
                            return ! video.length || video.prop('disabled') === true;
                        }
                    },
                    video: {
                        required: function(element){
                            var photo = $("#photo");
                            return ! photo.length || photo.prop('disabled') === true;
                        }
                    }
                },
                messages: messagesOfRules
            }
        });

        // LMCFileinput app is init
        LMCFileinput.init(this.getPhotoFileinputOptions());

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
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    }
};
