;var UserOperation;
var Operation = {

    /**
     * user create options
     * @var object
     */
    options: {
        fileinputSrc: '#photo',
        formSrc: 'form.form'
    },

    /**
     * user show jquery elements
     */
    form: null,

    init: function (options) {
        UserOperation = this;

        this.form = $(this.options.formSrc);

        // LMCDropzone app is init
        LMCFileinput.init(this.getFileinputInitOptions());

        // create form validation
        Validation.init({
            src: this.options.formSrc,
            isAjax: false,
            validate: {
                rules: options,
                messages: messagesOfRules
            }
        });

    },

    /**
     * get file input init options
     */
    getFileinputInitOptions: function()
    {
        return {
            src: UserOperation.options.fileinputSrc,
            formSrc:  UserOperation.options.formSrc,
            fileinput: {
                uploadUrl: UserOperation.form.prop('action'),
                showUpload: false,
                showCancel: false,
                fileActionSettings: {
                    showUpload: false
                }
            }
        };
    }
};
